<?php

namespace Database\Seeders;


use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CityDistrictSeeder extends Seeder
{
    public function run()
    {
        // قائمة المحافظات والمدن التابعة لها
        $governorates = [
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
            // إضافة باقي المحافظات بنفس النمط
            [
                'city_name' => json_encode(['en' => 'Beheira', 'ar' => 'البحيرة']),
                'districts' => [
                    ['name' => json_encode(['en' => 'Damanhour', 'ar' => 'دمنهور'])],
                    ['name' => json_encode(['en' => 'Kafr El Dawwar', 'ar' => 'كفر الدوار'])],
                    ['name' => json_encode(['en' => 'Rashid', 'ar' => 'رشيد'])],
                    ['name' => json_encode(['en' => 'Itay El Barud', 'ar' => 'إيتاي البارود'])],
                ]
            ],
            [
                'city_name' => json_encode(['en' => 'Sharqia', 'ar' => 'الشرقية']),
                'districts' => [
                    ['name' => json_encode(['en' => 'Zagazig', 'ar' => 'الزقازيق'])],
                    ['name' => json_encode(['en' => '10th of Ramadan City', 'ar' => 'العاشر من رمضان'])],
                    ['name' => json_encode(['en' => 'Belbeis', 'ar' => 'بلبيس'])],
                    ['name' => json_encode(['en' => 'Minya al-Qamh', 'ar' => 'منيا القمح'])],
                ]
            ],
            [
                'city_name' => json_encode(['en' => 'Suez', 'ar' => 'السويس']),
                'districts' => [
                    ['name' => json_encode(['en' => 'Suez', 'ar' => 'السويس'])],
                    ['name' => json_encode(['en' => 'Ain Sokhna', 'ar' => 'العين السخنة'])],
                ]
            ],
            [
                'city_name' => json_encode(['en' => 'Ismailia', 'ar' => 'الإسماعيلية']),
                'districts' => [
                    ['name' => json_encode(['en' => 'Ismailia', 'ar' => 'الإسماعيلية'])],
                    ['name' => json_encode(['en' => 'Fayed', 'ar' => 'فايد'])],
                    ['name' => json_encode(['en' => 'Qantara', 'ar' => 'القنطرة'])],
                ]
            ],
            [
                'city_name' => json_encode(['en' => 'Port Said', 'ar' => 'بورسعيد']),
                'districts' => [
                    ['name' => json_encode(['en' => 'Port Said', 'ar' => 'بورسعيد'])],
                    ['name' => json_encode(['en' => 'Port Fouad', 'ar' => 'بورفؤاد'])],
                ]
            ],
            [
                'city_name' => json_encode(['en' => 'Damietta', 'ar' => 'دمياط']),
                'districts' => [
                    ['name' => json_encode(['en' => 'Damietta', 'ar' => 'دمياط'])],
                    ['name' => json_encode(['en' => 'New Damietta', 'ar' => 'دمياط الجديدة'])],
                    ['name' => json_encode(['en' => 'Faraskour', 'ar' => 'فارسكور'])],
                ]
            ],
            [
                'city_name' => json_encode(['en' => 'Dakahlia', 'ar' => 'الدقهلية']),
                'districts' => [
                    ['name' => json_encode(['en' => 'Mansoura', 'ar' => 'المنصورة'])],
                    ['name' => json_encode(['en' => 'Talkha', 'ar' => 'طلخا'])],
                    ['name' => json_encode(['en' => 'Mit Ghamr', 'ar' => 'ميت غمر'])],
                    ['name' => json_encode(['en' => 'Dikirnis', 'ar' => 'دكرنس'])],
                ]
            ],
            [
                'city_name' => json_encode(['en' => 'Kafr El Sheikh', 'ar' => 'كفر الشيخ']),
                'districts' => [
                    ['name' => json_encode(['en' => 'Kafr El Sheikh', 'ar' => 'كفر الشيخ'])],
                    ['name' => json_encode(['en' => 'Desouk', 'ar' => 'دسوق'])],
                    ['name' => json_encode(['en' => 'Biyala', 'ar' => 'بيلا'])],
                ]
            ],
            [
                'city_name' => json_encode(['en' => 'Monufia', 'ar' => 'المنوفية']),
                'districts' => [
                    ['name' => json_encode(['en' => 'Shibin El Kom', 'ar' => 'شبين الكوم'])],
                    ['name' => json_encode(['en' => 'Sadat City', 'ar' => 'مدينة السادات'])],
                    ['name' => json_encode(['en' => 'Menouf', 'ar' => 'منوف'])],
                ]
            ],
            [
                'city_name' => json_encode(['en' => 'Gharbia', 'ar' => 'الغربية']),
                'districts' => [
                    ['name' => json_encode(['en' => 'Tanta', 'ar' => 'طنطا'])],
                    ['name' => json_encode(['en' => 'El Mahalla El Kubra', 'ar' => 'المحلة الكبرى'])],
                    ['name' => json_encode(['en' => 'Kafr El Zayat', 'ar' => 'كفر الزيات'])],
                ]
            ],
            [
                'city_name' => json_encode(['en' => 'Faiyum', 'ar' => 'الفيوم']),
                'districts' => [
                    ['name' => json_encode(['en' => 'Faiyum', 'ar' => 'الفيوم'])],
                    ['name' => json_encode(['en' => 'Ibshaway', 'ar' => 'إبشواي'])],
                    ['name' => json_encode(['en' => 'Sinnuris', 'ar' => 'سنورس'])],
                ]
            ],
            [
                'city_name' => json_encode(['en' => 'Beni Suef', 'ar' => 'بني سويف']),
                'districts' => [
                    ['name' => json_encode(['en' => 'Beni Suef', 'ar' => 'بني سويف'])],
                    ['name' => json_encode(['en' => 'Al Fashn', 'ar' => 'الفشن'])],
                    ['name' => json_encode(['en' => 'Somasta', 'ar' => 'سمسطا'])],
                ]
            ],
            [
                'city_name' => json_encode(['en' => 'Minya', 'ar' => 'المنيا']),
                'districts' => [
                    ['name' => json_encode(['en' => 'Minya', 'ar' => 'المنيا'])],
                    ['name' => json_encode(['en' => 'Bani Mazar', 'ar' => 'بني مزار'])],
                    ['name' => json_encode(['en' => 'Samalut', 'ar' => 'سمالوط'])],
                ]
            ],
            [
                'city_name' => json_encode(['en' => 'Assiut', 'ar' => 'أسيوط']),
                'districts' => [
                    ['name' => json_encode(['en' => 'Assiut', 'ar' => 'أسيوط'])],
                    ['name' => json_encode(['en' => 'Dairut', 'ar' => 'ديروط'])],
                    ['name' => json_encode(['en' => 'Manfalut', 'ar' => 'منفلوط'])],
                ]
            ],
            [
                'city_name' => json_encode(['en' => 'Sohag', 'ar' => 'سوهاج']),
                'districts' => [
                    ['name' => json_encode(['en' => 'Sohag', 'ar' => 'سوهاج'])],
                    ['name' => json_encode(['en' => 'Gerga', 'ar' => 'جرجا'])],
                    ['name' => json_encode(['en' => 'Akhmim', 'ar' => 'أخميم'])],
                ]
            ],
            [
                'city_name' => json_encode(['en' => 'Red Sea', 'ar' => 'البحر الأحمر']),
                'districts' => [
                    ['name' => json_encode(['en' => 'Hurghada', 'ar' => 'الغردقة'])],
                    ['name' => json_encode(['en' => 'Safaga', 'ar' => 'سفاجا'])],
                    ['name' => json_encode(['en' => 'Quseer', 'ar' => 'القصير'])],
                ]
            ],
            [
                'city_name' => json_encode(['en' => 'New Valley', 'ar' => 'الوادي الجديد']),
                'districts' => [
                    ['name' => json_encode(['en' => 'Kharga', 'ar' => 'الخارجة'])],
                    ['name' => json_encode(['en' => 'Dakhla', 'ar' => 'الداخلة'])],
                    ['name' => json_encode(['en' => 'Farafra', 'ar' => 'الفرافرة'])],
                ]
            ],
            [
                'city_name' => json_encode(['en' => 'Matrouh', 'ar' => 'مطروح']),
                'districts' => [
                    ['name' => json_encode(['en' => 'Marsa Matrouh', 'ar' => 'مرسى مطروح'])],
                    ['name' => json_encode(['en' => 'Sidi Barrani', 'ar' => 'سيدي براني'])],
                    ['name' => json_encode(['en' => 'El Alamein', 'ar' => 'العلمين'])],
                ]
            ],
            [
                'city_name' => json_encode(['en' => 'North Sinai', 'ar' => 'شمال سيناء']),
                'districts' => [
                    ['name' => json_encode(['en' => 'Arish', 'ar' => 'العريش'])],
                    ['name' => json_encode(['en' => 'Bir al-Abd', 'ar' => 'بئر العبد'])],
                    ['name' => json_encode(['en' => 'Rafah', 'ar' => 'رفح'])],
                ]
            ],
            [
                'city_name' => json_encode(['en' => 'South Sinai', 'ar' => 'جنوب سيناء']),
                'districts' => [
                    ['name' => json_encode(['en' => 'Sharm El-Sheikh', 'ar' => 'شرم الشيخ'])],
                    ['name' => json_encode(['en' => 'Dahab', 'ar' => 'دهب'])],
                    ['name' => json_encode(['en' => 'Nuweiba', 'ar' => 'نويبع'])],
                ]
            ],
        ];

        // إدخال المحافظات والمدن التابعة لها في قاعدة البيانات
        foreach ($governorates as $governorate) {
            $governorateId = DB::table('city')->insertGetId(['city_name' => $governorate['city_name']]);

            foreach ($governorate['districts'] as $city) {
                $city['city_id'] = $governorateId;
                DB::table('district')->insert($city);
            }
        }
    }
}



