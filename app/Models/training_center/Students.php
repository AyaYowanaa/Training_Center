<?php

namespace App\Models\training_center;
use App\Models\training_center\TrainingCourse;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Spatie\Translatable\HasTranslations;
use Illuminate\Support\Facades\Storage;

class Students extends Authenticatable
{
    use SoftDeletes, HasTranslations, HasFactory;

    protected $table = 'tc_students';
    public $translatable = ['name'];

    protected $fillable = [
        'code',
        'name',
        'user_name',
        'password',
        'phone',
        'email',
        'course_id',
        'grades_id',
        'bulk_import',
    ];


    protected static $numIncrement = 0001;
    protected static function boot()
    {
        parent::boot();

        static::creating(function ($row) {
            $lastnum = static::orderBy('code', 'desc')->first();
            $lastnumCode = $lastnum ? (int) $lastnum->code : static::$numIncrement;

            $row->code = ($lastnumCode + 1);

        });
    }

    protected $appends = ['image_path'];

    public function getImagePathAttribute()
    {
        $value = $this->image;
        if (!empty($value)) {
            $image_path = Storage::disk('images')->url($value);
            return asset((Storage::disk('images')->exists($value)) ? $image_path : 'assets/media/avatars/blank.png');
        } else {
            return asset('assets/media/avatars/blank.png');

        }
    }
    public function coursesData()
    {
        return $this->belongsTo(TrainingCourse::class, 'course_id');
    }

    public function registeredCourses()
    {
        return $this->belongsToMany(
            TrainingCourse::class,
            'tc_student_registration_course',
            'student_id',
            'course_id'
        );
    }

    public function Courses()
    {
        return $this->hasManyThrough(
            TrainingCourse::class,        // Target model (Course)
            Course_registration::class,    // Intermediate model (Course_registration)
            'student_id',                // Foreign key on UserClient table
            'id',                // Foreign key on Course table
            'id',    // Local key on Students table
            'course_id'          // Local key on Course_registration table
        );
    }
    function invoice()
    {
        return $this->hasMany(Invoice_student::class, 'student_id', 'id');
    }

    function attendances()
    {
        return $this->hasMany(AttendanceStudents::class, 'student_id', 'id');
    }
}
