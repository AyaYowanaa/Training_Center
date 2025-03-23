<?php

namespace App\Http\Resources\Site;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;
use Illuminate\Support\Facades\Storage;

class FeedbackResource extends JsonResource
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
        return [
            'name' => $this->name,
            'jop_title' => $this->jop_title,
            'feedback' => $this->feedback,
            'Image' => $imageurl,
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
        $name = $this->getTranslations('name');
        $feedback = $this->getTranslations('feedback');
        $jop_title = $this->getTranslations('jop_title');
        return [
            'id' => $this->id,
            'name_en' => optional($name)['en'],
            'name_ar' => optional($name)['ar'],
            'feedback_en' => optional($feedback)['en'],
            'feedback_ar' => optional($feedback)['ar'],
            'jop_title_ar' => optional($jop_title)['ar'],
            'jop_title_en' => optional($jop_title)['en'],
            'Image' => $imageurl,
        ];
    }

}
