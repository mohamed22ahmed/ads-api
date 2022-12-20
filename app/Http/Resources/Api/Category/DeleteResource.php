<?php

namespace App\Http\Resources\Api\Category;

use Illuminate\Http\Resources\Json\JsonResource;

class DeleteResource extends JsonResource
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
            'category' => new CategoryResource($request),
            'message' => 'category deleted successfully',
            'status_code' => 200
        ];
    }
}
