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
        Schema::create('users', function (Blueprint $table) {
            $table->id();
            $table->string('user_name','50');
            $table->string('user_phone','50');
            $table->string('user_email','50');
            $table->string('user_password','50');
            $table->string('user_roll','50');
            $table->string('print','10')->default('0');
            $table->string('report','10')->default('0');
            $table->string('menu','10')->default('50');
            $table->string('status','10')->default('0');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('users');
    }
};
