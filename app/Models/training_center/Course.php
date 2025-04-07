<?php

namespace App\Models\training_center;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Storage;
use Kalnoy\Nestedset\NodeTrait;
use Spatie\Translatable\HasTranslations;

class Course extends Model
{
    use HasFactory;

    use NodeTrait,HasTranslations;


    public $translatable = ['name'];
    protected $table = 'tc_courses';

    protected $fillable = ['name', 'code', 'description', 'account_type', 'parent_id'];


    function parent_data()
    {
        return $this->belongsTo(Course::class, 'parent_id');
    }

    function children_data()
    {
        return $this->hasMany(Course::class, 'parent_id');
    }

   /* function type_data()
    {
        return $this->belongsTo(Accounts_type::class, 'account_type');
    }*/
}
