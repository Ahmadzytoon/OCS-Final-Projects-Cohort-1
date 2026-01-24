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
        Schema::create('knowledge_entries', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('company_id');
            $table->unsignedBigInteger('department_id')->nullable();
            $table->unsignedBigInteger('knowledge_type_id');
            $table->unsignedBigInteger('created_by');

            // Common Fields
            $table->string('title');
            $table->text('summary');
            $table->json('tags')->nullable();
            $table->string('slug')->unique();

            // Type-specific data stored as JSON
            $table->json('metadata')->nullable()->comment('Stores type-specific fields based on knowledge_type');

            // Files/Attachments
            $table->json('attachments')->nullable()->comment('Array of file paths');

            // Status & Visibility
            $table->enum('status', ['draft', 'pending', 'approved', 'rejected'])->default('pending');
            $table->enum('visibility', ['public', 'department', 'private'])->default('public');

            // Approval
            $table->unsignedBigInteger('reviewed_by')->nullable();
            $table->timestamp('reviewed_at')->nullable();
            $table->text('rejection_reason')->nullable();

            // Engagement
            $table->integer('views_count')->default(0);
            $table->integer('likes_count')->default(0);
            $table->integer('comments_count')->default(0);
            $table->boolean('is_featured')->default(false);

            // Timestamps
            $table->timestamp('submitted_at')->nullable();
            $table->timestamp('published_at')->nullable();
            $table->timestamps();
            $table->softDeletes();

            // Foreign Keys
            $table->foreign('company_id')->references('id')->on('companies')->onDelete('cascade');
            $table->foreign('department_id')->references('id')->on('departments')->onDelete('set null');
            $table->foreign('knowledge_type_id')->references('id')->on('knowledge_types')->onDelete('cascade');
            $table->foreign('created_by')->references('id')->on('users')->onDelete('cascade');
            $table->foreign('reviewed_by')->references('id')->on('users')->onDelete('set null');

            // Indexes
            $table->index(['company_id', 'status']);
            $table->index(['company_id', 'knowledge_type_id']);
            $table->index(['company_id', 'department_id']);
            $table->index(['created_by']);
            $table->index('slug');
            $table->index('status');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('knowledge_entries');
    }
};
