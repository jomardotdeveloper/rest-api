<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class EducationResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array|\Illuminate\Contracts\Support\Arrayable|\JsonSerializable
     */
    public function toArray($request)
    {
        return [
            "id" => $this->id,
            "faculty" => new FacultyResource($this->user->faculty),
            "name" => $this->name,
            "course" => $this->course,
            "level" => $this->level,
            "from" => $this->from,
            "to" => $this->to,
            "units" => $this->units,
            "honors" => $this->honors,
        ];
    }
}
