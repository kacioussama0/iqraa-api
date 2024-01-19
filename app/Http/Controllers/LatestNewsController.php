<?php

namespace App\Http\Controllers;

use App\Models\LatestNews;
use Illuminate\Http\Request;

class LatestNewsController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $news = LatestNews::all();
        return view('admin.news.index',compact('news'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.news.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $data = $request->validate([
           'content' => "required|max:255"
        ]);

        $data['is_published'] = $request->is_published ? 1 : 0;
        $data['content_fr'] = $request->content_fr ?? '';

        $created = LatestNews::create($data);

        if($created) {
            return redirect()->route('latest-news.index')->with(['success' => 'News created successfully']);
        }

        abort(500);

    }

    /**
     * Display the specified resource.
     */
    public function show(LatestNews $latestNews)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(LatestNews $latestNews)
    {
        return view('admin.news.edit',compact('latestNews'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, LatestNews $latestNews)
    {
        $data = $request->validate([
            'content' => "required|max:255"
        ]);

        $data['is_published'] = $request->is_published ? 1 : 0;
        $data['content_fr'] = $request->content_fr ?? '';

        $updated = $latestNews->update($data);

        if($updated) {
            return redirect()->route('latest-news.index')->with(['success' => 'News updated successfully']);
        }

        abort(500);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(LatestNews $latestNews)
    {
        if($latestNews->delete()) {
            return redirect()->route('latest-news.index')->with(['success' => 'News deleted successfully']);
        }
    }


    public function latestNews()
    {
        $latestNews = LatestNews::where('is_published',1)->latest()->get();
        return response()->json( $latestNews);
    }
}
