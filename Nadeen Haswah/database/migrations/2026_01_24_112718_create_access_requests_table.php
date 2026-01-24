<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('access_requests', function (Blueprint $table) {
            $table->id();

            // Relations
            $table->foreignId('company_id')->constrained()->onDelete('cascade');
            $table->foreignId('department_id')->nullable()->constrained()->onDelete('set null'); // Assigned when approved

            // Requester Info
            $table->string('name'); // اسم الشخص طالب الدخول
            $table->string('email'); // البريد الإلكتروني
            $table->string('phone')->nullable(); // رقم الهاتف (اختياري)
            $table->string('position')->nullable(); // المسمى الوظيفي المطلوب
            $table->text('message')->nullable(); // رسالة من الطالب

            // Request Status
            $table->enum('status', [
                'pending',   // في انتظار المراجعة
                'approved',  // تمت الموافقة
                'rejected'   // تم الرفض
            ])->default('pending');

            // Approval/Rejection Info
            $table->enum('assigned_role', [
                'company_owner',
                'department_manager',
                'employee'
            ])->nullable(); // الدور المخصص عند الموافقة

            $table->foreignId('reviewed_by')->nullable()->constrained('users')->onDelete('set null'); // من راجع الطلب
            $table->timestamp('reviewed_at')->nullable(); // وقت المراجعة

            // Rejection Info
            $table->enum('rejection_reason', [
                'not_hiring',         // Not currently hiring
                'no_position',        // No available positions
                'qualifications',     // Doesn't meet qualifications
                'other'               // Other
            ])->nullable();
            $table->text('rejection_message')->nullable(); // Additional Message

            // Approval Info
            $table->text('welcome_message')->nullable(); // Welcome Message (Optional)

            // Timestamps
            $table->timestamp('requested_at')->useCurrent(); // وقت تقديم الطلب
            $table->timestamps();
            $table->softDeletes();

            // Indexes
            $table->index(['company_id', 'status', 'requested_at']);
            $table->index(['company_id', 'email']);
            $table->index('status');
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('access_requests');
    }
};
