<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\Api\StoreUpdateCategory;
use App\Models\Category;
use Illuminate\Http\Request;

class CategoriesController extends Controller
{
    public function index()
    {
        return Category::with('ad')->paginate(10);
    }

    public function show($category){
        return Category::find($category);
    }

    public function store(StoreUpdateCategory $request){
        $is_active = ($request->is_active == null || $request->is_active) ? 1 : 0;
        $category = Category::create([
            'name' => $request->name,
            'description' => $request->description,
            'is_active' => $is_active
        ]);

        return response()->json([
            'category' => $category,
            'message' => 'category inserted successfully',
            'code' => 200
        ]);
    }

    public function update(StoreUpdateCategory $request, $id){
        $is_active = ($request->is_active == null || $request->is_active) ? 1 : 0;
        $category = Category::find($id)->update([
            'name' => $request->name,
            'description' => $request->description,
            'is_active' => $is_active
        ]);

        return response()->json([
            'category' => Category::find($id),
            'message' => 'category updated successfully',
            'code' => 200
        ]);
    }
    public function destroy($category){
        $category = Category::find($category);
        if($category){
            $category->delete();
            return response()->json([
                'category' => $category,
                'message' => 'deleted successfully',
                'code' => 200
            ]);
        }

        return response()->json([
            'message' => 'category not found',
            'code' => 404
        ]);
    }
}
