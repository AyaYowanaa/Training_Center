<?php

namespace App\Models\training_center;

use App\Models\Site\SiteEventImage;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Spatie\Translatable\HasTranslations;

class TrainingCourse extends Model
{
    use HasFactory, HasTranslations;

    protected $table = 'training_courses';
    protected $fillable = ['details', 'title', 'from_date', 'to_date', 'location_id','duration','fee','effort','courses_id','capacity'];
    public $translatable = ['details', 'title'];

    public $timestamps = true;

    public function images()
    {
        return $this->hasMany(SiteEventImage::class, 'event_id');
    }
}
