<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Course;
use App\Models\Project;
use App\Models\Question;
use App\Models\User;

class GeneralController extends Controller
{
    public function contact()
    {
        return view('contact');
    }

    public function about()
    {
        $coursesCount = Course::count();
        $challengesCount = Question::count() + Project::count();
        $studentsCount = User::where('role', 'student')->count();

        return view('about', compact('coursesCount', 'challengesCount', 'studentsCount'));
    }

    
}
