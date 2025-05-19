<?php

namespace App\Models\setting;

use App\Models\training_center\AttendanceStudents;
use App\Models\training_center\Course_registration;
use App\Models\training_center\Invoice_entity;
use App\Models\training_center\Invoice_student;
use App\Models\training_center\Students;
use App\Models\training_center\TrainingCourse;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Spatie\Translatable\HasTranslations;
class Entity extends Model
{
    use SoftDeletes,HasTranslations,HasFactory;

    protected $table = 'tc_entities';

    public $translatable = ['name','address'];
    protected $fillable = [
        'name','email','address','phone'
    ];

    public function coursesData()
    {
        return $this->belongsTo(TrainingCourse::class, 'entity_id');
    }

    public function registeredCourses()
    {
        return $this->belongsToMany(TrainingCourse::class,
            'tc_student_registration_course', 'entity_id', 'course_id');
    }

    public function Courses()
    {
        return $this->hasManyThrough(
            TrainingCourse::class,        // Target model (Course)
            Course_registration::class,    // Intermediate model (Course_registration)
            'entity_id',                // Foreign key on Course_registration table
            'id',                // Foreign key on Course table
            'id',    // Local key on Students table
            'course_id'          // Local key on Course_registration table
        );
    }
    public function students()
    {
        return $this->hasManyThrough(
            Students::class,        // Target model (Course)
            Course_registration::class,    // Intermediate model (Course_registration)
            'entity_id',                // Foreign key on Course_registration table
            'id',                // Foreign key on Course table
            'id',    // Local key on Students table
            'student_id'          // Local key on Course_registration table
        );
    }
    function invoice()
    {
        return $this->hasMany(Invoice_entity::class, 'entity_id', 'id');
    }

    function attendances()
    {
        return $this->hasMany(AttendanceStudents::class, 'entity_id', 'id');
    }


}
