<?php

namespace App\Models\training_center;
use App\Models\training_center\Exams;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
class Evaluation_Questions extends Model
{
    use HasFactory;

    protected $table = 'tc_evaluation_questions';

    protected $fillable = [
        
        'exam_id',
       
        'q_text',
        'q_choices',
        'q_type',
        
    ];

    public function examsData()
    {
        return $this->belongsTo(Exams::class, 'exam_id');
    }
protected $casts = [
    'q_choices' => 'array',
];
   
}
