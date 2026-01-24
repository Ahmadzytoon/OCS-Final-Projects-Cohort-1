<?php

namespace App\Http\Controllers\Instructor;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class InstructorController extends Controller
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
        
        $courses = $user->courses()
            ->with(['modules', 'enrollments'])
            ->withCount(['enrollments', 'reviews'])
            ->withAvg('reviews', 'rating')
            ->orderBy('created_at', 'desc')
            ->get();

        $publishedCourses = $courses->where('is_private', false);
        $draftCourses = $courses->where('is_private', true);

        return view('instructor.home', compact('user', 'courses', 'publishedCourses', 'draftCourses'));
    }

    public function generateCourse()
    {
        return view('instructor.generate-course');
    }

    public function editCourse(\Illuminate\Http\Request $request)
    {
        $course = null;
        if ($request->has('id')) {
            $course = \App\Models\Course::with(['learningOutcomes', 'modules.topics.questions'])->find($request->id);
            
            if ($course && $course->instructor_id !== \Illuminate\Support\Facades\Auth::id()) {
                abort(403);
            }
        }

        $categories = \App\Models\Category::all();

        return view('instructor.edit-course', compact('course', 'categories'));
    }

    public function myCourseDetails(Request $request)
    {
        $id = $request->query('id'); 
        
        if (!$id) {
            return redirect()->route('instructor.home');
        }

        $course = \App\Models\Course::with([
            'modules.topics', 
            'projects.submissions.user',
            'learningOutcomes',
            'enrollments.user.student'
        ])
        ->withCount('reviews')
        ->withAvg('reviews', 'rating')
        ->findOrFail($id);

        if ($course->instructor_id !== \Illuminate\Support\Facades\Auth::id()) {
            abort(403);
        }

        $leaderboard = $course->enrollments->map(function($enrollment) {
             return $enrollment->user;
        })->filter(function($user) {
             return $user && $user->student;
        })->sortByDesc(function($user) {
             return $user->student->total_xp;
        })->values()->take(10); 

        $submissions = $course->projects->flatMap(function($project) {
            return $project->submissions->map(function($submission) use ($project) {
                $submission->project_title = $project->title;
                return $submission;
            });
        })->sortByDesc('created_at');

        return view('instructor.my-course-details', compact('course', 'leaderboard', 'submissions'));
    }

    public function profile()
    {
        $user = \Illuminate\Support\Facades\Auth::user();
        
        $courses = $user->courses()
            ->withCount(['enrollments', 'reviews'])
            ->withAvg('reviews', 'rating')
            ->orderBy('created_at', 'desc')
            ->get();

        $publishedCourses = $courses->where('is_private', false);
        $pendingCourses = $courses->where('is_private', true);
        
        $totalStudents = $courses->sum('enrollments_count');
        
        $totalRating = 0;
        $ratedCourses = 0;
        foreach($courses as $c) {
            if($c->reviews_avg_rating) {
                $totalRating += $c->reviews_avg_rating;
                $ratedCourses++;
            }
        }
        $instructorRating = $ratedCourses > 0 ? $totalRating / $ratedCourses : 0;

        $reviews = \App\Models\Review::whereHas('course', function ($query) use ($user) {
            $query->where('instructor_id', $user->id);
        })->with(['user', 'course'])->latest()->take(20)->get();

        return view('instructor.profile', compact('user', 'courses', 'publishedCourses', 'pendingCourses', 'reviews', 'totalStudents', 'instructorRating'));
    }

    public function editProject()
    {
        return view('instructor.edit-project');
    }

    public function editTopic(Request $request)
    {
        $topic = null;
        if ($request->has('id')) {
            $topic = \App\Models\Topic::with(['questions.options', 'module'])->find($request->id);
            $moduleId = $topic->module_id; 
        } else {
            $moduleId = $request->query('module_id');
        }
        
        return view('instructor.edit-topic', compact('topic', 'moduleId'));
    }

    public function saveTopic(Request $request)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'content' => 'required|string',
            'module_id' => 'required_without:topic_id|exists:modules,id',
            'topic_id' => 'nullable|exists:topics,id',
            'questions' => 'nullable|array',
            'questions.*.text' => 'required|string',
            'questions.*.type' => 'required|in:multiple_choice,task',
        ]);

        if ($request->topic_id) {
            $topic = \App\Models\Topic::find($request->topic_id);
            $topic->title = $request->title;
            
            $topic->content = $request->content;
            $topic->save();
        } else {
            $topic = new \App\Models\Topic();
            $topic->module_id = $request->module_id;
            $topic->title = $request->title;
            $topic->content = $request->content;
            $topic->xp_points = 10; 
            $topic->order = \App\Models\Topic::where('module_id', $request->module_id)->max('order') + 1;
            $topic->save();
        }

        $existingQuestionIds = [];
        $questionOrder = 1;

        if ($request->has('questions')) {
            foreach ($request->questions as $qData) {
                if (isset($qData['id'])) {
                    $question = \App\Models\Question::find($qData['id']);
                    if ($question) {
                        $question->question_text = $qData['text'];
                        $question->type = $qData['type'];
                        $question->explanation = $qData['explanation'] ?? null;
                        $question->order = $questionOrder++;
                        $question->save();
                        $existingQuestionIds[] = $question->id;
                    }
                } else {
                    $question = new \App\Models\Question();
                    $question->topic_id = $topic->id;
                    $question->question_text = $qData['text'];
                    $question->type = $qData['type'];
                    $question->explanation = $qData['explanation'] ?? null;
                    $question->order = $questionOrder++;
                    $question->save();
                    $existingQuestionIds[] = $question->id;
                }

                if (isset($qData['options']) && is_array($qData['options'])) {
                    $question->options()->delete();
                    $optionOrder = 1;
                    foreach ($qData['options'] as $oData) {
                        if (!empty($oData['text'])) {
                            \App\Models\QuestionOption::create([
                                'question_id' => $question->id,
                                'option_text' => $oData['text'],
                                'is_correct' => isset($oData['is_correct']) && $oData['is_correct'] == '1',
                                'order' => $optionOrder++
                            ]);
                        }
                    }
                }
            }
        }
        
        $topic->questions()->whereNotIn('id', $existingQuestionIds)->delete();

        return redirect()->route('instructor.edit-topic', ['id' => $topic->id])->with('success', 'Topic saved successfully');
    }

    public function previewProject()
    {
        return view('student.project');
    }
    public function previewTopic(Request $request)
    {
        $topic = null;
        if($request->has('id')) {
             $topic = \App\Models\Topic::with(['questions.options'])->find($request->id);
        }
        return view('student.topic', compact('topic'));
    }

    public function storeCourse(Request $request)
    {
        $request->validate([
            'courseTitle' => 'required|min:10',
            'short_description' => 'required|max:160',
            'full_description' => 'required',
            'category_id' => 'required|exists:categories,id',
            'difficulty' => 'required|in:beginner,intermediate,advanced',
            'pricing' => 'required|in:free,paid',
            'price' => 'nullable|numeric|min:0',
            'courseThumbnail' => 'nullable|image|max:2048',
            'outcomes' => 'required|array|min:3',
            'outcomes.*' => 'required|string',
        ]);

        $course = new \App\Models\Course();
        $course->instructor_id = \Illuminate\Support\Facades\Auth::id();
        $course->title = $request->courseTitle;
        $course->short_description = $request->short_description;
        $course->full_description = $request->full_description;
        $course->category_id = $request->category_id;
        $course->difficulty = $request->difficulty;
        $course->pricing = $request->pricing;
        $course->price = $request->pricing === 'paid' ? $request->price : 0;
        $course->is_private = true; 
        
        if ($request->hasFile('courseThumbnail')) {
             $filename = time() . '_' . $request->file('courseThumbnail')->getClientOriginalName();
             $request->file('courseThumbnail')->move(public_path('general/img/education'), $filename);
             $course->thumbnail = $filename;
        }

        $course->save();

        foreach ($request->outcomes as $index => $description) {
            if ($description) {
                $course->learningOutcomes()->create([
                    'outcome_text' => $description,
                    'order' => $index + 1
                ]);
            }
        }

        return redirect()->route('instructor.edit-course', ['id' => $course->id])->with('success', 'Course created successfully!');
    }

    public function updateCourse(Request $request, $id)
    {
        $course = \App\Models\Course::where('id', $id)->where('instructor_id', \Illuminate\Support\Facades\Auth::id())->firstOrFail();

        $request->validate([
            'courseTitle' => 'required|min:10',
            'short_description' => 'required|max:160',
            'full_description' => 'required',
            'category_id' => 'required|exists:categories,id',
            'difficulty' => 'required|in:beginner,intermediate,advanced',
            'pricing' => 'required|in:free,paid',
            'price' => 'nullable|numeric|min:0',
            'courseThumbnail' => 'nullable|image|max:2048',
            'outcomes' => 'required|array|min:3',
            'outcomes.*' => 'required|string',
        ]);

        $course->title = $request->courseTitle;
        $course->short_description = $request->short_description;
        $course->full_description = $request->full_description;
        $course->category_id = $request->category_id;
        $course->difficulty = $request->difficulty;
        $course->pricing = $request->pricing;
        $course->price = $request->pricing === 'paid' ? $request->price : 0;

        if ($request->hasFile('courseThumbnail')) {
             $filename = time() . '_' . $request->file('courseThumbnail')->getClientOriginalName();
             $request->file('courseThumbnail')->move(public_path('general/img/education'), $filename);
             $course->thumbnail = $filename;
        }

        $course->save();

        $course->learningOutcomes()->forceDelete();
        foreach ($request->outcomes as $index => $description) {
            if ($description) {
                $course->learningOutcomes()->create([
                    'outcome_text' => $description,
                    'order' => $index + 1
                ]);
            }
        }

        return redirect()->route('instructor.edit-course', ['id' => $course->id])->with('success', 'Course updated successfully!');
    }

    public function storeModule(Request $request)
    {
        $request->validate([
            'course_id' => 'required|exists:courses,id',
            'title' => 'required|string|max:255',
            'description' => 'nullable|string',
        ]);

        $module = new \App\Models\Module();
        $module->course_id = $request->course_id;
        $module->title = $request->title;
        $module->description = $request->description;
        $module->order = \App\Models\Module::where('course_id', $request->course_id)->max('order') + 1;
        $module->save();

        return redirect()->back()->with('success', 'Module added successfully');
    }

    public function updateModule(Request $request, $id)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'nullable|string',
        ]);

        $module = \App\Models\Module::findOrFail($id);
        $module->title = $request->title;
        $module->description = $request->description;
        $module->save();

        return redirect()->back()->with('success', 'Module updated successfully');
    }

    public function deleteModule($id)
    {
        $module = \App\Models\Module::findOrFail($id);
        $module->delete();

        return redirect()->back()->with('success', 'Module deleted successfully');
    }

    public function deleteTopic($id)
    {
        $topic = \App\Models\Topic::findOrFail($id);
        $topic->delete();

        return redirect()->back()->with('success', 'Topic deleted successfully');
    }

    public function saveSettings(Request $request, $id)
    {
        $course = \App\Models\Course::where('id', $id)->where('instructor_id', \Illuminate\Support\Facades\Auth::id())->firstOrFail();

        $course->is_private = $request->has('is_private');
        $course->invitation_url = $request->invitation_url;
        $course->save();

        return redirect()->back()->with('success', 'Settings updated successfully');
    }

    public function updateProfile(Request $request)
    {
        $user = \Illuminate\Support\Facades\Auth::user();
        
        $request->validate([
            'name' => 'required|string|max:255',
            'headline' => 'nullable|string|max:255',
            'bio' => 'nullable|string',
            'profile_picture' => 'nullable|image|max:5120', // 5MB
            'current_password' => 'nullable|required_with:new_password',
            'new_password' => 'nullable|min:8|confirmed',
        ]);

        // Update User info
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

        if ($user->instructor) {
            $user->instructor->teaching_experience = $request->bio;
            $user->instructor->save();
        }

        return redirect()->back()->with('success', 'Profile updated successfully.');
    }
}
