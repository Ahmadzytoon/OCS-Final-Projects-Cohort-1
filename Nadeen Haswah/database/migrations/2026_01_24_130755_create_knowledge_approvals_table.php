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
        Schema::create('knowledge_approvals', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('knowledge_entry_id');
            $table->unsignedBigInteger('approved_by');
            $table->enum('status', ['approved', 'rejected', 'pending_changes'])->default('approved');
            $table->text('comment')->nullable();
            $table->timestamps();
            $table->softDeletes();

            // Foreign Keys
            $table->foreign('knowledge_entry_id')->references('id')->on('knowledge_entries')->onDelete('cascade');
            $table->foreign('approved_by')->references('id')->on('users')->onDelete('cascade');

            // Indexes
            $table->index(['knowledge_entry_id', 'status']);
            $table->index('approved_by');
            $table->index('status');
            $table->index('created_at');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('knowledge_approvals');
    }
};
