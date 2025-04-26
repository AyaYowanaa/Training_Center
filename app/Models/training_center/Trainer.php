<?php

namespace App\Models\training_center;

use App\Models\training_center\Course;
use Illuminate\Database\Eloquent\Model;

//use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Support\Facades\Storage;
use Spatie\Translatable\HasTranslations;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Trainer extends Model
{
    use HasTranslations;

    protected $table = 'tc_trainers';

    public $translatable = ['name'];
    protected $fillable = [
        'code', 'name', 'image', 'cv', 'courses_id', 'phone', 'email',
        'evaluation', 'course_evaluations', 'average_grade', 'specialization'
    ];

    protected $appends = ['image_url'];

    public function getImageUrlAttribute()
    {
        $value = $this->image;
        if (!empty($value)) {
            $image_path = Storage::disk('images')->url($value);
            return (Storage::disk('images')->exists($value)) ? asset($image_path) : getDefultImage();
        } else {
            return getDefultImage();

        }
    }
    public function coursesData()
    {
        return $this->belongsTo(Course::class, 'courses_id');
    }
    function files()
    {
        return $this->hasMany(Trainer_Files::class, 'trainer_id', 'id');
    }
}

class Trainer_Files extends Model
{
    use HasFactory;

    protected $table = 'tc_trainers_files';
    protected $fillable = ['trainer_id', 'file', 'file_name'];

    protected $appends = ['file_url'];

    public function getFileUrlAttribute()
    {
        $value = $this->file;
        if (!empty($value)) {
            $image_path = Storage::disk('images')->url($value);
            return (Storage::disk('images')->exists($value)) ? asset($image_path) : getDefultImage();
        } else {
            return getDefultImage();

        }
    }
}
