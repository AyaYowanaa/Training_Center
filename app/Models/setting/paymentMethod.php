<?php

namespace App\Models\setting;
use App\Models\Finance\Account;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Spatie\Translatable\HasTranslations;

class paymentMethod extends Model
{
    use HasFactory,HasTranslations;
    protected $fillable=['name','status','icon'];
    protected $table = 'fr_payment_method';
    public $translatable = ['name'];



}
