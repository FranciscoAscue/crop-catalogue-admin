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
        Schema::create('reviews', function (Blueprint $table) {
            $table->id();
            $table->integer('value');
            $table->unsignedBigInteger('user_id') -> nullable();
            $table->unsignedBigInteger('country_id') -> nullable();

            $table->foreign('user_id')->references('id')->on('users')->onDelete('set null') -> onUpdate('cascade');
            $table->foreign('country_id')->references('id')->on('countries')->onDelete('set null') -> onUpdate('cascade');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('reviews');
    }
};