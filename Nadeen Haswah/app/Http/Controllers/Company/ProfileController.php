<?php

namespace App\Http\Controllers\Company;

use App\Models\Company;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\Rule;

class ProfileController extends Controller
{
    public function update(Request $request)
    {
        $user = Auth::user();
        $company = $user->company;

        $data = $request->validate([
            'workspace_name' => [
                'required',
                'string',
                'max:255',
                Rule::unique('companies', 'workspace_name')->ignore($company->id),
            ],
            'company_size'   => ['nullable', Rule::in(['1-10', '11-50', '51-200', '200+'])],
            'industry'       => ['nullable', Rule::in(['it-software', 'accounting', 'marketing', 'hr', 'manufacturing', 'other'])],

            'admin_name'     => ['required', 'string', 'max:255'],
            'admin_email'    => [
                'required',
                'email',
                'max:255',
                Rule::unique('users', 'email')->ignore($user->id),
            ],
            'admin_phone'    => ['nullable', 'string', 'max:50'],
        ]);

        DB::transaction(function () use ($company, $user, $data) {
            $company->update([
                'workspace_name' => $data['workspace_name'],
                'company_size'   => $data['company_size'] ?? null,
                'industry'       => $data['industry'] ?? null,
            ]);

            $user->update([
                'name'  => $data['admin_name'],
                'email' => $data['admin_email'],
            ]);
        });

        return back()->with('success', 'Company profile updated successfully ✅');
    }
}
