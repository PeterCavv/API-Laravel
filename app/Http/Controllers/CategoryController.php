<?php

namespace App\Http\Controllers;

use App\Http\Resources\CategoryResource;
use App\Models\Category;

use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\Request;
use Symfony\Component\HttpFoundation\Response;

class CategoryController extends Controller
{
    public function index()
    {
        return CategoryResource::collection(Category::all());
    }

    public function show(Category $category){
        return new CategoryResource($category);
    }

    public function list()
    {
        return CategoryResource::collection(Category::all());
    }

    public function store(StoreCategoryRequest $request){

        $data = $request->all();

        if($request->hasFile('photo')){
            $file = $request->file('photo');
            $name = 'categories/'.Str::uuid().'.'. $file->extension();
            $file->storeAs('categories', $name, 'public');
            $data['photo'] = $name;
        }

        $category = Category::create($data);

        return new CategoryResource($category);
    }

    public function update(Category $category, StoreCategoryRequest $request){
        $category->update($request->all());

        return new CategoryResource($category);
    }

    public function delete(Category $category){
        $category->delete();

        return response(null, Response::HTTP_NO_CONTENT);
    }
}
