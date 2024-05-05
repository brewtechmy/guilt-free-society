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
            IngredientTableSeeder::class,
            ProductCategoriesTableSeeder::class,
            ProductTableSeeder::class,
            OutletsTableSeeder::class,
            JoinUsPageSeeder::class,
            JourneyTableSeeder::class,
            AdvertisementTableSeeder::class,
        ]);
    }
}
