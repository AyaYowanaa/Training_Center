<?php

namespace App\Models\setting;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Spatie\Translatable\HasTranslations;

class TypeSetting extends Model
{

    protected $table = 'tc_type_setting';
    public $timestamps = true;

    use SoftDeletes,HasTranslations;
    public $translatable = ['title'];

    protected $dates = ['deleted_at'];
    protected $fillable = array('title', 'code');

}
