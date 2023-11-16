<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Image;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class ImageController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $categories = Category::all()->where('type','=','images');
        return view('admin.images.index',compact('categories'));
    }
    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $categories = Category::all()->where('type','=','images');
        return view('admin.images.create',compact('categories'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'category_id' => 'required',
            'images' => 'required'
        ]);

        $images = $request -> images;

        foreach ($images as $image) {
            $fileName = explode('/',$image)[2];
            Storage::move('public/'. $image,'public/images/' . $fileName);
            Image::create([
                'name' => $fileName,
                'path' => 'images/' . $fileName,
                'category_id' => $request->category_id,
            ]);
        }

        Storage::deleteDirectory('public/tmp');

        return redirect()->to('admin/images');
    }



    public function categoryImages($categoryId) {
        $categoryImages = Category::findOrFail($categoryId)->images;
        return view('admin.images.show',compact('categoryImages'));
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Image $image)
    {
        if($image->delete()) {
            Storage::delete('public/' . $image->path);
            return redirect()->back()->with([
                'success' => 'image deleted successfully'
            ]);

        }
    }


    public function uploadPhoto(Request $request) {


        if($request->hasFile('images')){

            $files = $request->file('images');

            foreach ($files as $file) {

                return
                    $file -> store('tmp/' . uniqid() , 'public');
            }

            return  '';

        }
    }

    public function revert(Request $request) {
        return $request->file('images');

    }


}
