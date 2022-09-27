<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;
use Illuminate\Support\Str;

class BootcampResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array|\Illuminate\Contracts\Support\Arrayable|\JsonSerializable
     */
    public function toArray($request)
    {
        //diseñar el encapsulado de
        //nuestra entidad
        return [
            'first_name' => Str::upper($this->first_name) ,
            'last_name' => Str::upper($this->last_name) ,
            'id' => $this->id 
        ];
    }
}
