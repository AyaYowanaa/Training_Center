<?php

namespace App\Models\training_center;
use App\Models\training_center\TrainingCourse;
use App\Models\setting\Students;
use App\Models\setting\Entity;
use Illuminate\Database\Eloquent\Model;
class Course_registration extends Model
{

    protected $table = 'tc_student_registration_course';

    protected $fillable = [
        'courses_id',
        'student_id',
        'entity_id',

    ];

    public function coursesData()
    {
        return $this->belongsTo(TrainingCourse::class, 'courses_id');
    }
    public function studentData()
    {
        return $this->belongsTo(Students::class, 'student_id');
    }
    public function entityData()
    {
        return $this->belongsTo(Entity::class, 'entity_id');
    }

}
