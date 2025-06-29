<?php

namespace App\Models\training_center;
use App\Models\training_center\Diploma;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
class Diploma_levels extends Model
{
    use HasFactory;

    protected $table = 'tc_diploma_levels';

    protected $fillable = [
        
        'diploma_id',
        'pass_mark',
        'level_name',
        'level_price',
      
        
    ];

    public function levelsData()
    {
        return $this->belongsTo(Diploma::class, 'diploma_id');
    }
 
   
}
