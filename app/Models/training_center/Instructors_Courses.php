<?php

namespace App\Models\training_center;
use App\Models\training_center\TrainingCourse;
use App\Models\setting\Expenses;
use Illuminate\Database\Eloquent\Model;
use App\Models\training_center\Trainer;
class Instructors_Courses extends Model
{

    protected $table = 'instructors_courses';

    protected $fillable = [
        'courses_id',
        'trainer_id',
  
    ];

    public function coursesData()
    {
        return $this->belongsTo(TrainingCourse::class, 'courses_id');
    }
    public function trainerData()
    {
        return $this->belongsTo(Trainer::class, 'trainer_id');
    }

}
