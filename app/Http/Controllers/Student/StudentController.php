<?php

namespace App\Http\Controllers\Student;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class StudentController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }

    public function home()
    {
        $user = \Illuminate\Support\Facades\Auth::user();
        
        $enrollments = $user->enrollments()
            ->with(['course.modules' => function($q) {
                $q->orderBy('order');
            }, 'course.modules.topics' => function($q) {
                $q->orderBy('order');
            }])
            ->orderBy('updated_at', 'desc')
            ->get();
            
        $recentEnrollment = $enrollments->first();
        $nextTopic = null;
        $nextModule = null;

        if ($recentEnrollment) {
            $course = $recentEnrollment->course;
            $completedTopicIds = \App\Models\StudentProgress::where('user_id', $user->id)
                ->where('is_completed', true)
                ->pluck('topic_id')
                ->toArray();

            foreach ($course->modules as $module) {
                foreach ($module->topics as $topic) {
                    if (!in_array($topic->id, $completedTopicIds)) {
                        $nextTopic = $topic;
                        $nextModule = $module;
                        break 2;
                    }
                }
            }
        }

        $coursesCompleted = $enrollments->where('progress_percentage', 100)->count();
        $topicsCompleted = \App\Models\StudentProgress::where('user_id', $user->id)
            ->where('is_completed', true)
            ->whereNotNull('topic_id')
            ->count();
            
        $student = $user->student;
        $totalXp = $student ? $student->total_xp : 0;
        
        $streak = \App\Models\StudentProgress::where('user_id', $user->id)
            ->where('completed_at', '>=', now()->subDays(30))
            ->selectRaw('DATE(completed_at) as date')
            ->distinct()
            ->get()
            ->count();

        return view('student.home', compact('user', 'enrollments', 'recentEnrollment', 'nextTopic', 'nextModule', 'coursesCompleted', 'topicsCompleted', 'totalXp', 'streak'));
    }

    public function courses()
    {
        return view('student.courses');
    }

    public function courseDetails(Request $request)
    {
        $id = $request->query('id');
        if (!$id) {
             return redirect()->route('student.courses');
        }

        $course = \App\Models\Course::with(['modules.topics', 'projects', 'instructor', 'learningOutcomes', 'reviews.user'])
            ->withCount('reviews')
            ->withAvg('reviews', 'rating')
            ->findOrFail($id);

        $user = \Illuminate\Support\Facades\Auth::user();
        if ($user) {
            $isEnrolled = $user->enrollments()->where('course_id', $id)->exists();
            if ($isEnrolled) {
                return redirect()->route('student.enrolled-course-details', ['id' => $id]);
            }
        }

        return view('student.course-details', compact('course'));
    }

    public function enrolledCourseDetails(Request $request)
    {
        $id = $request->query('id');
        if (!$id) {
             return redirect()->back();
        }

        $user = \Illuminate\Support\Facades\Auth::user();
        $enrollment = $user->enrollments()->where('course_id', $id)->firstOrFail();
        
        $course = \App\Models\Course::with(['modules.topics', 'projects', 'instructor', 'learningOutcomes'])
            ->withCount('reviews')
            ->withAvg('reviews', 'rating')
            ->findOrFail($id);
            
        $completedTopicIds = \App\Models\StudentProgress::where('user_id', $user->id)
            ->where('is_completed', true)
            ->whereNotNull('topic_id')
            ->pluck('topic_id')
            ->toArray();
            
        $completedProjectIds = \App\Models\StudentProgress::where('user_id', $user->id)
            ->where('is_completed', true)
            ->whereNotNull('project_id')
            ->pluck('project_id')
            ->toArray();

        $nextTopic = null;
        $totalTopics = 0;
        
        foreach ($course->modules as $module) {
            foreach ($module->topics as $topic) {
                $totalTopics++;
                if (!$nextTopic && !in_array($topic->id, $completedTopicIds)) {
                    $nextTopic = $topic;
                }
            }
        }
        
         $leaderboard = $course->enrollments->map(function($enrollment) {
             return $enrollment->user;
        })->filter(function($user) {
             return $user && $user->student;
        })->sortByDesc(function($user) {
             return $user->student->total_xp;
        })->values()->take(5);

        return view('student.enrolled-course-details', compact('course', 'enrollment', 'completedTopicIds', 'completedProjectIds', 'nextTopic', 'totalTopics', 'leaderboard'));
    }

    public function myCourses()
    {
        return view('student.my-courses');
    }

    public function profile()
    {
        $user = \Illuminate\Support\Facades\Auth::user();
        $student = $user->student;

        $enrollments = $user->enrollments()
            ->with(['course.modules', 'course.instructor', 'course.reviews' => function($q) use($user) {
                $q->where('user_id', $user->id);
            }])
            ->orderBy('updated_at', 'desc')
            ->get();

        $inProgressCourses = $enrollments->filter(function ($enrollment) {
            return $enrollment->progress_percentage > 0 && $enrollment->progress_percentage < 100;
        });

        $notStartedCourses = $enrollments->filter(function ($enrollment) {
            return $enrollment->progress_percentage == 0;
        });

        $completedCourses = $enrollments->filter(function ($enrollment) {
            return $enrollment->progress_percentage == 100;
        });
        

        $badges = collect([]); 

        return view('student.profile', compact('user', 'student', 'inProgressCourses', 'notStartedCourses', 'completedCourses', 'badges'));
    }

    public function project()
    {
        return view('student.project');
    }

    public function topic(Request $request)
    {
        $id = $request->id; 
        if(!$id && $request->route('id')) {
             $id = $request->route('id');
        }
        
        if ($id === 'next') {
           
            return redirect()->back(); 
        }

        $topic = \App\Models\Topic::with(['module.course', 'questions.options'])->findOrFail($id);
        
        $user = \Illuminate\Support\Facades\Auth::user();
        $isEnrolled = $user->enrollments()->where('course_id', $topic->module->course_id)->exists();
        
        if (!$isEnrolled) {
            return redirect()->route('student.course-details', ['id' => $topic->module->course_id])->with('error', 'You must enroll first.');
        }

        return view('student.topic', compact('topic'));
    }

    public function enroll(Request $request)
    {
        $id = $request->query('id', $request->input('id'));
        if (!$id) {
            return redirect()->back()->with('error', 'Course ID is missing.');
        }

        $user = \Illuminate\Support\Facades\Auth::user();
        
        if ($user->enrollments()->where('course_id', $id)->exists()) {
             return redirect()->route('student.enrolled-course-details', ['id' => $id])->with('info', 'You are already enrolled.');
        }

        \App\Models\Enrollment::create([
            'user_id' => $user->id,
            'course_id' => $id,
            'progress_percentage' => 0,
            'completed_at' => null,
            'enrolled_at' => now(),
        ]);
        
        return redirect()->route('student.enrolled-course-details', ['id' => $id])->with('success', 'You have successfully enrolled in the course!');
    }

    public function updateProfile(Request $request)
    {
        $user = \Illuminate\Support\Facades\Auth::user();
        
        $request->validate([
            'name' => 'required|string|max:255',
            'headline' => 'nullable|string|max:255',
            'bio' => 'nullable|string',
            'profile_picture' => 'nullable|image|max:5120',
            'current_password' => 'nullable|required_with:new_password',
            'new_password' => 'nullable|min:8|confirmed',
        ]);

        $user->name = $request->name;
        $user->headline = $request->headline;

        if ($request->hasFile('profile_picture')) {
             $filename = time() . '_' . $request->file('profile_picture')->getClientOriginalName();
             $request->file('profile_picture')->move(public_path('uploads/profiles'), $filename);
             $user->profile_picture = 'uploads/profiles/' . $filename;
        }

        if ($request->filled('current_password') && $request->filled('new_password')) {
            if (!\Illuminate\Support\Facades\Hash::check($request->current_password, $user->password)) {
                return back()->withErrors(['current_password' => 'The provided password does not match your current password.']);
            }
            $user->password = \Illuminate\Support\Facades\Hash::make($request->new_password);
        }

        $user->save();

        if ($user->student) {
            $user->student->bio = $request->bio;
            $user->student->save();
        }

        return redirect()->back()->with('success', 'Profile updated successfully.');
    }
}
