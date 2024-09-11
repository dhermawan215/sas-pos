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
        Schema::create('orders', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('organization_ref_id')->nullable();
            $table->string('order_ID')->unique();
            $table->date('order_date')->nullable();
            $table->year('order_period')->nullable();
            $table->double('total')->nullable();
            $table->double('paid_amount')->nullable();
            $table->double('change_amount')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('orders');
    }
};
