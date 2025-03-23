<?php

namespace App\Models\Site;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Spatie\Translatable\HasTranslations;

class SiteFeedback extends Model
{
    use HasFactory,HasTranslations;
    protected $table = 'site_feedbacks';

    protected $fillable = ['image','name','jop_title','feedback'];
    public $translatable = ['name','jop_title','feedback'];

    public $timestamps = true;
}
