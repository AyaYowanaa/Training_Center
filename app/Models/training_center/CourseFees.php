<?php

namespace App\Models\training_center;
use App\Models\training_center\TrainingCourse;
use App\Models\setting\Expenses;
use Illuminate\Database\Eloquent\Model;
class CourseFees extends Model
{

    protected $table = 'courses_fees';

    protected $fillable = [
        'courses_id',
        'expenses_id',
        'amount',
  
    ];

    public function coursesData()
    {
        return $this->belongsTo(TrainingCourse::class, 'courses_id');
    }
    public function expensesData()
    {
        return $this->belongsTo(Expenses::class, 'expenses_id');
    }

}
