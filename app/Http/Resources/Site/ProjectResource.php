<?php

namespace App\Http\Resources\Site;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;
use Illuminate\Support\Facades\Storage;

class ProjectResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {

        if (!empty($this->main_image)) {
            $image_path = Storage::disk('images')->url($this->main_image);

            $imageurl = asset((Storage::disk('images')->exists($this->main_image)) ? $image_path : 'assets/images/blank.png');
        } else {
            $imageurl = asset('assets/images/blank.png');

        }
        return [
            'IEvent' => $this->id,
            'eventTitle' => $this->title,
            'eventDetails' => $this->details,
            'eventFeatures' => $this->features,
            'city' => optional($this->city)->city_name,
            'district' => optional($this->district)->name,
            'eventDate' => formatDateDayDisplay($this->date_at),
            'eventLocation' => $this->location,
            'eventLocationMap' => $this->location_map,
            'eventFromHour' => formatTimeForDisplay($this->from_time),
            'eventToHour' => formatTimeForDisplay($this->to_time),
            'eventPublisher' => $this->publisher,
            'eventImage' => $imageurl,
            'eventImgaes' => ProjectImageResource::collection($this->images)
        ];
    }
    public function edite_data($request): array
    {

        if (!empty($this->main_image)) {
            $image_path = Storage::disk('images')->url($this->main_image);

            $imageurl = asset((Storage::disk('images')->exists($this->main_image)) ? $image_path : 'assets/images/blank.png');
        } else {
            $imageurl = asset('assets/images/blank.png');

        }
        $title = $this->getTranslations('title');
        $details = $this->getTranslations('details');
        $features = $this->getTranslations('features');
        $location = $this->getTranslations('location');
        return [
            'id' => $this->id,
            'title_en' => optional($title)['en'],
            'title_ar' => optional($title)['ar'],
            'details_en' => optional($details)['en'],
            'details_ar' => optional($details)['ar'],
            'features_en' => optional($features)['en'],
            'features_ar' => optional($features)['ar'],
            'city_id' => $this->city_id,
            'district_id' => $this->district_id,
            'date_at' => $this->date_at,
            'publisher' => $this->publisher,
            'location_ar' => optional($location)['ar'],
            'location_en' => optional($location)['en'],
            'location_map' => $this->location_map,
            'from_time' => $this->from_time,
            'to_time' => $this->to_time,
            'eventImage' => $imageurl,
            'imgaes' => BlogImageResource::collection($this->images)
        ];
    }


}
