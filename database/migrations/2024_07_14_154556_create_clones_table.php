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
        Schema::create('clones', function (Blueprint $table) {
            $table->id();
            $table->integer('family');
            $table->integer('clone_number');
            $table->string('catalogue')->nullable();
            $table->string('population_group')->nullable();
            $table->string('parent_female')->nullable();
            $table->string('parent_male')->nullable();
            $table->string('predominant_tuber_skin_color')->nullable();
            $table->string('tuber_skin_secondary_color')->nullable();
            $table->string('distribution_of_secondary_tuber_skin_color')->nullable();
            $table->string('predominant_tuber_flesh_color')->nullable();
            $table->string('tuber_flesh_secondary_color')->nullable();
            $table->string('distribution_of_secondary_flesh_color')->nullable();
            $table->string('general_tuber_shape')->nullable();
            $table->string('unusual_tuber_shape')->nullable();
            $table->string('tuber_shape_depth_of_eyes')->nullable();
            $table->string('late_blight_lb')->nullable();
            $table->string('potato_virus_y_pvy')->nullable();
            $table->decimal('tuber_yield', 8, 2)->nullable(); // assuming kg/plants is a decimal value
            $table->integer('dry_matter')->nullable(); // assuming percentage is a decimal value
            $table->string('chipping_color')->nullable();
            $table->string('adaptability')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('clones');
    }
};
