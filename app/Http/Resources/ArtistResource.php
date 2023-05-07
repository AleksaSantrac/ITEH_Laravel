<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class ArtistResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array|\Illuminate\Contracts\Support\Arrayable|\JsonSerializable
     */
    public function toArray($request)
    {
        // return parent::toArray($request);

        return [
            'id' => $this->resource->id,
            'name' => $this->resource->name,
            'age' => $this->resource->age,
            'is_alive' => $this->resource->is_alive,
            'history' => $this->resource->history,
            'popularity' => $this->resource->popularity
        ];
    }

    public static $wrap = 'artist';
}
