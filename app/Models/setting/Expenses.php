<?php

namespace App\Models\setting;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Spatie\Translatable\HasTranslations;
class Expenses extends Model
{
    use SoftDeletes,HasTranslations;

    protected $table = 'tc_expenses';

    public $translatable = ['name'];
    protected $fillable = [
        'name',
    ];

    protected $casts = [
        'name' => 'array',
    ];
}
