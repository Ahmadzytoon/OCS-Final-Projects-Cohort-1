<?php

namespace App\Http\Controllers\Provider;

use App\Http\Controllers\Controller;
use App\Models\ProviderProfile;
use Illuminate\Http\Request;

class ProfileController extends Controller
{
    public function index()
    {
        $user = auth()->user();

        $profile = ProviderProfile::query()
            ->where('user_id', $user->id)
            ->first();

        return view('provider.pages.profile', compact('user', 'profile'));
    }

    public function update(Request $request)
    {
        $user = auth()->user();

        $data = $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'phone' => ['nullable', 'string', 'max:20'],
            'zip_code' => ['nullable', 'string', 'max:10'],
            'bio' => ['nullable', 'string', 'max:1000'],
        ]);

        $user->update([
            'name' => $data['name'],
            'phone' => $data['phone'] ?? null,
        ]);

        ProviderProfile::updateOrCreate(
            ['user_id' => $user->id],
            [
                'zip_code' => $data['zip_code'] ?? null,
                'bio' => $data['bio'] ?? null,
            ]
        );

        return back()->with('success', 'Profile updated.');
    }
}
