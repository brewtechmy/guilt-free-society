<?php

use App\Models\Section;
use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;
use Spatie\MediaLibrary\MediaCollections\Models\Media;

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

        if (Section::where('key', 'our_values_image')->count() == 0) {
            $section = Section::create([
                'key' => 'our_values_image',
                'value' => '',
                'input_type' => 'image'
            ]);
            $section->addMedia("database/seeders/section_images/values.png")->preservingOriginal()->toMediaCollection('photo');
        }

        Section::insert([
            'key' => 'our_values_text',
            'value' => '<p>We believe in one thing - <strong>Eat Well, Live Better</strong></p><p>So, we promise to bring you only <strong>Food Made Real</strong>.</p><p>Every day, we strive to curate healthy bowls which are delicious and nutritious to help improve your overall health and well-being.</p>',
            'input_type' => 'ckeditor'
        ]);
        
        if (Section::where('key', 'our_vision_image')->count() == 0) {
            $section = Section::create([
                'key' => 'our_vision_image',
                'value' => '',
                'input_type' => 'image'
            ]);
            $section->addMedia("database/seeders/section_images/vision.png")->preservingOriginal()->toMediaCollection('photo');
        }

        Section::insert([
            'key' => 'our_vision_text',
            'value' => '<p>Our local community sees a significant improvement in their physical, mental health &amp; well-being.</p>',
            'input_type' => 'ckeditor'
        ]);

        if (Section::where('key', 'our_mission_image')->count() == 0) {
            $section = Section::create([
                'key' => 'our_mission_image',
                'value' => '',
                'input_type' => 'image'
            ]);
            $section->addMedia("database/seeders/section_images/mission.png")->preservingOriginal()->toMediaCollection('photo');
        }

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
        $builder = Section::whereIn('key', ['our_mission_image', 'our_values_image', 'our_vision_image']);
        $ids = $builder->pluck('id');
        Media::whereIn('model_id', $ids)->where('model_type', 'App\Models\Section')->delete();
        $builder->forceDelete();
        
        Schema::dropIfExists('sections');
    }
};
