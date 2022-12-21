<?php

namespace App\Http\Resources\Api\Advertiser;

use Illuminate\Http\Resources\Json\JsonResource;

class StoreResource extends JsonResource
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
            'advertiser' => new AdvertiserResource($request),
            'message' => 'Advertiser created successfully',
            'status_code' => 200
        ];
    }
}
