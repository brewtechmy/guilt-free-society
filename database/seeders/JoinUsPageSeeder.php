<?php

namespace Database\Seeders;

use App\Models\JoinUsPage;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class JoinUsPageSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $joinUs = [
            [
                'id'    => 1,
                'title' => null,
                'position' => null,
                'description' => null,
                'is_main' => true,
                'image_path' => 'Partner-with-us.png'
            ],
            [
                'id'    => 2,
                'title' => "Franchising",
                'position' => 1,
                'description' => '<p>Interested in opening YOUR OWN GFS OUTLET?</p>',
                'image_path' => 'Franchising.png'
            ],
            [
                'id'    => 3,
                'title' => "Physical & Mental Health",
                'position' => 2,
                'description' => '<p>Are you a personal trainer, nutritionist, dietitian, Zumba instructor?</p>',
                'image_path' => 'Personal-trainer.jpg'
            ],
            [
                'id'    => 4,
                'title' => "Mental Health",
                'position' => 3,
                'description' => '<p>Or are you a psychologist/psychology graduate, counsellor?</p>',
                'image_path' => 'Psychologist-psychology.jpg'
            ],
            [
                'id'    => 5,
                'title' => "Creative Ideas",
                'position' => 4,
                'description' => '<p>Do you have creative ideas?</p><p><a href="https://wa.me/60164513003"><i>Whatsapp us @ 016-451 3003</i></a><br><a href="mailto:guiltfreesociety@gmail.com"><i>E-mail us @ guiltfreesociety@gmail.com</i></a></p>',
                'image_path' => 'Creative-bowl.jpg'
            ],
        ];

        foreach ($joinUs as $data) {
            $imagePath = array_pop($data);
            $JoinUsPage = JoinUsPage::create($data);
            $JoinUsPage->addMedia("database/seeders/join_us_images/".$imagePath)->preservingOriginal()->toMediaCollection('photo');
        }
    }
}
