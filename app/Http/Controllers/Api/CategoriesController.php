<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\Api\StoreUpdateCategoryRequest;
use App\Http\Resources\Api\Category\CategoryResource;
use App\Http\Resources\Api\DeleteResource;
use App\Http\Resources\Api\Category\StoreResource;
use App\Http\Resources\Api\Category\UpdateResource;
use App\Http\Resources\Api\NotFoundResource;
use App\Models\Category;
use Illuminate\Http\Request;

class CategoriesController extends Controller
{
    public function index()
    {
        return CategoryResource::collection(Category::with('ads')->paginate(10));
    }

    public function show($id){
        $category = Category::where('id', $id)->with('ads')->get();
        if($category)
            return CategoryResource::collection($category);

        return new NotFoundResource($id);
    }

    public function store(StoreUpdateCategoryRequest $request){
        $is_active = ($request->is_active == null || $request->is_active) ? 1 : 0;
        $category = Category::create([
            'name' => $request->name,
            'description' => $request->description,
            'is_active' => $is_active
        ]);

        return new StoreResource(Category::where('id', $category->id)->with('ads')->get());
    }

    public function update(StoreUpdateCategoryRequest $request, $id){
        $is_active = ($request->is_active == null || $request->is_active) ? 1 : 0;
        Category::find($id)->update([
            'name' => $request->name,
            'description' => $request->description,
            'is_active' => $is_active
        ]);

        return new UpdateResource(Category::where('id', $id)->with('ads')->get());
    }
    public function destroy($id){
        $category = Category::find($id);
        if($category){
            $category->delete();
            return new DeleteResource($id);
        }

        return new NotFoundResource($id);
    }
}
