<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Schema;

class UsersSeeder extends Seeder
{
    public function run(): void
    {
        Schema::disableForeignKeyConstraints();
        User::query()->delete();
        Schema::enableForeignKeyConstraints();

        // Admin
        User::create([
            'role' => User::ROLE_ADMIN,
            'name' => 'Cleanova Admin',
            'email' => 'admin@cleanova.test',
            'password' => 'Password123!',
            'phone' => '0791234567',
            'status' => User::STATUS_ACTIVE,
        ]);

        // Customers
        for ($i = 1; $i <= 12; $i++) {
            User::create([
                'role' => User::ROLE_CUSTOMER,
                'name' => "Customer {$i}",
                'email' => "customer{$i}@cleanova.test",
                'password' => 'Password123!',
                'phone' => '07' . str_pad((string)random_int(10000000, 99999999), 8, '0', STR_PAD_LEFT),
                'status' => User::STATUS_ACTIVE,
            ]);
        }

        // Providers
        for ($i = 1; $i <= 8; $i++) {
            User::create([
                'role' => User::ROLE_PROVIDER,
                'name' => "Provider {$i}",
                'email' => "provider{$i}@cleanova.test",
                'password' => 'Password123!',
                'phone' => '07' . str_pad((string)random_int(10000000, 99999999), 8, '0', STR_PAD_LEFT),
                'status' => User::STATUS_ACTIVE,
            ]);
        }
    }
}
