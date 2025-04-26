<?php

namespace App\Models\setting;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Spatie\Translatable\HasTranslations;

class MainSetting extends Model
{

    protected $table = 'tc_main_setting';
    public $timestamps = true;

    use SoftDeletes,HasTranslations;
    public $translatable = ['title'];
    protected $dates = ['deleted_at'];
    protected $fillable = array('title','type_id_fk','type_code', 'status');

    public function typedata()
    {
        return $this->belongsTo(TypeSetting::class, 'type_id_fk');
    }

}
