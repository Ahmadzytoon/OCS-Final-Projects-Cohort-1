<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Section;
use App\Models\SchoolClass;
use Illuminate\Http\Request;

class SectionController extends Controller
{
    public function index()
    {
        return view('admin.sections');
    }

    public function create()
    {
        $classes = SchoolClass::all();
        return view('admin.sections.create', compact('classes'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'class_id' => 'required|exists:classes,id',
        ]);

        Section::create([
            'name' => $request->name,
            'class_id' => $request->class_id,
        ]);

        return redirect()->route('admin.sections')->with('success', 'Section created successfully!');
    }
}
