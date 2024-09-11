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
        Schema::create('user_wallet_transactions', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('user_ref_id')->nullable();
            $table->bigInteger('organization_ref_id')->nullable();
            $table->string('transaction_name')->nullable();
            $table->date('transaction_date')->nullable();
            $table->enum('transaction_type', ['deposit, crerdit'])->nullable();
            $table->date('subscription_period')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('user_wallet_transactions');
    }
};
