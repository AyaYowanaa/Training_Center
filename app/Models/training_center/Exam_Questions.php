<?php

namespace App\Models\training_center;
use App\Models\training_center\Exams;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
class Exam_Questions extends Model
{
    use HasFactory;

    protected $table = 'tc_exams_questions';

    protected $fillable = [
        
        'exam_id',
        'mark',
        'q_answer',
        'q_text',
        'q_choices',
        
    ];

    public function examsData()
    {
        return $this->belongsTo(Exams::class, 'exam_id');
    }

   
}
