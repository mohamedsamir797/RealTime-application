<?php

namespace App\Http\Controllers;

use App\Http\Resources\CategoryResource;
use App\Model\Category;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return CategoryResource::collection(Category::all());
    }

    public function store(Request $request)
    {
        $category = new Category();
        $category->name = $request->name ;
        $category->slug = str_slug($request->name);
        $category->save();
        return response('created successfully');
    }

    public function show(Category $category)
    {
        return new CategoryResource($category) ;
    }

    public function update(Request $request, Category $category)
    {
      $category->update($request->all());
      return response('updated successfully');
    }

    public function destroy(Category $category)
    {
        $category->delete();
        return response('deleted successfully');
    }
}
