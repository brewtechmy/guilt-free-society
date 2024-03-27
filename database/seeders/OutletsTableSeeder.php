<?php

namespace Database\Seeders;

use App\Models\Outlet;
use Illuminate\Database\Seeder;

class OutletsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run()
    {
        $outlets = [
            [
                'id'    => 1,
                'name' => "Guilt Free Society",
                'address' => 'Lot 5, 1st floor block A, Lorong Lintas Square 88300 Kota Kinabalu',
                'business_hour' => '11am-8.30pm daily',
                'contact_no' => '011-2057 3293',
                'embed_map_url' => '<iframe class="w-full mt-2" src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3968.3418119373905!2d116.09006500000001!3d5.947547399999999!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x323b6952594e0793%3A0x9c25d7ee285985bc!2sGuilt%20Free%20Society%20KK!5e0!3m2!1sen!2smy!4v1710253879874!5m2!1sen!2smy" width="360" height="240" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>',
            ],
            [
                'id'    => 2,
                'name' => "Guilt Free Society +",
                'address' => 'The Walk, Riverson Jln Riverson 1, 88000 Kota Kinabalu',
                'business_hour' => '11am-8pm Mon-Sat',
                'contact_no' => '012-863 9907',
                'embed_map_url' => '<iframe class="w-full mt-2" src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3968.190645087209!2d116.06473229999999!3d5.9684611!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x323b69c09afe39a5%3A0x6525f0594b05431d!2sRiverson%20The%20Walk!5e0!3m2!1sen!2smy!4v1710254621779!5m2!1sen!2smy" width="360" height="240" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>',
            ],
        ];

        Outlet::insert($outlets);
    }
}
