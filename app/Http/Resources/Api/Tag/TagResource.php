<?php

namespace App\Http\Resources\Api\Tag;

use App\Http\Resources\Api\Ad\AdResource;
use App\Models\Ad;
use Illuminate\Http\Resources\Json\JsonResource;

class TagResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array|\Illuminate\Contracts\Support\Arrayable|\JsonSerializable
     */
    public function toArray($request)
    {
        $ads = Ad::whereIn('id', array_map('intval', explode(',', $this->ads)))->get();

        return [
            "id" => $this->id,
            "name" => $this->name,
            "description" => $this->description,
            "color" => $this->color,
            "is_active" => $this->is_active,
            "created_at" => $this->created_at,
            "updated_at" => $this->updated_at,
            "ads" => AdResource::collection(gettype($this->ads) == 'string' ? $ads : ($this->ads ?? []))
        ];
    }
}
