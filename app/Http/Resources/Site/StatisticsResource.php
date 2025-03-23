<?php

namespace App\Http\Resources\Site;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;
use Illuminate\Support\Facades\Storage;

class StatisticsResource extends JsonResource
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
            'number' => $this->number,
        ];
    }

    public function edite_data($request): array
    {

      
        $title = $this->getTranslations('title');
       
        return [
            'id' => $this->id,
            'title_ar' => optional($title)['ar'],
            'title_en' => optional($title)['en'],
            'number' =>$this->number,

        ];
    }

}
