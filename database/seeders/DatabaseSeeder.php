<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    public function run()
    {
        $this->call([
            PermissionsTableSeeder::class,
            RolesTableSeeder::class,
            PermissionRoleTableSeeder::class,
            UsersTableSeeder::class,
            RoleUserTableSeeder::class,
            ProductCategoriesTableSeeder::class,
            OutletsTableSeeder::class,
            JoinUsPageSeeder::class,
            JourneyTableSeeder::class,
            AdvertisementTableSeeder::class,
            IngredientTableSeeder::class,
        ]);
    }
}
