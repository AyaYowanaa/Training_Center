<?php

namespace App\Models\training_center;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class StudentExamAnswer extends Model
{
    use HasFactory;
    protected $table = 'tc_student_exam_answers';

    protected $fillable = [
        'student_id',
        'exam_id',
        'question_id',
        'answer',
        'degree',
        'is_correct'
    ];

    public function student()
    {
        return $this->belongsTo(Students::class, 'student_id');
    }

    public function exam()
    {
        return $this->belongsTo(Exams::class, 'exam_id');
    }

    public function question()
    {
        return $this->belongsTo(Exam_Questions::class, 'question_id');
    }
}
