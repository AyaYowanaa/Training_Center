<?php

namespace App\Models\training_center;

use App\Models\setting\Entity;
use DB;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AttendanceStudents extends Model
{
    use HasFactory;
    protected $table = 'tc_attendance_students';

    protected $fillable = [
        'course_id',
        'student_id',
        'entity_id',
        'date',
        'time',

    ];

    public function coursesData()
    {
        return $this->belongsTo(TrainingCourse::class, 'course_id');
    }

    public function studentData()
    {
        return $this->belongsTo(Students::class, 'student_id');
    }

    public function entityData()
    {
        return $this->belongsTo(Entity::class, 'entity_id');
    }
    public static function recoredStudent($courseId, $studentId, $entityId = null)
    {
        DB::beginTransaction();
        try {

            $dataToInsert = [];

            $exists = self::where('course_id', $courseId)
                ->where('student_id', $studentId)
                ->exists();

            if (!$exists) {
                $dataToInsert[] = [
                    'course_id' => $courseId,
                    'student_id' => $studentId,
                    'entity_id' => $entityId,
                    'date' => date('Y-m-d'),
                    'time' => date('H:i:s'),
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
