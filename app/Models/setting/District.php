<?php

namespace App\Models\setting;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Spatie\Translatable\HasTranslations;

class District extends Model
{
    use HasFactory, HasTranslations,SoftDeletes;

    protected $table = 'district';
    protected $fillable = ['name','city_id','status'];
    public $translatable = ['name'];


    public function city()
    {
        return $this->belongsTo(City::class);
    }

    public function toArray()
    {
        $attributes = parent::toArray();
        foreach ($this->getTranslatableAttributes() as $field) {
            $attributes[$field] = $this->getTranslation($field, \App::getLocale());
        }
        return $attributes;
    }

    /*************************************************/
    public function master_exercise()
    {
        return $this->hasMany(MastersExercise::class, 'region_id');
    }
}
