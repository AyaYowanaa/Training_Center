<?php

namespace App\Models\training_center;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\training_center\TrainingCourse;
use App\Models\setting\Entity; 

class Invoice_entity extends Model
{
    use HasFactory;

    protected $table = 'tc_invoice_entities';
    public $timestamps = true;

    protected $fillable = [
        'entity_id',
        'courses_id',
        'amount',
        'payment_method',
        'status',
        'date',

    ];


    public function entityData()
    {
        return $this->belongsTo(Entity::class, 'entity_id');
    }

    
    public function coursesData()
    {
        return $this->belongsTo(TrainingCourse::class, 'courses_id');
    }

}
