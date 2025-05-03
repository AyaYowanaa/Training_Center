<?php

namespace App\Models\training_center;
use App\Models\training_center\TrainingCourse;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Spatie\Translatable\HasTranslations;
class Students extends Model
{
    use SoftDeletes,HasTranslations,HasFactory;

    protected $table = 'tc_students';
    public $translatable = ['name'];

    protected $fillable = [
        'code',
        'name',
        'phone',
        'email',
        'courses_id',
        'grades_id',
        'bulk_import',
    ];

    public function coursesData()
    {
        return $this->belongsTo(TrainingCourse::class, 'courses_id');
    }

    public function registeredCourses()
    {
    return $this->belongsToMany(TrainingCourse::class,
    'tc_student_registration_course', 'student_id', 'courses_id');
    }
}
