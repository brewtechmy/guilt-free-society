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
            'value' => '4790',
            'input_type' => 'number'
        ]);

        Section::insert([
            'key' => 'our_vision_text',
            'value' => '<p>Our local community sees a significant improvement in their physical, mental health &amp; well-being.</p>',
            'input_type' => 'ckeditor'
        ]);

        Section::insert([
            'key' => 'our_values_text',
            'value' => '<p>We believe in one thing - <strong>Eat Well, Live Better</strong></p><p>So, we promise to bring you only <strong>Food Made Real</strong>.</p><p>Every day, we strive to curate healthy bowls which are delicious and nutritious to help improve your overall health and well-being.</p>',
            'input_type' => 'ckeditor'
        ]);

        Section::insert([
            'key' => 'our_mission_text',
            'value' => '<p>To establish a one-stop centre in your neighbourhood that provides healthy fast food, fitness training and mental health services.</p>',
            'input_type' => 'ckeditor'
        ]);

        Section::insert([
            'key' => 'help_us_improve_link',
            'value' => 'https://docs.google.com/forms/d/e/1FAIpQLSdYlxIwrctHcxvs1Kwnc8FqHxQoe1CcZa26Q4aENzCFZ8-n0w/viewform',
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
