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
        Schema::create('varieties', function (Blueprint $table) {
            $table->id();
            $table->integer('family');
            $table->integer('clone_number');
            $table->string('continent')->nullable();
            $table->unsignedBigInteger('country_id') -> nullable();;
            $table->string('accession_name');
            $table->year('year_of_cross')->nullable();
            $table->year('year_of_release')->nullable();
            $table->string('corporative_data_base_clon')->nullable();
            $table->string('corporative_data_base_fam')->nullable();
            $table->boolean('invitro')->default(false);
            $table->string('population')->nullable();
            $table->string('catalogue')->nullable();
            $table->string('organization')->nullable();
            $table->timestamps();

            $table->foreign('country_id')->references('id')->on('countries')->onDelete('set null')-> onUpdate('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('varieties');
    }
};
