<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index()
    {
        return view('admin.dashboard');
    }

    public function users()
    {
        return view('admin.users');
    }

    public function student()
    {
        return view('admin.student');
    }

    public function instructor()
    {
        return view('admin.instructor');
    }

    public function courses()
    {
        return view('admin.courses');
    }
    public function badges()
    {
        return view('admin.badges');
    }
    public function badgeEdit()
    {
        return view('admin.badge-edit');
    }
    public function badgeDetails()
    {
        return view('admin.badge-details');
    }
    public function enrollments()
    {
        return view('admin.enrollments');
    }
}
