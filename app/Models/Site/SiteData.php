<?php

namespace App\Models\Site;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Storage;
use Spatie\Translatable\HasTranslations;

class SiteData extends Model
{
    use  HasFactory,HasTranslations;
    protected $fillable=['image','logo_footer','name','email','address','fax','phone','video','maplocation','short_about',
        'whatsapp','twitter','snabchat','YouTube','Instagram','Facebook'];
    public $translatable = ['name','address','short_about'];

    public function getImageAttribute($value)
    {
        if (!empty($value)) {
            $image_path = Storage::disk('images')->url($value);

            return asset((Storage::disk('images')->exists($value)) ? $image_path : 'assets/media/svg/files/blank-image-dark.svg');

        }else{
            return asset('assets/media/svg/files/blank-image-dark.svg');

        }
    }
}
