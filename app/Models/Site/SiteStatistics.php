<?php

namespace App\Models\Site;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Spatie\Translatable\HasTranslations;

class SiteStatistics extends Model
{
    use HasFactory,HasTranslations;
    protected $table = 'site_statistics';

    protected $fillable = ['title','number'];
    public $translatable = ['title'];

    public $timestamps = true;
}
