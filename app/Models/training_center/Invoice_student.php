<?php

namespace App\Models\training_center;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\training_center\TrainingCourse;
use App\Models\training_center\Students; 

class Invoice_student extends Model
{
    use HasFactory;

    protected $table = 'tc_invoice_student';
    public $timestamps = true;

    protected $fillable = [
        'student_id',
        'courses_id',
        'amount',
        'payment_method',
        'status',
        'date',

    ];


    public function studentData()
    {
        return $this->belongsTo(Students::class, 'student_id');
    }

    
    public function coursesData()
    {
        return $this->belongsTo(TrainingCourse::class, 'courses_id');
    }

}
