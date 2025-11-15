<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class CakeResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        return [
            'id' => $this->id,
            'name' => $this->name,
            'base_price' => $this->base_price,
            'size' => $this->size,
            'cake_info' => $this->whenLoaded('cakeInfo', function () {
                return new CakeInfoResource($this->cakeInfo);
            }),
            'tags' => $this->whenLoaded('tags', function () {
                return TagResource::collection($this->tags);
            }),
            'allergies' => $this->whenLoaded('allergies', function () {
                return AllergieResource::collection($this->allergies);
            }),
            'images' => $this->whenLoaded('images', function () {
                return CakeImageResource::collection($this->images);
            }),
        ];
    }
}
