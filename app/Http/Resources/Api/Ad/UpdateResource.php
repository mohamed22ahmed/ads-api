<?php

namespace App\Http\Resources\Api\Ad;

use Illuminate\Http\Resources\Json\JsonResource;

class UpdateResource extends JsonResource
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
            'ad' => new AdResource($request),
            'message' => 'Ad updated successfully',
            'status_code' => 200
        ];
    }
}
