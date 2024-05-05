<?php

namespace Database\Seeders;

use App\Models\Service;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ServiceTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $service = new Service();
        $service->title = "Build-Your-Own Bowl";
        $service->description = "Create your custom poke bowl by selecting your preferred components.";
        $service->addMedia("database/seeders/service_images/build-your-own-bowl.png")->preservingOriginal()->toMediaCollection('photo');
        $service->save();

        $service = new Service();
        $service->title = "Pre-Set Bowl";
        $service->description = "Try our chef-curated poke bowl featuring seasonal ingredients and unique flavor combinations.";
        $service->addMedia("database/seeders/service_images/preset-bowl.png")->preservingOriginal()->toMediaCollection('photo');
        $service->save();

        $service = new Service();
        $service->title = "Catering";
        $service->description = "We offer catering services for events and gatherings, providing a delicious and healthy option for your guests.";
        $service->addMedia("database/seeders/service_images/catering.png")->preservingOriginal()->toMediaCollection('photo');
        $service->save();
    }
}
