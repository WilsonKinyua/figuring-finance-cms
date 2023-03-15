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
                'title' => 'auth_profile_edit',
            ],
            [
                'id'    => 2,
                'title' => 'user_management_access',
            ],
            [
                'id'    => 3,
                'title' => 'permission_create',
            ],
            [
                'id'    => 4,
                'title' => 'permission_edit',
            ],
            [
                'id'    => 5,
                'title' => 'permission_show',
            ],
            [
                'id'    => 6,
                'title' => 'permission_delete',
            ],
            [
                'id'    => 7,
                'title' => 'permission_access',
            ],
            [
                'id'    => 8,
                'title' => 'role_create',
            ],
            [
                'id'    => 9,
                'title' => 'role_edit',
            ],
            [
                'id'    => 10,
                'title' => 'role_show',
            ],
            [
                'id'    => 11,
                'title' => 'role_delete',
            ],
            [
                'id'    => 12,
                'title' => 'role_access',
            ],
            [
                'id'    => 13,
                'title' => 'user_create',
            ],
            [
                'id'    => 14,
                'title' => 'user_edit',
            ],
            [
                'id'    => 15,
                'title' => 'user_show',
            ],
            [
                'id'    => 16,
                'title' => 'user_delete',
            ],
            [
                'id'    => 17,
                'title' => 'user_access',
            ],
            [
                'id'    => 18,
                'title' => 'subscription_delete',
            ],
            [
                'id'    => 19,
                'title' => 'subscription_access',
            ],
            [
                'id'    => 20,
                'title' => 'testimonial_create',
            ],
            [
                'id'    => 21,
                'title' => 'testimonial_edit',
            ],
            [
                'id'    => 22,
                'title' => 'testimonial_show',
            ],
            [
                'id'    => 23,
                'title' => 'testimonial_delete',
            ],
            [
                'id'    => 24,
                'title' => 'testimonial_access',
            ],
            [
                'id'    => 25,
                'title' => 'article_create',
            ],
            [
                'id'    => 26,
                'title' => 'article_edit',
            ],
            [
                'id'    => 27,
                'title' => 'article_show',
            ],
            [
                'id'    => 28,
                'title' => 'article_delete',
            ],
            [
                'id'    => 29,
                'title' => 'article_access',
            ],
            [
                'id'    => 30,
                'title' => 'article_category_create',
            ],
            [
                'id'    => 31,
                'title' => 'article_category_edit',
            ],
            [
                'id'    => 32,
                'title' => 'article_category_show',
            ],
            [
                'id'    => 33,
                'title' => 'article_category_delete',
            ],
            [
                'id'    => 34,
                'title' => 'article_category_access',
            ],
            [
                'id'    => 35,
                'title' => 'blog_access',
            ],
            [
                'id'    => 36,
                'title' => 'contact_us_show',
            ],
            [
                'id'    => 37,
                'title' => 'contact_us_delete',
            ],
            [
                'id'    => 38,
                'title' => 'contact_us_access',
            ],
            [
                'id'    => 39,
                'title' => 'enrollment_create',
            ],
            [
                'id'    => 40,
                'title' => 'enrollment_edit',
            ],
            [
                'id'    => 41,
                'title' => 'enrollment_show',
            ],
            [
                'id'    => 42,
                'title' => 'enrollment_delete',
            ],
            [
                'id'    => 43,
                'title' => 'enrollment_access',
            ],
        ];

        Permission::insert($permissions);
    }
}
