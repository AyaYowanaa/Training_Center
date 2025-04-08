<?php

namespace App\Models\training_center;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Spatie\Translatable\HasTranslations;
class Students extends Model
{
    use SoftDeletes,HasTranslations;

    protected $table = 'trainers';

 
    protected $fillable = [
        'code', 'name', 'image', 'bio', 'cv', 'courses_id', 'documents',
        'passport_id', 'bank_info', 'evaluation', 'course_evaluations', 'average_grade'
    ];

    protected $casts = [
        'courses_id' => 'array',
        'documents' => 'array',
        'course_evaluations' => 'array',
    ];

    public function coursesData()
    {
        return $this->belongsTo(Course::class, 'courses_id');
    }

}
