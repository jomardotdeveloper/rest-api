<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class ProgramResource extends JsonResource
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
            "from" => $this->from,
            "to" => $this->to,
            "title" => $this->title,
            "hours" => $this->hours,
            "ld" => $this->ld,
            "sponsor" => $this->sponsor,
            "cover" => $this->cover,
            "cert" => $this->cert,
        ];
    }
}
