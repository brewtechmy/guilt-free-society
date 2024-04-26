<?php

namespace Database\Seeders;

use App\Models\Journey;
use Illuminate\Database\Seeder;

class JourneyTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run()
    {
        $dir = new \FilesystemIterator("database/seeders/journey_images");
        foreach ($dir as $fileinfo) {
            $journey = Journey::create();
            $journey->addMedia("database/seeders/journey_images/".$fileinfo->getFilename())->preservingOriginal()->toMediaCollection('photo');
        }
    }
}
