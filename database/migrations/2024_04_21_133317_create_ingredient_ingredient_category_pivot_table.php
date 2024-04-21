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
        Schema::create('ingredient_ingredient_category', function (Blueprint $table) {
            $table->unsignedBigInteger('ingredient_id');
            $table->foreign('ingredient_id', 'ingredient_id_fk')->references('id')->on('ingredients')->onDelete('cascade');
            $table->unsignedBigInteger('ingredient_category_id');
            $table->foreign('ingredient_category_id', 'ingredient_category_id_fk')->references('id')->on('ingredient_categories')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('ingredient_ingredient_category_pivot');
    }
};
