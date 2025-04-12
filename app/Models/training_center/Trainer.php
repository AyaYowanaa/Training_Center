<?php

namespace App\Models\training_center;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Spatie\Translatable\HasTranslations;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Trainer extends Model
{
    use SoftDeletes,HasTranslations;

    protected $table = 'trainers';

 
    protected $fillable = [
        'code', 'name', 'image', 'cv', 'courses_id','phone','email',
       'evaluation', 'course_evaluations', 'average_grade','specialization'
    ];

   
    public function coursesData()
    {
        return $this->belongsTo(Course::class, 'courses_id');
    }

}

class Trainer_Files extends Model
{
    use HasFactory;

    protected $table = 'trainers_files';
    protected $fillable = [
        'documents',
        'file','passport_id', 'bank_info', 
    ];

    protected $appends = ['file_url'];

    public function getFileUrlAttribute()
    {
        $value = $this->file;
        if (!empty($value)) {
            $image_path = Storage::disk('images')->url($value);
            return asset((Storage::disk('images')->exists($value)) ? $image_path : 'assets/media/avatars/blank.png');
        } else {
            return asset('assets/media/avatars/blank.png');

        }
    }
}
