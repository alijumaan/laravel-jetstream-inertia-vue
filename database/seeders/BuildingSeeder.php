<?php

namespace Database\Seeders;

use App\Models\Building;
use Illuminate\Database\Seeder;

class BuildingSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        \DB::table('buildings')->delete();

        \DB::table('buildings')->insert(array (
            0 =>
                array (
                    'id' => 1,
                    'name' => 'سرب التموين',
                    'slug' => 'سرب-التموين',
                    'number' => '767',
                    'status' => 1,
                    'notes' => NULL,
                    'checked_at' => '2021-12-28 15:22:56',
                    'user_id' => 3,
                    'period_id' => 2,
                    'created_at' => '2021-09-20 23:07:17',
                    'updated_at' => '2021-09-29 15:22:56',
                    'deleted_at' => NULL,
                ),
            1 =>
                array (
                    'id' => 3,
                    'name' => 'سرية النقليات',
                    'slug' => 'سرية-النقليات',
                    'number' => '765',
                    'status' => 1,
                    'notes' => NULL,
                    'checked_at' => '2021-12-20 15:23:49',
                    'user_id' => 3,
                    'period_id' => 2,
                    'created_at' => '2021-09-20 23:07:17',
                    'updated_at' => '2021-09-21 15:23:49',
                    'deleted_at' => NULL,
                ),
            2 =>
                array (
                    'id' => 4,
                    'name' => 'محطة الوقود',
                    'slug' => 'محطة-الوقود',
                    'number' => '765',
                    'status' => 1,
                    'notes' => NULL,
                    'checked_at' => '2021-10-21 15:06:19',
                    'user_id' => 3,
                    'period_id' => 1,
                    'created_at' => '2021-09-20 23:07:17',
                    'updated_at' => '2021-09-21 15:06:19',
                    'deleted_at' => NULL,
                ),
            3 =>
                array (
                    'id' => 5,
                    'name' => 'الأسلحة والمذخرات',
                    'slug' => 'الأسلحة-والمذخرات',
                    'number' => '10/779',
                    'status' => 1,
                    'notes' => NULL,
                    'checked_at' => '2021-10-27 12:53:05',
                    'user_id' => 3,
                    'period_id' => 1,
                    'created_at' => '2021-09-20 23:07:17',
                    'updated_at' => '2021-09-27 12:53:05',
                    'deleted_at' => NULL,
                ),
            4 =>
                array (
                    'id' => 6,
                    'name' => 'المستودعات الخارجية',
                    'slug' => 'المستودعات-الخارجية',
                    'number' => '774',
                    'status' => 1,
                    'notes' => NULL,
                    'checked_at' => '2021-10-27 12:53:19',
                    'user_id' => 3,
                    'period_id' => 1,
                    'created_at' => '2021-09-20 23:07:17',
                    'updated_at' => '2021-09-27 12:53:19',
                    'deleted_at' => NULL,
                ),
            5 =>
                array (
                    'id' => 7,
                    'name' => 'مصنع الأكسجين',
                    'slug' => 'مصنع-الأكسجين',
                    'number' => '3-774',
                    'status' => 1,
                    'notes' => NULL,
                    'checked_at' => '2021-10-21 19:24:24',
                    'user_id' => 3,
                    'period_id' => 1,
                    'created_at' => '2021-09-20 23:07:17',
                    'updated_at' => '2021-09-21 19:24:24',
                    'deleted_at' => NULL,
                ),
            6 =>
                array (
                    'id' => 8,
                    'name' => 'تكرير الصرف الصحي',
                    'slug' => 'تكرير-الصرف-الصحي',
                    'number' => '805',
                    'status' => 0,
                    'notes' => NULL,
                    'checked_at' => '2021-09-18 15:34:19',
                    'user_id' => 3,
                    'period_id' => 1,
                    'created_at' => '2021-09-20 23:07:17',
                    'updated_at' => '2021-09-21 15:09:16',
                    'deleted_at' => NULL,
                ),
            7 =>
                array (
                    'id' => 9,
                    'name' => 'مواقف سرب التموين',
                    'slug' => 'مواقف-سرب-التموين',
                    'number' => '764',
                    'status' => 1,
                    'notes' => NULL,
                    'checked_at' => '2022-01-03 10:56:54',
                    'user_id' => 3,
                    'period_id' => 2,
                    'created_at' => '2021-09-20 23:07:17',
                    'updated_at' => '2021-10-05 10:56:54',
                    'deleted_at' => NULL,
                ),
            8 =>
                array (
                    'id' => 10,
                    'name' => 'مواقف النقليات',
                    'slug' => 'مواقف-النقليات',
                    'number' => '764',
                    'status' => 1,
                    'notes' => NULL,
                    'checked_at' => '2022-01-03 10:56:41',
                    'user_id' => 3,
                    'period_id' => 2,
                    'created_at' => '2021-09-20 23:07:17',
                    'updated_at' => '2021-10-05 10:56:41',
                    'deleted_at' => NULL,
                ),
            9 =>
                array (
                    'id' => 11,
                    'name' => 'خزان الإطفاء',
                    'slug' => 'خزان-الإطفاء',
                    'number' => '422/4',
                    'status' => 1,
                    'notes' => 'توجد ملاحظة...',
                    'checked_at' => '2021-10-20 15:16:24',
                    'user_id' => 3,
                    'period_id' => 2,
                    'created_at' => '2021-09-20 23:07:17',
                    'updated_at' => '2021-09-21 15:16:24',
                    'deleted_at' => NULL,
                ),
            10 =>
                array (
                    'id' => 12,
                    'name' => 'تموين القرطاسية',
                    'slug' => 'تموين-القرطاسية',
                    'number' => '767',
                    'status' => 1,
                    'notes' => NULL,
                    'checked_at' => '2021-10-27 12:52:44',
                    'user_id' => 3,
                    'period_id' => 1,
                    'created_at' => '2021-09-21 15:00:26',
                    'updated_at' => '2021-09-27 12:52:44',
                    'deleted_at' => NULL,
                ),
            11 =>
                array (
                    'id' => 13,
                    'name' => 'مستودع الكفرات',
                    'slug' => 'مستودع-الكفرات',
                    'number' => '07B',
                    'status' => 1,
                    'notes' => NULL,
                    'checked_at' => '2021-10-21 15:10:26',
                    'user_id' => 3,
                    'period_id' => 1,
                    'created_at' => '2021-09-21 15:10:00',
                    'updated_at' => '2021-09-21 15:10:26',
                    'deleted_at' => NULL,
                ),
            12 =>
                array (
                    'id' => 14,
                    'name' => 'مستودع الخطوط السعودية',
                    'slug' => 'مستودع-الخطوط-السعودية',
                    'number' => '07A',
                    'status' => 1,
                    'notes' => NULL,
                    'checked_at' => '2021-10-21 15:11:06',
                    'user_id' => 3,
                    'period_id' => 1,
                    'created_at' => '2021-09-21 15:11:01',
                    'updated_at' => '2021-09-21 15:11:06',
                    'deleted_at' => NULL,
                ),
            13 =>
                array (
                    'id' => 15,
                    'name' => 'مستودع الكيماويات',
                    'slug' => 'مستودع-الكيماويات',
                    'number' => '07D',
                    'status' => 1,
                    'notes' => NULL,
                    'checked_at' => '2021-10-21 15:11:46',
                    'user_id' => 3,
                    'period_id' => 1,
                    'created_at' => '2021-09-21 15:11:33',
                    'updated_at' => '2021-09-21 15:11:46',
                    'deleted_at' => NULL,
                ),
            14 =>
                array (
                    'id' => 16,
                    'name' => 'مستودع التحركات الجوية',
                    'slug' => 'مستودع-التحركات-الجوية',
                    'number' => '07E',
                    'status' => 1,
                    'notes' => NULL,
                    'checked_at' => '2021-10-27 13:10:19',
                    'user_id' => 3,
                    'period_id' => 1,
                    'created_at' => '2021-09-21 15:12:30',
                    'updated_at' => '2021-09-27 13:10:19',
                    'deleted_at' => NULL,
                ),
            15 =>
                array (
                    'id' => 17,
                    'name' => 'تموين الملابس',
                    'slug' => 'تموين-الملابس',
                    'number' => '767',
                    'status' => 1,
                    'notes' => NULL,
                    'checked_at' => '2021-10-27 12:52:34',
                    'user_id' => 3,
                    'period_id' => 1,
                    'created_at' => '2021-09-21 15:15:02',
                    'updated_at' => '2021-09-27 12:52:34',
                    'deleted_at' => NULL,
                ),
            16 =>
                array (
                    'id' => 18,
                    'name' => 'مستودعات التموين',
                    'slug' => 'مستودعات-التموين',
                    'number' => '764',
                    'status' => 1,
                    'notes' => NULL,
                    'checked_at' => '2021-10-29 13:49:24',
                    'user_id' => 3,
                    'period_id' => 1,
                    'created_at' => '2021-09-21 15:15:24',
                    'updated_at' => '2021-09-29 13:49:24',
                    'deleted_at' => NULL,
                ),
            17 =>
                array (
                    'id' => 19,
                    'name' => 'الطب الوقائي للطيارين',
                    'slug' => 'الطب-الوقائي-للطيارين',
                    'number' => '794',
                    'status' => 0,
                    'notes' => NULL,
                    'checked_at' => NULL,
                    'user_id' => 4,
                    'period_id' => 1,
                    'created_at' => '2021-10-06 15:15:24',
                    'updated_at' => '2021-10-06 13:49:24',
                    'deleted_at' => NULL,
                ),
            18 =>
                array (
                    'id' => 20,
                    'name' => 'المستوصف',
                    'slug' => 'المستوصف',
                    'number' => '794',
                    'status' => 0,
                    'notes' => NULL,
                    'checked_at' => NULL,
                    'user_id' => 4,
                    'period_id' => 1,
                    'created_at' => '2021-10-06 16:15:24',
                    'updated_at' => '2021-10-06 14:49:24',
                    'deleted_at' => NULL,
                ),
        ));
    }
}