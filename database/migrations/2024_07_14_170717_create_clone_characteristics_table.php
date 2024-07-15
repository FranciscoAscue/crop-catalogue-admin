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
        Schema::create('clone_characteristics', function (Blueprint $table) {
            $table->id();
            $table->string('photo');
            $table->text('description')->nullable();
            $table->unsignedBigInteger('clone_id') -> nullable();
            $table->timestamps();

            $table->foreign('clone_id')->references('id')->on('clones')->onDelete('cascade')-> onUpdate('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('clone_characteristics');
    }
};
