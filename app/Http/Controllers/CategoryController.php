<?php

namespace App\Http\Controllers;
use App\Http\Resources\CategoryResource;
use App\Http\Resources\ImageResource;
use App\Http\Resources\PostResource;
use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $categories = Category::latest()->get();
        return view('admin.categories.index',compact('categories'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.categories.create');

    }

    /**
     * Store a newly created resource in storage.
     */

    public function store(Request $request)
    {

        $validatedData = $request->validate([
            'name' => 'required|max:255|unique:categories',
            'slug' => 'unique:categories',
            'slug_fr' => 'unique:categories',
            'type' => 'required',
        ]);

        $validatedData['slug'] = $request->slug ? $request->slug : Str::slug($request->name,'-');
        $validatedData['name_fr'] = $request->name_fr;
        $validatedData['slug_fr'] = $request->slug_fr ? $request->slug_fr  : Str::slug($request->name_fr,'-');
        $validatedData['is_published'] = $request->is_published ? 1 : 0;

        $created = Category::create($validatedData);

        if($created) {
            return redirect()->route('categories.index')->with(['success' => 'Category created successfully']);
        }

        abort(500);
    }

    /**
     * Display the specified resource.
     */
    public function showPosts(Category $category)
    {
        if($category->type != 'posts') abort(404);

        $posts = $category->posts()->where('is_published',1)->latest()->get();
        return response()->json(PostResource::collection($posts));
        
    }

    public function showImages($categorySlug)
    {

        $category = Category::where('slug',$categorySlug)->orWhere('slug_fr',$categorySlug)->first();
        if($category->type != 'images') abort(404);
        $images = $category->images;
        return response()->json(ImageResource::collection($images));
    }



    public function categories(): \Illuminate\Http\JsonResponse
    {
        $categories = Category::where('is_published',1)->latest()->get();
        return response()->json(CategoryResource::collection($categories),200);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Category $category)
    {
        return view('admin.categories.edit',compact('category'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Category $category)
    {
        $validatedData = $request->validate([
            'name' => 'required|max:255|unique:categories,name,' . $category->id,
            'slug' => 'required',
            'type' => 'required',
        ]);

        $validatedData['slug'] = $request->slug ? $request->slug : Str::slug($request->name,'-');
        $validatedData['name_fr'] = $request->name_fr;
        $validatedData['slug_fr'] = $request->slug_fr ? $request->slug_fr  : Str::slug($request->name_fr,'-');
        $validatedData['is_published'] = $request->is_published ? 1 : 0;


        $updated = $category->update($validatedData);

        if($updated) {
            return redirect()->route('categories.index')->with(['success' => 'Category updated successfully']);
        }

        abort(500);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Category $category)
    {
        if($category->delete()) {
            return redirect()->route('categories.index')->with(['success' => 'Category deleted successfully']);
        }

        abort(500);
    }
}
