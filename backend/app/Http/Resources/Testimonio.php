<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class Testimonio extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function toArray($request)
    {
        return [
            'id' => $this->id,
            'name' => $this->name,
            'testimonials'=> $this->testimonials,
            'operation' => $this->operation,
            'calification' => $this->calification,
            'date' => $this->date,
            'avatar' => $this->avatar,
            'avatarUrl'  => asset('avatarTestimonial/' . $this->avatar)
        ];
    }
}
