<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\Api\StoreUpdateCategory;
use App\Http\Resources\Api\Category\CategoryResource;
use App\Http\Resources\Api\Category\DeleteResource;
use App\Http\Resources\Api\Category\StoreResource;
use App\Http\Resources\Api\Category\UpdateResource;
use App\Http\Resources\Api\NotFoundResource;
use App\Models\Category;
use Illuminate\Http\Request;

class CategoriesController extends Controller
{
    public function index()
    {
        return CategoryResource::collection(Category::with('ad')->paginate(10));
    }

    public function show($id){
        $category = Category::find($id);
        if($category)
            return new CategoryResource($category);

        return new NotFoundResource($id);
    }

    public function store(StoreUpdateCategory $request){
        $is_active = ($request->is_active == null || $request->is_active) ? 1 : 0;
        $category = Category::create([
            'name' => $request->name,
            'description' => $request->description,
            'is_active' => $is_active
        ]);

        return new StoreResource($category);
    }

    public function update(StoreUpdateCategory $request, $id){
        $is_active = ($request->is_active == null || $request->is_active) ? 1 : 0;
        Category::find($id)->update([
            'name' => $request->name,
            'description' => $request->description,
            'is_active' => $is_active
        ]);

        return new UpdateResource(Category::find($id));
    }
    public function destroy($id){
        $category = Category::find($id);
        if($category){
            $category->delete();
            return new DeleteResource($category);
        }

        return new NotFoundResource($id);
    }
}
