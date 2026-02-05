<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Subject;
use App\Models\SchoolClass;
use App\Models\Teacher;
use Illuminate\Http\Request;

class SubjectController extends Controller
{
    public function index()
    {
        return view('admin.subjects');
    }

    public function create()
    {
        $classes = SchoolClass::all();
        $teachers = Teacher::all();
        return view('admin.subjects.create', compact('classes', 'teachers'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'class_id' => 'required|exists:classes,id',
            'teacher_id' => 'nullable|exists:teachers,id',
        ]);

        Subject::create([
            'name' => $request->name,
            'class_id' => $request->class_id,
            'teacher_id' => $request->teacher_id, // Assuming subject table has teacher_id, logic check needed
        ]);

        return redirect()->route('admin.subjects')->with('success', 'Subject created successfully!');
    }
}
