<?php

namespace App\Models\Site;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Spatie\Translatable\HasTranslations;

class SitePartners extends Model
{
    use HasFactory,HasTranslations;
    protected $table = 'site_parteners';

    protected $fillable = ['image','title','link'];
    public $translatable = ['title'];

    public $timestamps = true;
}
