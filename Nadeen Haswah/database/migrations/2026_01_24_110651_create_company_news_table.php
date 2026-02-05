<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('company_news', function (Blueprint $table) {
            $table->id();

            // Relations
            $table->foreignId('company_id')->constrained()->onDelete('cascade');
            $table->foreignId('created_by')->constrained('users')->onDelete('cascade'); // مؤلف الخبر
            $table->foreignId('publisher_id')->nullable()->constrained('users')->onDelete('set null'); // الناشر المسؤول (optional)

            // Basic Info
            $table->string('title'); // News Title
            $table->text('summary')->nullable(); // ملخص قصير (يمكن توليده تلقائياً)
            $table->longText('content'); // News Content

            // Media
            $table->string('featured_image')->nullable(); // Featured Image

            // Category
            $table->enum('category', [
                'company',      // Company Update
                'product',      // Product News
                'hr',          // HR Update
                'achievement', // Achievement
                'announcement' // Announcement
            ])->nullable();

            // Publication Info
            $table->enum('status', [
                'draft',      // Save as Draft
                'scheduled',  // Schedule for Later
                'published'   // Publish Immediately (or published after schedule)
            ])->default('draft');

            $table->timestamp('published_at')->nullable(); // وقت النشر (للـ immediate أو scheduled)
            $table->timestamp('scheduled_at')->nullable(); // للـ Schedule for Later

            // Settings
            $table->boolean('send_notification')->default(true); // Send notification to all employees
            $table->boolean('allow_comments')->default(true); // Allow employee comments

            // Metadata
            $table->string('slug')->unique(); // URL-friendly slug
            $table->integer('views_count')->default(0); // عدد المشاهدات
            $table->integer('comments_count')->default(0); // عدد التعليقات

            $table->timestamps();
            $table->softDeletes();

            // Indexes
            $table->index(['company_id', 'status', 'published_at']);
            $table->index(['company_id', 'category']);
            $table->index('slug');
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('company_news');
    }
};
