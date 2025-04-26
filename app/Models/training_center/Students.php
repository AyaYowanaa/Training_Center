<?php

namespace App\Models\training_center;
use App\Models\training_center\TrainingCourse;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Spatie\Translatable\HasTranslations;
class Students extends Model
{
    use SoftDeletes,HasTranslations;

    protected $table = 'students';
    public $translatable = ['name'];

    protected $fillable = [
        'code',
        'name',
        'phone',
        'email',
        'courses_id',
        'grades_id',
        'bulk_import',
    ];

    public function coursesData()
    {
        return $this->belongsTo(TrainingCourse::class, 'courses_id');
    }

}
