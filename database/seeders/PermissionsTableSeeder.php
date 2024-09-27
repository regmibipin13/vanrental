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
                'title' => 'faq_management_access',
            ],
            [
                'id'    => 18,
                'title' => 'faq_category_create',
            ],
            [
                'id'    => 19,
                'title' => 'faq_category_edit',
            ],
            [
                'id'    => 20,
                'title' => 'faq_category_show',
            ],
            [
                'id'    => 21,
                'title' => 'faq_category_delete',
            ],
            [
                'id'    => 22,
                'title' => 'faq_category_access',
            ],
            [
                'id'    => 23,
                'title' => 'faq_question_create',
            ],
            [
                'id'    => 24,
                'title' => 'faq_question_edit',
            ],
            [
                'id'    => 25,
                'title' => 'faq_question_show',
            ],
            [
                'id'    => 26,
                'title' => 'faq_question_delete',
            ],
            [
                'id'    => 27,
                'title' => 'faq_question_access',
            ],
            [
                'id'    => 28,
                'title' => 'blog_create',
            ],
            [
                'id'    => 29,
                'title' => 'blog_edit',
            ],
            [
                'id'    => 30,
                'title' => 'blog_show',
            ],
            [
                'id'    => 31,
                'title' => 'blog_delete',
            ],
            [
                'id'    => 32,
                'title' => 'blog_access',
            ],
            [
                'id'    => 33,
                'title' => 'testimonial_create',
            ],
            [
                'id'    => 34,
                'title' => 'testimonial_edit',
            ],
            [
                'id'    => 35,
                'title' => 'testimonial_show',
            ],
            [
                'id'    => 36,
                'title' => 'testimonial_delete',
            ],
            [
                'id'    => 37,
                'title' => 'testimonial_access',
            ],
            [
                'id'    => 38,
                'title' => 'facility_create',
            ],
            [
                'id'    => 39,
                'title' => 'facility_edit',
            ],
            [
                'id'    => 40,
                'title' => 'facility_show',
            ],
            [
                'id'    => 41,
                'title' => 'facility_delete',
            ],
            [
                'id'    => 42,
                'title' => 'facility_access',
            ],
            [
                'id'    => 43,
                'title' => 'category_create',
            ],
            [
                'id'    => 44,
                'title' => 'category_edit',
            ],
            [
                'id'    => 45,
                'title' => 'category_show',
            ],
            [
                'id'    => 46,
                'title' => 'category_delete',
            ],
            [
                'id'    => 47,
                'title' => 'category_access',
            ],
            [
                'id'    => 48,
                'title' => 'van_create',
            ],
            [
                'id'    => 49,
                'title' => 'van_edit',
            ],
            [
                'id'    => 50,
                'title' => 'van_show',
            ],
            [
                'id'    => 51,
                'title' => 'van_delete',
            ],
            [
                'id'    => 52,
                'title' => 'van_access',
            ],
            [
                'id'    => 53,
                'title' => 'extra_create',
            ],
            [
                'id'    => 54,
                'title' => 'extra_edit',
            ],
            [
                'id'    => 55,
                'title' => 'extra_show',
            ],
            [
                'id'    => 56,
                'title' => 'extra_delete',
            ],
            [
                'id'    => 57,
                'title' => 'extra_access',
            ],
            [
                'id'    => 58,
                'title' => 'booking_create',
            ],
            [
                'id'    => 59,
                'title' => 'booking_edit',
            ],
            [
                'id'    => 60,
                'title' => 'booking_show',
            ],
            [
                'id'    => 61,
                'title' => 'booking_delete',
            ],
            [
                'id'    => 62,
                'title' => 'booking_access',
            ],
            [
                'id'    => 63,
                'title' => 'booking_status_create',
            ],
            [
                'id'    => 64,
                'title' => 'booking_status_edit',
            ],
            [
                'id'    => 65,
                'title' => 'booking_status_show',
            ],
            [
                'id'    => 66,
                'title' => 'booking_status_delete',
            ],
            [
                'id'    => 67,
                'title' => 'booking_status_access',
            ],
            [
                'id'    => 68,
                'title' => 'profile_password_edit',
            ],
        ];

        Permission::insert($permissions);
    }
}
