<?php

namespace App\Models\training_center;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Spatie\Translatable\HasTranslations;
class Students extends Model
{
    use SoftDeletes,HasTranslations;

    protected $table = 'students';

    protected $fillable = [
        'code',
        'name',
        'phone',
        'email',
        'courses_id',
        'grades_id',
        'bulk_import',
    ];

  /*   protected $casts = [
        'courses' => 'array',
        'grades' => 'array',
        'bulk_import' => 'boolean',
    ]; */

    public function coursesData()
    {
        return $this->belongsTo(Course::class, 'courses_id');
    }

}
