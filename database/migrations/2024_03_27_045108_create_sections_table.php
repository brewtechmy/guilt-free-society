<?php

use App\Models\Section;
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
        Schema::create('sections', function (Blueprint $table) {
            $table->id();
            $table->string('key');
            $table->longText('value');
            $table->string('input_type');
            $table->timestamps();
            $table->softDeletes();
        });

        Section::insert([
            'key' => 'number_bowl_sold',
            'value' => '0',
            'input_type' => 'number'
        ]);

        Section::insert([
            'key' => 'our_vision_text',
            'value' => '',
            'input_type' => 'ckeditor'
        ]);

        Section::insert([
            'key' => 'our_values_text',
            'value' => '',
            'input_type' => 'ckeditor'
        ]);

        Section::insert([
            'key' => 'our_mission_text',
            'value' => '',
            'input_type' => 'ckeditor'
        ]);

        Section::insert([
            'key' => 'help_us_improve_link',
            'value' => '',
            'input_type' => 'text'
        ]);
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('sections');
    }
};
