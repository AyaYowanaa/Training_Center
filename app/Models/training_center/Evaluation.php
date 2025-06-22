<?php

namespace App\Models\training_center;
use App\Models\training_center\TrainingCourse;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
class Evaluation extends Model
{
    use HasFactory;

    protected $table = 'tc_evaluation';

    protected $fillable = [
        
        'name',
        'course_id',
        'date',
      
    ];

    public function coursesData()
    {
        return $this->belongsTo(TrainingCourse::class, 'course_id');
    }

   
}
