<?php

namespace App\Models\training_center;

use App\Models\setting\paymentMethod;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Invoice_student extends Model
{
    use HasFactory;

    protected $table = 'tc_invoice_student';
    public $timestamps = true;

    protected $fillable = [
        'student_id', 'course_id', 'amount',
        'payment_method', 'status', 'date',
        'invoice_type', 'remain_balance', 'balance'

    ];

    protected static function boot()
    {
        parent::boot();
        static::creating(function ($model) {
            $model->remain_balance = $model->balance - $model->amount;
        });
    }

    public function studentData()
    {
        return $this->belongsTo(Students::class, 'student_id');
    }


    public function coursesData()
    {
        return $this->belongsTo(TrainingCourse::class, 'course_id');
    }

    function payment()
    {
        return $this->belongsTo(PaymentMethod::class, 'payment_method');
    }
}
