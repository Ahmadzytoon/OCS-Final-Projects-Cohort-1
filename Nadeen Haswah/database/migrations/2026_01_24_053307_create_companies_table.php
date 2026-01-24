<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('companies', function (Blueprint $table) {
            $table->id();

            // Workspace & Company Info
            $table->string('workspace_name')->unique();
            $table->string('slug')->unique();
            $table->string('company_name')->nullable();
            $table->string('logo')->nullable();

            // Additional Info
            $table->enum('company_size', ['1-10', '11-50', '51-200', '200+'])->nullable();
            $table->enum('industry', [
                'it-software',
                'accounting',
                'marketing',
                'hr',
                'manufacturing',
                'other'
            ])->nullable();
            $table->string('other_industry')->nullable();

            // Subscription
            $table->foreignId('current_subscription_id')->nullable();


            // Status
            $table->boolean('is_active')->default(true);
            $table->timestamp('activated_at')->nullable();


            $table->timestamps();
            $table->softDeletes();

            // Indexes
            $table->index('workspace_name');
            $table->index('slug');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('companies');
    }
};
