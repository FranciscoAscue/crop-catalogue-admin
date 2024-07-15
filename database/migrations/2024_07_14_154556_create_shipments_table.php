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
        Schema::create('shipments', function (Blueprint $table) {
            $table->id();
            $table->string('crop');
            $table->unsignedBigInteger('country_id') -> nullable();;
            $table->integer('family');
            $table->integer('clone_number');
            $table->date('date_of_distribution');
            $table->integer('quantity')->nullable();
            $table->string('form_material')->nullable();
            $table->string('institution')->nullable();
            $table->string('category_of_institution')->nullable();
            $table->string('distribution_to_the_user')->nullable();
            $table->string('purpose')->nullable();
            $table->string('biological_status')->nullable();
            $table->string('biological_status_cip')->nullable();
            $table->timestamps();
            $table->foreign('country_id')->references('id')->on('countries')->onDelete('set null')-> onUpdate('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('shipments');
    }
};
