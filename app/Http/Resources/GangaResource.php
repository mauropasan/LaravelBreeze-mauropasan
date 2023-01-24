<?php

namespace App\Http\Resources;

use App\Models\User;
use Illuminate\Http\Resources\Json\JsonResource;

class GangaResource extends JsonResource
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
            'id' => $this->id,
            'title' => $this->title,
            'description' => $this->description,
            'price' => $this->price,
            'price_sale' => $this->price_sale,
            'available' => $this->available,
        ];
    }
}
