<?php

namespace App\Models\setting;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Spatie\Translatable\HasTranslations;
class Entity extends Model
{
    use SoftDeletes,HasTranslations;

    protected $table = 'entities';

    public $translatable = ['name','address'];
    protected $fillable = [
        'name','email','address','phone'
    ];

}
