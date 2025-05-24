<?php

namespace App\Models\training_center;

use App\Models\setting\MainSetting;
use App\Models\Site\SiteEventImage;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Spatie\Translatable\HasTranslations;

class TrainingCourse extends Model
{
    use HasFactory, HasTranslations;

    protected $table = 'tc_training_courses';
    protected $fillable = ['details','code', 'title', 'from_date', 'to_date', 'location_id','duration','fee','effort','courses_id','capacity'];
    public $translatable = ['details', 'title'];

    public $timestamps = true;
    protected static function boot()
    {
        parent::boot();

        static::creating(function ($model) {
            $lastNum = static::orderByDesc('code')->value('code');
            $newNum = $lastNum ? ((int) $lastNum) + 1 : 1;
            $model->code = $newNum;
        });
    }

    /* public function images()
    {
        return $this->hasMany(SiteEventImage::class, 'event_id');
    } */
    public function coursesData()
    {
        return $this->belongsTo(Course::class, 'courses_id');
    }
    public function locationData()
    {
        return $this->belongsTo(MainSetting::class, 'location_id');
    }
}
