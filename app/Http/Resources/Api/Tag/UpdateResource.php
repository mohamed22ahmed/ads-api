<?php

namespace App\Http\Resources\Api\Tag;

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
            'tag' => new TagResource($request),
            'message' => 'tag updated successfully',
            'status_code' => 200
        ];
    }
}
