<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class RoboticsKitResource extends JsonResource
{
    public function toArray(Request $request): array
    {
        return [
            'id' => $this->id,
            'name' => $this->name,
            'description' => $this->description,
            'created_at' => $this->created_at,
            'updated_at' => $this->updated_at,
            'courses' => CourseResource::collection($this->whenLoaded('courses')),
            'courses_count' => $this->when(isset($this->courses_count), $this->courses_count),
        ];
    }
}
