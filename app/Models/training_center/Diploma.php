<?php

namespace App\Models\training_center;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Spatie\Translatable\HasTranslations;
class Diploma extends Model
{
    use HasFactory,HasTranslations;

    protected $table = 'tc_diploma';
    public $translatable = ['name','description'];
    protected $fillable = [
        
        'name',
        'description',
        'levels',
        'total_price',
        'status',
    ];
  

   
}
