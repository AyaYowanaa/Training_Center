<?php

namespace App\Models\training_center;
use App\Models\training_center\TrainingCourse;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
class Exams extends Model
{
    use HasFactory;

    protected $table = 'tc_exams';

    protected $fillable = [
        
        'name',
        'course_id',
        'full_mark',
        'pass_mark',
        'date',
        'duration',
    ];

    public function coursesData()
    {
        return $this->belongsTo(TrainingCourse::class, 'course_id');
    }

   
}
