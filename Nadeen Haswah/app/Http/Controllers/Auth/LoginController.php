<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    public function index()
    {
        return view('site.loging.login');
    }

    public function login(Request $request)
    {
        $credentials = $request->validate([
            'email'    => 'required|email',
            'password' => 'required',
        ]);

        if (Auth::attempt($credentials)) {

            $request->session()->regenerate();

            $user = Auth::user();

            return match ($user->role) {
                'company_owner'      => redirect()->route('companyOwner.index'),
                'department_manager' => redirect()->route('department_manager.index'),
                'employee'           => redirect()->route('employee.index'),
                default              => redirect()->route('login'),
            };
        }

        return back()->with('error', 'Invalid email or password');
    }
}
