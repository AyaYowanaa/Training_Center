<?php

namespace Database\Seeders;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;



class CityDistrictSeeder extends Seeder
{
    public function run()
    {
        // قائمة المدن والمحافظات
        $cities = [
            [
                'city_name' => json_encode(['en' => 'Cairo', 'ar' => 'القاهرة']),
                'districts' => [
                    ['name' => json_encode(['en' => 'Maadi', 'ar' => 'المعادي'])],
                    ['name' => json_encode(['en' => 'Nasr City', 'ar' => 'مدينة نصر'])],
                    ['name' => json_encode(['en' => 'Heliopolis', 'ar' => 'مصر الجديدة'])],
                    ['name' => json_encode(['en' => 'Zamalek', 'ar' => 'الزمالك'])],
                    ['name' => json_encode(['en' => 'Shubra', 'ar' => 'شبرا'])],
                    ['name' => json_encode(['en' => 'Helwan', 'ar' => 'حلوان'])],
                    ['name' => json_encode(['en' => 'Garden City', 'ar' => 'جاردن سيتي'])],
                ]
            ],
            [
                'city_name' => json_encode(['en' => 'Aswan', 'ar' => 'أسوان']),
                'districts' => [
                    ['name' => json_encode(['en' => 'Nasr', 'ar' => 'النصر'])],
                    ['name' => json_encode(['en' => 'Kima', 'ar' => 'كيما'])],
                    ['name' => json_encode(['en' => 'Abu Simbel', 'ar' => 'أبو سمبل'])],
                    ['name' => json_encode(['en' => 'Daraw', 'ar' => 'دراو'])],
                    ['name' => json_encode(['en' => 'Kom Ombo', 'ar' => 'كوم أمبو'])],
                ]
            ],
            [
                'city_name' => json_encode(['en' => 'Qena', 'ar' => 'قنا']),
                'districts' => [
                    ['name' => json_encode(['en' => 'Qena', 'ar' => 'قنا'])],
                    ['name' => json_encode(['en' => 'Qift', 'ar' => 'قفط'])],
                    ['name' => json_encode(['en' => 'Deshna', 'ar' => 'دشنا'])],
                    ['name' => json_encode(['en' => 'Nag Hammadi', 'ar' => 'نجع حمادي'])],
                    ['name' => json_encode(['en' => 'Abu Tesht', 'ar' => 'أبو تشت'])],
                    ['name' => json_encode(['en' => 'Qus', 'ar' => 'قوص'])],
                ]
            ],
            [
                'city_name' => json_encode(['en' => 'Alexandria', 'ar' => 'الإسكندرية']),
                'districts' => [
                    ['name' => json_encode(['en' => 'Sidi Gaber', 'ar' => 'سيدي جابر'])],
                    ['name' => json_encode(['en' => 'Montaza', 'ar' => 'المنتزه'])],
                    ['name' => json_encode(['en' => 'Cleopatra', 'ar' => 'كليوباترا'])],
                    ['name' => json_encode(['en' => 'Stanley', 'ar' => 'ستانلي'])],
                ]
            ],
            [
                'city_name' => json_encode(['en' => 'Giza', 'ar' => 'الجيزة']),
                'districts' => [
                    ['name' => json_encode(['en' => 'Dokki', 'ar' => 'الدقي'])],
                    ['name' => json_encode(['en' => 'Mohandessin', 'ar' => 'المهندسين'])],
                    ['name' => json_encode(['en' => 'Haram', 'ar' => 'الهرم'])],
                    ['name' => json_encode(['en' => 'Agouza', 'ar' => 'العجوزة'])],
                ]
            ],
            [
                'city_name' => json_encode(['en' => 'Luxor', 'ar' => 'الأقصر']),
                'districts' => [
                    ['name' => json_encode(['en' => 'East Bank', 'ar' => 'البر الشرقي'])],
                    ['name' => json_encode(['en' => 'West Bank', 'ar' => 'البر الغربي'])],
                ]
            ],

        ];



        // إدخال المدن والمناطق التابعة لها في قاعدة البيانات
        foreach ($cities as $city) {
            $cityId = DB::table('cities')->insertGetId(['city_name' => $city['city_name']]);

            foreach ($city['districts'] as $district) {
                $district['city_id'] = $cityId;
                DB::table('districts')->insert($district);
            }
        }
    }
}



