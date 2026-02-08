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
        Schema::create('courses', function (Blueprint $table) {
            $table->id();
            $table->foreignId('category_id')->constrained()->cascadeOnDelete();
            $table->foreignId('instructor_id')->constrained('users')->cascadeOnDelete();
            $table->string('title');
            $table->text('short_description');
            $table->text('full_description');
            $table->string('thumbnail')->nullable();
            $table->enum('difficulty', ['beginner', 'intermediate', 'advanced']);
            $table->enum('pricing', ['free', 'paid'])->default('free');
            $table->decimal('price', 10, 2)->nullable();
            $table->string('language')->default('English');
            $table->boolean('is_private')->default(false);
            $table->string('invitation_url')->nullable();
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('courses');
    }
};
