<?php

namespace App\Models\training_center;

use App\Models\setting\Entity;
use DB;
use Illuminate\Database\Eloquent\Model;

class Course_registration extends Model
{

    protected $table = 'tc_student_registration_course';

    protected $fillable = [
        'course_id',
        'student_id',
        'entity_id',
        'num',

    ];

    /* protected static function boot()
     {
         parent::boot();

         static::creating(function ($model) {
             $lastNum = static::orderByDesc('num')->value('num');
             $newNum = $lastNum ? ((int) $lastNum) + 1 : 1;
             $model->num = $newNum;
         });
     }*/
    public function coursesData()
    {
        return $this->belongsTo(TrainingCourse::class, 'course_id');
    }

    public function studentData()
    {
        return $this->belongsTo(Students::class, 'student_id');
    }

    public function studentCount()
    {
        return $this->studentData()->count();
    }

    public function entityData()
    {
        return $this->belongsTo(Entity::class, 'entity_id');
    }

    function getLastNum()
    {
        $lastNum = self::orderByDesc('num')->value('num');
        return $lastNum ? ((int)$lastNum) + 1 : 1;
    }

    public static function registerStudents($courseId, array $studentIds, $entityId = null)
    {
        DB::beginTransaction();
        try {
            // اجلب آخر رقم مسجل
            $lastNum = self::orderByDesc('num')->value('num') ?? 0;

            $dataToInsert = [];

            foreach ($studentIds as $studentId) {
                // تأكد أن الطالب غير مسجل مسبقًا
                $exists = self::where('course_id', $courseId)
                    ->where('student_id', $studentId)
                    ->exists();

                if (!$exists) {
                    $dataToInsert[] = [
                        'course_id' => $courseId,
                        'student_id' => $studentId,
                        'entity_id' => $entityId,
                        'num' => $lastNum,
                    ];
                }
            }

            // نفذ الإدخال دفعة واحدة
            if (!empty($dataToInsert)) {
                self::insert($dataToInsert);
            }

            DB::commit();
            return true;
        } catch (\Exception $e) {
            DB::rollBack();
            throw $e;
        }
    }

    public static function registerStudent($courseId, $studentId, $entityId = null)
    {
        DB::beginTransaction();
        try {
            // اجلب آخر رقم مسجل
            $lastNum = self::orderByDesc('num')->value('num') ?? 0;

            $dataToInsert = [];

            // تأكد أن الطالب غير مسجل مسبقًا
            $exists = self::where('course_id', $courseId)
                ->where('student_id', $studentId)
                ->exists();

            if (!$exists) {
                $dataToInsert[] = [
                    'course_id' => $courseId,
                    'student_id' => $studentId,
                    'entity_id' => $entityId,
                    'num' => $lastNum,
                ];
            }

            // نفذ الإدخال دفعة واحدة
            if (!empty($dataToInsert)) {
                self::insert($dataToInsert);
            }

            DB::commit();
            return true;
        } catch (\Exception $e) {
            DB::rollBack();
            throw $e;
        }
    }

}
