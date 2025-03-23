<?php

namespace App\Http\Resources\Site;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;
use Illuminate\Support\Facades\Storage;

class AdvantagesResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {

        
        return [
            'title' => $this->title,
            'description' => $this->description,
            'icon'=> $this->icon,
        ];
    }

    public function edite_data($request): array
    {

      
        $title = $this->getTranslations('title');
        $description=$this->getTranslations('description');

       
        return [
            'id' => $this->id,
            'title_ar' => optional($title)['ar'],
            'title_en' => optional($title)['en'],
            'description_ar' => optional($description)['ar'],
            'description_en' => optional($description)['en'],
            'icon' => $this->icon,

        ];
    }

}
