<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('calendar_events', function (Blueprint $table) {
            $table->id();

            // Relations
            $table->foreignId('company_id')->constrained()->onDelete('cascade');
            $table->foreignId('department_id')->nullable()->constrained()->onDelete('cascade'); // null = Company-wide event
            $table->foreignId('created_by')->constrained('users')->onDelete('cascade');

            // Basic Info
            $table->string('title'); // Event Title
            $table->text('description')->nullable(); // Description (Optional)

            // Event Type
            $table->enum('type', [
                'meeting',      // Meeting
                'training',     // Training/Workshop
                'deadline',     // Deadline
                'social',       // Social Event
                'holiday'       // Holiday/Off
            ]);

            // Location
            $table->enum('location_type', [
                'office',       // Office
                'online',       // Online/Zoom
                'external'      // External Location
            ])->nullable();
            $table->string('location_details')->nullable(); // تفاصيل الموقع (مثل: رابط Zoom أو عنوان)

            // Date & Time
            $table->date('start_date'); // Start Date
            $table->time('start_time')->nullable(); // Start Time (null if all-day)
            $table->date('end_date'); // End Date
            $table->time('end_time')->nullable(); // End Time (null if all-day)

            // Settings
            $table->boolean('is_all_day')->default(false); // All-day event
            $table->boolean('send_notification')->default(true); // Send notification to all employees

            // Visibility
            $table->boolean('is_public')->default(false); // true = Company-wide, false = Department only

            // Color (optional - for calendar display)
            $table->string('color')->nullable(); // مثل: #47b2e4

            // Metadata
            $table->string('slug')->nullable(); // URL-friendly slug

            $table->timestamps();
            $table->softDeletes();

            // Indexes
            $table->index(['company_id', 'is_public', 'start_date']);
            $table->index(['company_id', 'department_id', 'start_date']);
            $table->index(['type', 'start_date']);
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('calendar_events');
    }
};
