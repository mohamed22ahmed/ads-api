<?php

namespace App\Http\Resources\Api\Ad;

use App\Http\Resources\Api\Advertiser\AdvertiserResource;
use App\Http\Resources\Api\Category\CategoryResource;
use App\Http\Resources\Api\Tag\TagResource;
use Illuminate\Http\Resources\Json\JsonResource;

class AdResource extends JsonResource
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
            "type" => $this->type,
            "title" => $this->title,
            "description" => $this->description,
            "start_date" => $this->start_date,
            "created_at" => $this->created_at,
            "updated_at" => $this->updated_at,
            "Advertiser" => new AdvertiserResource($this->advertiser),
        ];
    }
}
