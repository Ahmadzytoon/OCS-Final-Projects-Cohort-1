<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Student;
use App\Models\SchoolClass;
use App\Models\Section;
use Illuminate\Http\Request;

class StudentController extends Controller
{
    public function index()
    {
        return view('admin.students');
    }

    public function create()
    {
        $classes = SchoolClass::with('sections')->get();
        return view('admin.students.create', compact('classes'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'class_id' => 'required|exists:classes,id',
            'section_id' => 'required|exists:sections,id',
        ]);

        Student::create([
            'name' => $request->name,
            'class_id' => $request->class_id,
            'section_id' => $request->section_id,
        ]);

        return redirect()->route('admin.students')->with('success', 'Student created successfully!');
    }
}
