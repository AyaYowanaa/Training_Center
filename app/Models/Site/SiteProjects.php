<?php

namespace App\Models\Site;

use App\Models\setting\City;
use App\Models\setting\District;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Storage;
use Spatie\Translatable\HasTranslations;

class SiteProjects extends Model
{
    use HasFactory, HasTranslations;
    protected $table = 'site_project';
    protected $fillable = ['features','details', 'title', 'date_at', 'publisher', 'main_image','from_time','to_time','location','location_map', 'city_id', 'district_id'];
    public $translatable = ['details', 'title','location','features'];
        protected $appends = ['image_url'];

    public $timestamps = true;
    public function images()
    {
        return $this->hasMany(SiteProjectsImage::class,'project_id');
    }


    public function getImageUrlAttribute()
    {
        $value = $this->main_image;
        if (!empty($value)) {
            $image_path = Storage::disk('images')->url($value);
            return asset((Storage::disk('images')->exists($value)) ? $image_path : 'assets/media/avatars/blank.png');
        } else {
            return asset('assets/media/avatars/blank.png');

        }
    }

    public function city()
    {
        return $this->belongsTo(City::class, 'city_id');
    }

    public function district()
    {
        return $this->belongsTo(District::class, 'district_id');
    }

}
