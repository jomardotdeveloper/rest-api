<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class CivilResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array|\Illuminate\Contracts\Support\Arrayable|\JsonSerializable
     */
    public function toArray($request)
    {
        return  [
            "id" => $this->id,
            "faculty" => new FacultyResource($this->user->faculty),
            "career" => $this->career,
            "rating" => $this->rating,
            "date" => $this->date,
            "place" => $this->place,
            "lnumber" => $this->lnumber,
            "ldate" => $this->ldate,
        ];
    }
}
