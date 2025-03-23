<?php

namespace App\Models\setting;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Spatie\Translatable\HasTranslations;

class City extends Model
{
    use HasFactory,HasTranslations,SoftDeletes;
    protected $table = 'city';
    protected $fillable = ['city_name'];
    public $translatable = ['city_name'];



    public function toArray()
    {
        $attributes = parent::toArray();
        foreach ($this->getTranslatableAttributes() as $field) {
            $attributes[$field] = $this->getTranslation($field, \App::getLocale());
        }
        return $attributes;
    }

    /*************************************************/
    public function districts()
    {
        return $this->hasMany(District::class, 'city_id');
    }

}
