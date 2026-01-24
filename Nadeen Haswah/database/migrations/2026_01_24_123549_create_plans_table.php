<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\DB;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('plans', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->decimal('price', 10, 2)->default(0);
            $table->enum('billing_cycle', ['monthly', 'yearly', 'lifetime'])->default('monthly');
            $table->integer('max_users')->default(0)->comment('0 = unlimited');
            $table->integer('max_knowledge_cards')->default(0)->comment('0 = unlimited');
            $table->integer('ai_requests_limit')->default(0)->comment('0 = unlimited');
            $table->boolean('is_active')->default(true);
            $table->timestamps();
            $table->softDeletes();

            // Indexes
            $table->index('is_active');
            $table->index('billing_cycle');
        });

        // Seed default plans
        $this->seedDefaultPlans();
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('plans');
    }

    /**
     * Seed default plans
     */
    private function seedDefaultPlans(): void
    {
        $plans = [
            [
                'name' => 'Free',
                'price' => 0.00,
                'billing_cycle' => 'monthly',
                'max_users' => 5,
                'max_knowledge_cards' => 10,
                'ai_requests_limit' => 50,
                'is_active' => true,
            ],
            [
                'name' => 'Starter',
                'price' => 29.99,
                'billing_cycle' => 'monthly',
                'max_users' => 20,
                'max_knowledge_cards' => 100,
                'ai_requests_limit' => 500,
                'is_active' => true,
            ],
            [
                'name' => 'Professional',
                'price' => 79.99,
                'billing_cycle' => 'monthly',
                'max_users' => 50,
                'max_knowledge_cards' => 500,
                'ai_requests_limit' => 2000,
                'is_active' => true,
            ],
            [
                'name' => 'Enterprise',
                'price' => 199.99,
                'billing_cycle' => 'monthly',
                'max_users' => 0, // unlimited
                'max_knowledge_cards' => 0, // unlimited
                'ai_requests_limit' => 0, // unlimited
                'is_active' => true,
            ],
            // Yearly plans (20% discount)
            [
                'name' => 'Starter',
                'price' => 287.90, // 29.99 * 12 * 0.8
                'billing_cycle' => 'yearly',
                'max_users' => 20,
                'max_knowledge_cards' => 100,
                'ai_requests_limit' => 500,
                'is_active' => true,
            ],
            [
                'name' => 'Professional',
                'price' => 767.90, // 79.99 * 12 * 0.8
                'billing_cycle' => 'yearly',
                'max_users' => 50,
                'max_knowledge_cards' => 500,
                'ai_requests_limit' => 2000,
                'is_active' => true,
            ],
            [
                'name' => 'Enterprise',
                'price' => 1919.90, // 199.99 * 12 * 0.8
                'billing_cycle' => 'yearly',
                'max_users' => 0,
                'max_knowledge_cards' => 0,
                'ai_requests_limit' => 0,
                'is_active' => true,
            ],
        ];

        foreach ($plans as $plan) {
            DB::table('plans')->insert([
                'name' => $plan['name'],
                'price' => $plan['price'],
                'billing_cycle' => $plan['billing_cycle'],
                'max_users' => $plan['max_users'],
                'max_knowledge_cards' => $plan['max_knowledge_cards'],
                'ai_requests_limit' => $plan['ai_requests_limit'],
                'is_active' => $plan['is_active'],
                'created_at' => now(),
                'updated_at' => now(),
            ]);
        }
    }
};
