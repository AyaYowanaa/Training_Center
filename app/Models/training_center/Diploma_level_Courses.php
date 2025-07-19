<?php

namespace App\Models\training_center;
use App\Models\training_center\Diploma;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
class Diploma_level_Courses extends Model
{
    use HasFactory;

    protected $table = 'tc_diploma_level_courses';

    protected $fillable = [
        
        'diploma_id',
        'level_id',
        'course_name',
        'pass_mark',
        'full_mark', 
        'duration',
      
        
    ];

   
 
   
}
