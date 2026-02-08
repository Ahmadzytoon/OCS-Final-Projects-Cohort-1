<?php

namespace Database\Seeders;

use App\Models\Article;
use App\Models\Category;
use App\Models\LawyerProfile;
use App\Models\Question;
use App\Models\QuestionReply;
use App\Models\User;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    public function run(): void
    {
        // 0) Admin User
        User::factory()->create([
            'name' => 'System Admin',
            'email' => 'admin@example.com',
            'role' => 'admin',
            'password' => bcrypt('password'), // password
        ]);

        // 0.1) Test User (Regular Client)
        $testUser = User::factory()->create([
            'name' => 'Test User',
            'email' => 'user@example.com',
            'role' => 'user',
            'password' => bcrypt('password'), // password
        ]);

        // 0.2) Test Lawyer (Approved)
        $testLawyer = User::factory()->create([
            'name' => 'Test Lawyer',
            'email' => 'lawyer@example.com',
            'role' => 'lawyer',
            'password' => bcrypt('password'), // password
        ]);
        
        LawyerProfile::create([
            'user_id' => $testLawyer->id,
            'status' => 'accepted', // Approved
            'bio' => 'An expert test lawyer for demonstration purposes.',
            'license_number' => 'TEST-BAR-001',
            'location' => 'Amman',
        ]);

        // 1) Specialized Categories (Real Legal Areas)
        $categoriesNames = [
            'Corporate Law', 'Family Law', 'Criminal Defense', 'Real Estate', 
            'Intellectual Property', 'Immigration', 'Labor & Employment', 'Personal Injury',
            'Tax Law', 'Environmental Law', 'Bankruptcy', 'Civil Rights'
        ];
        
        $categories = collect();
        foreach ($categoriesNames as $name) {
            $categories->push(Category::create(['name' => $name, 'slug' => \Illuminate\Support\Str::slug($name)]));
        }

        // Attach categories to test lawyer
        $testLawyer->specializations()->attach($categories->random(2)->pluck('id'));

        // 2) Realistic Lawyers Data
        $lawyerData = [
            ['name' => 'Sarah Jenkins', 'bio' => 'Senior Corporate Attorney with 15 years of experience in mergers and acquisitions. Harvard Law graduate committed to helping startups navigate complex regulations.', 'specialization' => 'Corporate Law'],
            ['name' => 'Michael Chen', 'bio' => 'Dedicated Family Law practitioner focusing on divorce mediation and child custody. I believe in amicable resolutions whenever possible.', 'specialization' => 'Family Law'],
            ['name' => 'David Rodriguez', 'bio' => 'Aggressive Criminal Defense lawyer who fights for your rights. Former prosecutor with deep insight into the justice system.', 'specialization' => 'Criminal Defense'],
            ['name' => 'Emily White', 'bio' => 'Intellectual Property expert helping creatives and tech companies protect their innovations. Patent and trademark specialist.', 'specialization' => 'Intellectual Property'],
            ['name' => 'James Wilson', 'bio' => 'Real Estate attorney handling commercial and residential transactions. ensuring your property deals are secure and compliant.', 'specialization' => 'Real Estate'],
        ];

        $lawyerUsers = collect();
        $lawyerUsers->push($testLawyer); // Add test lawyer to the pool

        foreach ($lawyerData as $data) {
            $user = User::create([
                'name' => $data['name'],
                'email' => strtolower(str_replace(' ', '.', $data['name'])) . '@law.com',
                'role' => 'lawyer',
                'password' => bcrypt('password'),
            ]);
            
            $lawyerUsers->push($user);

            LawyerProfile::create([
                'user_id' => $user->id,
                'status' => 'accepted',
                'bio' => $data['bio'],
                'license_number' => 'BAR-' . rand(10000, 99999),
                'phone' => '+1 555 ' . rand(100, 999) . ' ' . rand(1000, 9999),
                'whatsapp_number' => '+1 555 ' . rand(100, 999) . ' ' . rand(1000, 9999),
                'linkedin_profile' => 'https://linkedin.com/in/' . strtolower(str_replace(' ', '', $data['name'])),
                'location' => collect(['Amman', 'Zarqa', 'Irbid', 'Aqaba', 'Salt'])->random(),
            ]);

            // Attach specific category to User
            $cat = $categories->where('name', $data['specialization'])->first();
            $user->specializations()->attach($cat->id);
            // Add a random second category
            $user->specializations()->attach($categories->where('name', '!=', $data['specialization'])->random()->id);
        }

        // 2.1) Generate 20 Additional Random Lawyers
        $randomLawyers = User::factory()->count(20)->create([
            'role' => 'lawyer',
        ]);

        foreach ($randomLawyers as $rndLawyer) {
            $lawyerUsers->push($rndLawyer);

            LawyerProfile::factory()->create([
                'user_id' => $rndLawyer->id,
                'status' => 'accepted',
                'location' => collect(['Amman', 'Zarqa', 'Irbid', 'Aqaba', 'Salt'])->random(),
            ]);

            // Attach 1-3 random categories to User
            $rndLawyer->specializations()->attach(
                $categories->random(rand(1, 3))->pluck('id')->toArray()
            );
        }

        // 3) Create Users (Clients)
        $clientUsers = collect();
        $clientUsers->push($testUser);
        
        $randomClients = User::factory()->count(30)->create(['role' => 'user']);
        $clientUsers = $clientUsers->merge($randomClients);

        // 4) Realistic Questions & Answers
        $questionsData = [
            ['title' => 'Can I get my deposit back if I break my lease early?', 'cat' => 'Real Estate', 'desc' => 'I signed a 12-month lease but need to move for work after 6 months. My landlord says he keeps the deposit. Is this legal in most states?'],
            ['title' => 'How do I trademark my new software logo?', 'cat' => 'Intellectual Property', 'desc' => 'I just launched a SaaS startup and want to protect my branding. What is the process for registering a trademark globally?'],
            ['title' => 'Custody rights for unmarried fathers?', 'cat' => 'Family Law', 'desc' => 'My partner and I are separating. We were never married. What are my automatic rights regarding visitation and custody of our 5-year-old?'],
            ['title' => 'Slip and fall at a grocery store, who is liable?', 'cat' => 'Personal Injury', 'desc' => 'I slipped on a wet floor that had no warning sign. I broke my wrist. Can I sue for medical bills and lost wages?'],
            ['title' => 'Starting a LLC vs S-Corp for freelance work?', 'cat' => 'Corporate Law', 'desc' => 'I am a freelance graphic designer making about $80k/year. Should I form an LLC or is an S-Corp better for tax purposes?'],
        ];

        foreach ($questionsData as $qData) {
            $cat = $categories->where('name', $qData['cat'])->first() ?? $categories->first();
            
            $question = Question::create([
                'user_id' => $clientUsers->random()->id,
                'category_id' => $cat->id,
                'title' => $qData['title'],
                'description' => $qData['desc'],
                'status' => 'open',
                'created_at' => now()->subDays(rand(1, 10)),
            ]);

            // Add a reply from a relevant lawyer (or random if none found in loop)
            $lawyerPool = $testLawyer->specializations->contains($cat->id) ? collect([$testLawyer]) : $lawyerUsers;
            $relevantLawyer = $lawyerPool->random();

            QuestionReply::create([
                'question_id' => $question->id,
                'lawyer_id' => $relevantLawyer->id,
                'body' => "This is a complex issue depending on your jurisdiction. Generally, {$qData['cat']} dictates that... [Detailed legal advice would follow]. You should consult with a local attorney.",
                'created_at' => now()->subDays(rand(1, 5)),
            ]);
        }

        // 4.1) Generate 50 Additional Random Questions
        for ($i = 0; $i < 50; $i++) {
            $qCat = $categories->random();
            $qUser = $clientUsers->random();
            
            $question = Question::factory()->create([
                'user_id' => $qUser->id,
                'category_id' => $qCat->id,
                'created_at' => now()->subDays(rand(1, 60)),
            ]);

            // 70% chance of having replies
            if (rand(1, 100) <= 70) {
                $numReplies = rand(1, 3);
                for ($j = 0; $j < $numReplies; $j++) {
                    QuestionReply::factory()->create([
                        'question_id' => $question->id,
                        'lawyer_id' => $lawyerUsers->random()->id,
                        'created_at' => $question->created_at->addHours(rand(1, 48)),
                    ]);
                }
            }
        }

        // 5) Realistic Articles (Blog)
        $articlesData = [
            ['title' => '5 Common Mistakes in Startup Incorporations', 'cat' => 'Corporate Law'],
            ['title' => 'Understanding Alimony: What You Need to Know', 'cat' => 'Family Law'],
            ['title' => 'Your Rights When Stopped by Police', 'cat' => 'Criminal Defense'],
            ['title' => 'A Guide to Commercial Lease Agreements', 'cat' => 'Real Estate'],
            ['title' => 'Copyright vs Trademark: What is the Difference?', 'cat' => 'Intellectual Property'],
        ];

        foreach ($articlesData as $aData) {
             $cat = $categories->where('name', $aData['cat'])->first();
             Article::create([
                 'author_id' => $lawyerUsers->random()->id,
                 'category_id' => $cat->id,
                 'title' => $aData['title'],
                 'content' => "<p>Detailed guide about <strong>{$aData['title']}</strong>. Legal nuances are important to understand...</p><p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.</p>",
                 'image_path' => 'https://images.unsplash.com/photo-1505664194779-8beaceb93744?w=800&q=80',
                 'status' => 'published',
                 'created_at' => now()->subDays(rand(2, 20)),
             ]);
        }

        // 5.1) Generate 25 Additional Random Articles
        for ($i = 0; $i < 25; $i++) {
            Article::factory()->create([
                'author_id' => $lawyerUsers->random()->id,
                'category_id' => $categories->random()->id,
                'created_at' => now()->subDays(rand(1, 90)),
                'status' => 'published',
            ]);
        }
    }
}
