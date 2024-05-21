<?php

use App\Models\Section;
use Spatie\MediaLibrary\MediaCollections\Models\Media;
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
        if (Section::where('key', 'our_mission_image')->count() == 0) {
            $section = Section::create([
                'key' => 'our_mission_image',
                'value' => '',
                'input_type' => 'image'
            ]);
            $section->addMedia("database/seeders/section_images/mission.png")->preservingOriginal()->toMediaCollection('photo');
        }

        if (Section::where('key', 'our_values_image')->count() == 0) {
            $section = Section::create([
                'key' => 'our_values_image',
                'value' => '',
                'input_type' => 'image'
            ]);
            $section->addMedia("database/seeders/section_images/values.png")->preservingOriginal()->toMediaCollection('photo');
        }

        if (Section::where('key', 'our_vision_image')->count() == 0) {
            $section = Section::create([
                'key' => 'our_vision_image',
                'value' => '',
                'input_type' => 'image'
            ]);
            $section->addMedia("database/seeders/section_images/vision.png")->preservingOriginal()->toMediaCollection('photo');
        }
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
    }
};
