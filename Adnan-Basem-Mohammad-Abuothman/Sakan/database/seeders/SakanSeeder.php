<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;


use App\Models\User;
use App\Models\University;
use App\Models\Apartment;
use App\Models\Feature;
use App\Models\ApartmentImage;
use Illuminate\Support\Facades\Hash;



class SakanSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {


       

        // 2. Create Common Features
        $features = ['WiFi', 'Kitchen', 'Air Conditioning', 'Elevator', 'Washing Machine'];
        foreach ($features as $f) {
            Feature::create(['name' => $f]);
        }

        // 3. Create an Owner
        $owner = User::create([
            'name' => 'Samer Owner',
            'email' => 'owner@gmail.com',
            'password' => Hash::make('password'),
            'role' => 'owner',
            'phone' => '0791234567'
        ]);

        // 4. Create an Apartment for this Owner
        $apartment = Apartment::create([
            'owner_id' => $owner->id,
            'university_id' => 2, // Yarmouk
            'name' => 'Sample Apartment',
            'location' => 'Amman, Tabarbor',
            'area' => 45,
            'allowed_gender' => 'male',
            'rent_type' => 'whole',
            'price' => 150.00,
            'description' => 'A very nice Apartment for students, close to everything.',
            'status' => 'available'
        ]);

        // 5. Attach Features (Using the relationship you just wrote!)
        $allFeatures = Feature::pluck('id')->toArray();
        $apartment->features()->attach($allFeatures);

        // 6. Add Images
        ApartmentImage::create([
            'apartment_id' => $apartment->id,
            'image_path' => 'apartments/sample1.jpg',
            'is_main' => true
        ]);


    }
}
