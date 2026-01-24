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
        Schema::create('payments', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('subscription_id');
            $table->unsignedBigInteger('company_id');
            $table->decimal('amount', 10, 2);
            $table->string('currency', 3)->default('USD');
            $table->enum('payment_method', [
                'credit_card',
                'debit_card',
                'paypal',
                'stripe',
                'bank_transfer',
                'cash',
                'other'
            ])->default('credit_card');
            $table->enum('payment_status', [
                'pending',
                'processing',
                'completed',
                'failed',
                'refunded',
                'cancelled'
            ])->default('pending');
            $table->string('transaction_id')->nullable()->unique();
            $table->text('payment_details')->nullable()->comment('JSON data for payment gateway response');
            $table->text('failure_reason')->nullable();
            $table->timestamp('paid_at')->nullable();
            $table->timestamp('refunded_at')->nullable();
            $table->timestamps();
            $table->softDeletes();

            // Foreign Keys
            $table->foreign('subscription_id')->references('id')->on('subscriptions')->onDelete('cascade');
            $table->foreign('company_id')->references('id')->on('companies')->onDelete('cascade');

            // Indexes
            $table->index(['company_id', 'payment_status']);
            $table->index(['subscription_id', 'payment_status']);
            $table->index('payment_status');
            $table->index('paid_at');
            $table->index('transaction_id');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('payments');
    }
};
