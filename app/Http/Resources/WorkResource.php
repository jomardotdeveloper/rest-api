<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class WorkResource extends JsonResource
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
            "title" => $this->title,
            "company" => $this->company,
            "msalary" => $this->msalary,
            "from" => $this->from,
            "to" => $this->to,
            "salary" => $this->salary,
            "status" => $this->status,
            "govt" => $this->govt
        ];
    }
}
