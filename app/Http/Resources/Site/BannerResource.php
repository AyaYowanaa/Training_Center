<?php

namespace App\Http\Resources\Site;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;
use Illuminate\Support\Facades\Storage;

class BannerResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        if (!empty($this->image)) {
            $image_path = Storage::disk('images')->url($this->image);

            $imageurl = asset((Storage::disk('images')->exists($this->image)) ? $image_path : 'assets/images/blank.png');
        } else {
            $imageurl = asset('assets/images/blank.png');

        }
        if (!empty($this->thumbnailsm)) {
            $thumbnailsm_path = Storage::disk('images')->url($this->thumbnailsm);

            $thumbnailsm = asset((Storage::disk('images')->exists($this->thumbnailsm)) ? $thumbnailsm_path : 'assets/images/blank.png');
        } else {
            $thumbnailsm = asset('assets/images/blank.png');

        }

        if (!empty($this->thumbnailmd)) {
            $thumbnailmd_path = Storage::disk('images')->url($this->thumbnailmd);

            $thumbnailmd= asset((Storage::disk('images')->exists($this->thumbnailmd)) ? $thumbnailmd_path : 'assets/images/blank.png');
        }else{
            $thumbnailmd= asset('assets/images/blank.png');

        }
        return [
            'title' => $this->title,
            'sub_title' => $this->title,
            'id' => $this->id,

            'image' => $imageurl,
            'thumbnailsm' => $thumbnailsm,
            'thumbnailmd' => $thumbnailmd,
        ];
    }
    
    public function edite_data($request): array
    {

        if (!empty($this->image)) {
            $image_path = Storage::disk('images')->url($this->image);

            $imageurl = asset((Storage::disk('images')->exists($this->image)) ? $image_path : 'assets/images/blank.png');
        } else {
            $imageurl = asset('assets/images/blank.png');

        }
        if (!empty($this->thumbnailsm)) {
            $thumbnailsm_path = Storage::disk('images')->url($this->thumbnailsm);

            $thumbnailsm = asset((Storage::disk('images')->exists($this->thumbnailsm)) ? $thumbnailsm_path : 'assets/images/blank.png');
        } else {
            $thumbnailsm = asset('assets/images/blank.png');

        }

        if (!empty($this->thumbnailmd)) {
            $thumbnailmd_path = Storage::disk('images')->url($this->thumbnailmd);

            $thumbnailmd= asset((Storage::disk('images')->exists($this->thumbnailmd)) ? $thumbnailmd_path : 'assets/images/blank.png');
        }else{
            $thumbnailmd= asset('assets/images/blank.png');

        }
        $title = $this->getTranslations('title');
        $sub_title=$this->getTranslations('sub_title');

       
        return [
            'title_en' => $title['en'],
            'title_ar' => $title['ar'],
            'sub_title_ar' => $sub_title['ar'],
            'sub_title_en' => $sub_title['en'],
            'id' => $this->id,

            'image' => $imageurl,
            'thumbnailsm' => $thumbnailsm,
            'thumbnailmd' => $thumbnailmd,

        ];
    }
}
