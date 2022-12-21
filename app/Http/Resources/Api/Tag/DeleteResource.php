<?php

namespace App\Http\Resources\Api\Tag;

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
            'message' => 'tag with id = '.$request->id.' deleted successfully',
            'status_code' => 200
        ];
    }
}
