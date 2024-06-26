<?php

namespace Database\Seeders;

use App\Models\Permission;
use Illuminate\Database\Seeder;

class PermissionsTableSeeder extends Seeder
{
    public function run()
    {
        $permissions = [
            [
                'id'    => 1,
                'title' => 'user_management_access',
            ],
            [
                'id'    => 2,
                'title' => 'permission_create',
            ],
            [
                'id'    => 3,
                'title' => 'permission_edit',
            ],
            [
                'id'    => 4,
                'title' => 'permission_show',
            ],
            [
                'id'    => 5,
                'title' => 'permission_delete',
            ],
            [
                'id'    => 6,
                'title' => 'permission_access',
            ],
            [
                'id'    => 7,
                'title' => 'role_create',
            ],
            [
                'id'    => 8,
                'title' => 'role_edit',
            ],
            [
                'id'    => 9,
                'title' => 'role_show',
            ],
            [
                'id'    => 10,
                'title' => 'role_delete',
            ],
            [
                'id'    => 11,
                'title' => 'role_access',
            ],
            [
                'id'    => 12,
                'title' => 'user_create',
            ],
            [
                'id'    => 13,
                'title' => 'user_edit',
            ],
            [
                'id'    => 14,
                'title' => 'user_show',
            ],
            [
                'id'    => 15,
                'title' => 'user_delete',
            ],
            [
                'id'    => 16,
                'title' => 'user_access',
            ],
            [
                'id'    => 17,
                'title' => 'content_management_access',
            ],
            [
                'id'    => 18,
                'title' => 'content_category_create',
            ],
            [
                'id'    => 19,
                'title' => 'content_category_edit',
            ],
            [
                'id'    => 20,
                'title' => 'content_category_show',
            ],
            [
                'id'    => 21,
                'title' => 'content_category_delete',
            ],
            [
                'id'    => 22,
                'title' => 'content_category_access',
            ],
            [
                'id'    => 23,
                'title' => 'content_tag_create',
            ],
            [
                'id'    => 24,
                'title' => 'content_tag_edit',
            ],
            [
                'id'    => 25,
                'title' => 'content_tag_show',
            ],
            [
                'id'    => 26,
                'title' => 'content_tag_delete',
            ],
            [
                'id'    => 27,
                'title' => 'content_tag_access',
            ],
            [
                'id'    => 28,
                'title' => 'content_page_create',
            ],
            [
                'id'    => 29,
                'title' => 'content_page_edit',
            ],
            [
                'id'    => 30,
                'title' => 'content_page_show',
            ],
            [
                'id'    => 31,
                'title' => 'content_page_delete',
            ],
            [
                'id'    => 32,
                'title' => 'content_page_access',
            ],
            [
                'id'    => 33,
                'title' => 'menu_management_access',
            ],
            [
                'id'    => 34,
                'title' => 'product_category_create',
            ],
            [
                'id'    => 35,
                'title' => 'product_category_edit',
            ],
            [
                'id'    => 36,
                'title' => 'product_category_show',
            ],
            [
                'id'    => 37,
                'title' => 'product_category_delete',
            ],
            [
                'id'    => 38,
                'title' => 'product_category_access',
            ],
            [
                'id'    => 39,
                'title' => 'product_tag_create',
            ],
            [
                'id'    => 40,
                'title' => 'product_tag_edit',
            ],
            [
                'id'    => 41,
                'title' => 'product_tag_show',
            ],
            [
                'id'    => 42,
                'title' => 'product_tag_delete',
            ],
            [
                'id'    => 43,
                'title' => 'product_tag_access',
            ],
            [
                'id'    => 44,
                'title' => 'product_create',
            ],
            [
                'id'    => 45,
                'title' => 'product_edit',
            ],
            [
                'id'    => 46,
                'title' => 'product_show',
            ],
            [
                'id'    => 47,
                'title' => 'product_delete',
            ],
            [
                'id'    => 48,
                'title' => 'product_access',
            ],
            [
                'id'    => 49,
                'title' => 'profile_password_edit',
            ],
            [
                'id'    => 50,
                'title' => 'advertisement_create',
            ],
            [
                'id'    => 51,
                'title' => 'advertisement_edit',
            ],
            [
                'id'    => 52,
                'title' => 'advertisement_show',
            ],
            [
                'id'    => 53,
                'title' => 'advertisement_delete',
            ],
            [
                'id'    => 54,
                'title' => 'advertisement_access',
            ],
            [
                'id'    => 55,
                'title' => 'outlet_create',
            ],
            [
                'id'    => 56,
                'title' => 'outlet_edit',
            ],
            [
                'id'    => 57,
                'title' => 'outlet_show',
            ],
            [
                'id'    => 58,
                'title' => 'outlet_delete',
            ],
            [
                'id'    => 59,
                'title' => 'outlet_access',
            ],
            [
                'id'    => 60,
                'title' => 'join_us_page_access',
            ],
            [
                'id'    => 61,
                'title' => 'join_us_page_create',
            ],
            [
                'id'    => 62,
                'title' => 'join_us_page_edit',
            ],
            [
                'id'    => 63,
                'title' => 'join_us_page_show',
            ],
            [
                'id'    => 64,
                'title' => 'join_us_page_delete',
            ],
        ];

        Permission::insert($permissions);
    }
}
