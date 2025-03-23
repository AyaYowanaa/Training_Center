<?php

namespace App\Models\Site;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SiteProjectsImage extends Model
{
    use HasFactory;
    protected $fillable = ['project_id','image','thumbnailsm','thumbnailmd'];
    public $timestamps = true;

}
