<?php

namespace App\Models\Site;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Spatie\Translatable\HasTranslations;


class SiteAdvantage extends Model
{
    use HasFactory,HasTranslations;
    protected $table = 'site_advantages';

    protected $fillable = ['title','description','icon'];
    public $translatable = ['title','description'];

    public $timestamps = true;
}
