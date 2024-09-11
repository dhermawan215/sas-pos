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
        Schema::create('sys_module_roles', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('sys_module_id')->nullable();
            $table->bigInteger('sys_user_group_id')->nullable();
            $table->tinyInteger('is_access')->nullable();
            $table->text('permission')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('sys_module_roles');
    }
};
