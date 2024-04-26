<?php

namespace Database\Seeders;

use App\Models\Advertisement;
use Illuminate\Database\Seeder;

class AdvertisementTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run()
    {
        $dir = new \FilesystemIterator("database/seeders/advertisement_images");
        foreach ($dir as $fileinfo) {
            $advertisement = Advertisement::create([
                'name' => Advertisement::latest()->first() ? 'Ads '. (int)substr(Advertisement::latest()->first()->name, -1) + 1 : 'Ads 1',
                'position'=> (Advertisement::latest()->first()->position ?? 0) + 1,
            ]);
            $advertisement->addMedia("database/seeders/advertisement_images/".$fileinfo->getFilename())->preservingOriginal()->toMediaCollection('photo');
        }
    }
}
