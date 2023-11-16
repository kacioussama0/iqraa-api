<?php

namespace App\Http\Controllers;

use App\Http\Resources\PostResource;
use App\Models\Category;
use App\Models\Post;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $posts = Post::all();
        return view('admin.posts.index',compact('posts'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $categories = Category::where('type','posts')->get();
        return view('admin.posts.create',compact('categories'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $data = $request->validate([
            'title'=> 'required',
            'content'=> 'required',
            'category_id'=> 'required',
            'thumbnail'=> 'required',
        ]);

        $data['slug'] = $request->slug ? $request->slug : Str::slug($request->title,'-');
        $data['slug_fr'] = $request->slug_fr ? $request->slug_fr  : Str::slug($request->title_fr,'-');
        $data['title_fr'] = $request->title_fr;
        $data['content_fr'] = $request->content_fr;
        $data['is_published'] = $request->is_published ? 1 : 0;

        $image = $request->file('thumbnail')->store('posts','public');

        $data['thumbnail'] = $image;

        $created = Post::create($data);

        if($created) {
            return redirect()->route('posts.index')->with(['success' => 'Post created successfully']);
        }

        abort(500);
    }

    /**
     * Display the specified resource.
     */
    public function show(Post $post)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Post $post)
    {
        $categories = Category::where('type','posts')->get();
        return view('admin.posts.edit',compact('categories','post'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Post $post)
    {


        $data = $request->validate([
            'title'=> 'required',
            'content'=> 'required',
            'category_id'=> 'required',
        ]);

        $data['slug'] = $request->slug ? $request->slug : Str::slug($request->title,'-');
        $data['slug_fr'] = $request->slug_fr ? $request->slug_fr  : Str::slug($request->title_fr,'-');
        $data['title_fr'] = $request->title_fr;
        $data['content_fr'] = $request->content_fr;
        $data['is_published'] = $request->is_published ? 1 : 0;


        if($request->hasFile('thumbnail')) {
            Storage::delete('public/' . $post ->thumbnail);
            $data['thumbnail'] = $request->file('thumbnail')->store('posts','public');
        }

        $updated = $post->update($data);

        if($updated) {
            return redirect()->route('posts.index')->with(['success' => 'Post updated successfully']);
        }

         abort(500);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Post $post)
    {
        if($post->delete()){
            Storage::delete('public/' . $post ->thumbnail);
            return redirect()->route('posts.index')->with(['success' => 'Post deleted successfully']);
        }
        abort(500);
    }

    public function post($slug) {
        $post = Post::where('slug',$slug)->orWhere('slug_fr',$slug)->first();
        return response()->json(new PostResource($post));
    }

    public function latestPosts() {
        $posts = Post::where('is_published',1)->latest()->get()->take(3);
        return response()->json(PostResource::collection($posts));
    }

}
