<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;
use Carbon\Carbon;

class CourseResource extends JsonResource
{
    public function toArray($request)
    {
        // return parent::toArray($request);

        return [
            'id' => $this->uuid,
            'name' => $this->name,
            'description' => $this->description,
            'date' => Carbon::make($this->created_at)->format('Y-m-d'),
        ];
    }
}
