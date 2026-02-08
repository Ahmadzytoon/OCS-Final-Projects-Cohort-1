<?php

namespace App\Http\Controllers\Visitor;

use App\Http\Controllers\Controller;
use App\Models\Course;
use App\Models\User;
use Illuminate\Http\Request;

class VisitorController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index() {}

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
        $topCourses = Course::with(['instructor'])
            ->withCount('enrollments')
            ->withAvg('reviews', 'rating')
            ->orderByDesc('enrollments_count')
            ->limit(6)
            ->get();

        $totalStudents = User::where('role', 'student')->count();

        $totalCourses = Course::count();

        $topInstructors = User::where('role', 'instructor')
            ->withCount(['courses as total_students' => function ($query) {
                $query->join('enrollments', 'courses.id', '=', 'enrollments.course_id');
            }])
            ->get(['id', 'name']);

        return view('visitor.home', compact(
            'topCourses',
            'totalStudents',
            'totalCourses',
            'topInstructors'
        ));
    }



    public function courses()
{
    return view('visitor.courses');
}
    public function about()
    {
        return view('visitor.about');
    }

    public function login()
    {
        return view('livewire.pages.auth.login');
    }
    public function contact()
    {
        return view('visitor.contact');
    }

    public function courseDetails(Course $course)
    {
        $course->load('instructor', 'modules', 'projects', 'reviews');

        $averageRating = $course->reviews()->exists()
            ? round($course->reviews()->avg('rating'), 1)
            : 0;

        $studentCount = $course->enrollments()->count();

        return view('visitor.course-details', compact(
            'course',
            'averageRating',
            'studentCount'
        ));
    }


    public function pricing()
    {
        return view('visitor.pricing');
    }
}
