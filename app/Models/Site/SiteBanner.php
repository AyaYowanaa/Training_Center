<?php

namespace App\Models\Site;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Spatie\Translatable\HasTranslations;

class SiteBanner extends Model
{
    use HasFactory,HasTranslations;
    protected $fillable = ['title', 'image','sub_title','thumbnailsm','thumbnailmd'];
    public $translatable = ['title','sub_title'];

    public $timestamps = true;

}
