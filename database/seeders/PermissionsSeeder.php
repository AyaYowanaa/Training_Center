<?php

namespace Database\Seeders;


use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class PermissionsSeeder extends Seeder
{
    public function run()
    {
        $permissions = [
            [
                'name' => 'show_user',
                'title' => json_encode(['ar' => 'عرض مستخدم', 'en' => 'show user']),
                'guard_name' => 'admin',
            ],[
                'name' => 'add_user',
                'title' => json_encode(['ar' => 'اضافة مستخدم', 'en' => 'add user']),
                'guard_name' => 'admin',
            ],
            [
                'name' => 'update_user',
                'title' => json_encode(['ar' => 'تعديل بيانات مستخدم', 'en' => 'update user']),
                'guard_name' => 'admin',
            ],
            [
                'name' => 'delete_user',
                'title' => json_encode(['ar' => 'حذف مستخدم', 'en' => 'delete user']),
                'guard_name' => 'admin',
            ],

            [
                'name' => 'show_roles',
                'title' => json_encode(['ar' => 'عرض دور صلاحية', 'en' => 'show roles']),
                'guard_name' => 'admin',
            ], [
                'name' => 'add_roles',
                'title' => json_encode(['ar' => 'اضافة دور صلاحية', 'en' => 'add roles']),
                'guard_name' => 'admin',
            ],
            [
                'name' => 'update_roles',
                'title' => json_encode(['ar' => 'تعديل دور صلاحية', 'en' => 'update roles']),
                'guard_name' => 'admin',
            ],
            [
                'name' => 'delete_roles',
                'title' => json_encode(['ar' => 'حذف دور صلاحية', 'en' => 'delete roles']),
                'guard_name' => 'admin',
            ],
            [
                'name' => 'TrainingCenters',
                'title' => json_encode(['ar' => 'مراكز التدريب', 'en' => 'Training Centers']),
                'guard_name' => 'admin'
            ],
            [
                'name' => 'FinanceService',
                'title' => json_encode(['ar' => 'خدمة التمويل', 'en' => 'Finance Service']),
                'guard_name' => 'admin'
            ],
            [
                'name' => 'SupportingEntity',
                'title' => json_encode(['ar' => 'الجهة الداعمة', 'en' => 'Supporting Entity']),
                'guard_name' => 'admin'
            ],
            [
                'name' => 'enterData',
                'title' => json_encode(['ar' => 'ادخال بيانات', 'en' => 'enter data']),
                'guard_name' => 'admin'
            ],
            [
                'name' => 'translate',
                'title' => json_encode(['ar' => 'ترجمة', 'en' => 'translate']),
                'guard_name' => 'admin'
            ],
            [
                'name' => 'edit',
                'title' => json_encode(['ar' => 'تعديل', 'en' => 'edit']),
                'guard_name' => 'admin'
            ],


            /********************-------------site ---------------******************** */
            [
                'name' => 'siteData',
                'title' => json_encode(['ar' => 'بيانات الموقع', 'en' => ' Site Data']),
                'guard_name' => 'admin',
            ],
            [
                'name' => 'list_city',
                'title' => json_encode(['ar' => ' المحافظات ', 'en' => ' list_city']),
                'guard_name' => 'admin',
            ],[
                'name' => 'list_district',
                'title' => json_encode(['ar' => 'المدن ', 'en' => ' list_district']),
                'guard_name' => 'admin',
            ],

            /********************-------------blog ---------------******************** */
            [
                'name' => 'add_blog',
                'title' => json_encode(['ar' => 'اضافة الاخبار', 'en' => 'add blog']),
                'guard_name' => 'admin',
            ],
            [
                'name' => 'update_blog',
                'title' => json_encode(['ar' => 'تعديل الاخبار', 'en' => 'update blog']),
                'guard_name' => 'admin',
            ],
            [
                'name' => 'delete_blog',
                'title' => json_encode(['ar' => 'حذف الاخبار', 'en' => 'delete blog']),
                'guard_name' => 'admin',
            ],
            [
                'name' => 'show_blog',
                'title' => json_encode(['ar' => 'عرض الاخبار', 'en' => 'show blog']),
                'guard_name' => 'admin',
            ],

            /********************-------------about ---------------******************** */
            [
                'name' => 'add_about',
                'title' => json_encode(['ar' => 'اضافة من نحن', 'en' => 'add about']),
                'guard_name' => 'admin',
            ],
            [
                'name' => 'update_about',
                'title' => json_encode(['ar' => 'تعديل من نحن', 'en' => 'update about']),
                'guard_name' => 'admin',
            ],
            [
                'name' => 'delete_about',
                'title' => json_encode(['ar' => 'حذف من نحن', 'en' => 'delete about']),
                'guard_name' => 'admin',
            ],
            [
                'name' => 'show_about',
                'title' => json_encode(['ar' => 'عرض من نحن', 'en' => 'show about']),
                'guard_name' => 'admin',
            ],



            /********************-------------banners ---------------******************** */

            [
                'name' => 'add_banners',
                'title' => json_encode(['ar' => 'اضافة الاسليدر', 'en' => 'add banners']),
                'guard_name' => 'admin',
            ],
            [
                'name' => 'update_banners',
                'title' => json_encode(['ar' => 'تعديل الاسليدر', 'en' => 'update banners']),
                'guard_name' => 'admin',
            ],
            [
                'name' => 'delete_banners',
                'title' => json_encode(['ar' => 'حذف الاسليدر', 'en' => 'delete banners']),
                'guard_name' => 'admin',
            ],
            [
                'name' => 'show_banners',
                'title' => json_encode(['ar' => 'عرض الاسليدر', 'en' => 'show banners']),
                'guard_name' => 'admin',
            ],[
                'name' => 'show_contacts',
                'title' => json_encode(['ar' => 'عرض الرسائل', 'en' => 'show contacts massege']),
                'guard_name' => 'admin',
            ],

        ];

        DB::table('permissions')->insert($permissions);
    }
}

