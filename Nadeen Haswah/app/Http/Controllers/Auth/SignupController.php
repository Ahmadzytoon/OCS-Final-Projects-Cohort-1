<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\Company;
use App\Models\User;

use App\Models\Plan;
use App\Models\Subscription;
// use Illuminate\Foundation\Auth\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\View;
use Illuminate\Support\Str;

class SignupController extends Controller
{
    public function show()
    {
        return View('site.loging.signup');
    }

    public function store(Request $request)
    {
        // dd('وصلنا');
        // dd($request->all());


        //  Validation
        $validated = $request->validate([
            'workspace_name' => 'required|string|max:255|unique:companies,workspace_name',
            'admin_name'     => 'required|string|max:255',
            'admin_email'    => 'required|email|unique:users,email',
            'password'       => 'required|confirmed|min:8',

            'company_size'   => 'nullable',
            'industry'       => 'nullable',
            'other_industry' => 'nullable',
        ]);

        DB::transaction(function () use ($validated) {

            //  Create Company
            $company = Company::create([
                'workspace_name' => $validated['workspace_name'],
                'slug' => Str::slug($validated['workspace_name']),
                'company_size' => $validated['company_size'] ?? null,
                'industry' => $validated['industry'] ?? null,
                'other_industry' => $validated['other_industry'] ?? null,
                'is_active' => true,
                'activated_at' => now(),
            ]);

            //  Create Company Owner
            $owner = User::create([
                'company_id' => $company->id,
                'name' => $validated['admin_name'],
                'email' => $validated['admin_email'],
                'password' => Hash::make($validated['password']),
                'role' => 'company_owner',
                'status' => 'active',
                'joined_at' => now(),
            ]);


            //  Create Free Trial Subscription
            $plan = Plan::where('name', 'free')->first();

            $subscription = Subscription::create([
                'company_id' => $company->id,
                'plan_id' => $plan->id,
                'status' => 'trial',
                'starts_at' => now(),
                'trial_ends_at' => now()->addDays(30),
                'ends_at' => now()->addDays(30),
            ]);

            // Attach subscription to company
            $company->update([
                'current_subscription_id' => $subscription->id,
            ]);

            // Auto login
            Auth::login($owner);
        });
        return redirect()
            ->route('companyOwner.index')
            ->with('success', 'Workspace created successfully 🎉');
    }
}
