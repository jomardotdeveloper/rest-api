<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class FacultyResource extends JsonResource
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
            "picture" => $this->picture,
            "number" => $this->number,
            "first" => $this->first,
            "last" => $this->last,
            "middle" => $this->middle,
            "extension" => $this->extension,
            "birthdate" => $this->birthdate,
            "place" => $this->place,
            "sex" => $this->sex,
            "civil" => $this->civil,
            "height" => $this->height,
            "weight" => $this->weight,
            "blood" => $this->blood,
            "gsis" => $this->gsis,
            "pagibig" => $this->pagibig,
            "philhealth" => $this->philhealth,
            "sss" => $this->sss,
            "tin" => $this->tin,
            "citizenship" => $this->citizenship,
            "rhouse" => $this->rhouse,
            "rstreet" => $this->rstreet,
            "rvillage" => $this->rvillage,
            "rbarangay" => $this->rbarangay,
            "rcity" => $this->rcity,
            "rprovince" => $this->rprovince,
            "rzip" => $this->rzip,
            "phouse" => $this->phouse,
            "pstreet" => $this->pstreet,
            "pvillage" => $this->pvillage,
            "pbarangay" => $this->pbarangay,
            "pcity" => $this->pcity,
            "pprovince" => $this->pprovince,
            "pzip" => $this->pzip,
            "telephone" => $this->telephone,
            "mobile" => $this->mobile,
            "alternate" => $this->alternate,
            "user" => $this->user,
            "attr" => [
                "full_name" => $this->full_name,
                "age" => $this->age,
            ]
        ];
    }
}
