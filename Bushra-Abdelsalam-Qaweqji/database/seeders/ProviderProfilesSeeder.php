<?php

namespace Database\Seeders;

use App\Models\ProviderProfile;
use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Schema;

class ProviderProfilesSeeder extends Seeder
{
    public function run(): void
    {
        Schema::disableForeignKeyConstraints();
        ProviderProfile::query()->delete();
        Schema::enableForeignKeyConstraints();

        $providers = User::query()->where('role', User::ROLE_PROVIDER)->get();

        $bios = [
            'Reliable cleaner with strong attention to detail. Specialized in deep cleaning and kitchens.',
            'Friendly, professional, and fast. Great with recurring weekly home cleaning.',
            'Detail-oriented with experience in move-in/move-out cleaning. Brings own supplies.',
            'Careful with surfaces and finishing. Focus on bathrooms, tiles, and sanitation.',
        ];

        foreach ($providers as $i => $u) {
            ProviderProfile::create([
                'user_id' => $u->id,
                'zip_code' => (string)random_int(10000, 99999),
                'bio' => $bios[$i % count($bios)],
                'avg_rating' => 0.00,
                'rating_count' => 0,
            ]);
        }
    }
}
