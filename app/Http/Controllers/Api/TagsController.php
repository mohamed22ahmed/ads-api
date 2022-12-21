<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\Api\StoreUpdateTagRequest;
use App\Http\Resources\Api\DeleteResource;
use App\Http\Resources\Api\NotFoundResource;
use App\Http\Resources\Api\Tag\StoreResource;
use App\Http\Resources\Api\Tag\TagResource;
use App\Http\Resources\Api\Tag\UpdateResource;
use App\Models\Tag;

class TagsController extends Controller
{
    public function index()
    {
        return TagResource::collection(Tag::with('ads')->paginate(10));
    }

    public function show($id){
        $tag = Tag::where('id', $id)->with('ads')->get();
        if($tag)
            return TagResource::collection($tag);

        return new NotFoundResource($id);
    }

    public function store(StoreUpdateTagRequest $request){
        $is_active = ($request->is_active == null || $request->is_active) ? 1 : 0;
        $tag = Tag::create([
            'name' => $request->name,
            'description' => $request->description,
            'color' => $request->color,
            'is_active' => $is_active
        ]);

        if(isset($request->ads)) {
            $tag->ads()->attach(explode(',', $request->ads));
        }
        return new StoreResource(Tag::where('id', $tag->id)->with('ads')->get());
    }

    public function update(StoreUpdateTagRequest $request, $id){
        $is_active = ($request->is_active == null || $request->is_active) ? 1 : 0;
        Tag::find($id)->update([
            'name' => $request->name,
            'description' => $request->description,
            'color' => $request->color,
            'is_active' => $is_active
        ]);

        if(isset($request->ads)) {
            Tag::where('id', $id)->first()->ads()->sync(array_map('intval', explode(',', $request->ads)));
        }

        return new UpdateResource(Tag::where('id', $id)->with('ads')->get());
    }
    public function destroy($id){
        $tag = Tag::find($id);
        if($tag){
            $tag->delete();
            return new DeleteResource($id);
        }

        return new NotFoundResource($id);
    }
}
