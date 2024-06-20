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
        Schema::create('billing_skacks', function (Blueprint $table) {
            $table->id();
            $table->string('billing_no','50');
            $table->string('manu','150');
            $table->string('price','50');
            $table->string('count','10')->default('1');
            $table->string('status','10')->default('0');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('billing_skacks');
    }
};
