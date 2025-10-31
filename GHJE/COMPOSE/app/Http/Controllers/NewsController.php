<?php

namespace App\Http\Controllers;

use App\Models\News;
use Illuminate\Http\Request;

class NewsController extends Controller
{
    public function index()
    {
        $news = News::latest()->get();
        return view('news.index', compact('news'));
    }

    public function create()
    {
        return view('news.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'short_text' => 'required|string|max:500',
            'article' => 'required|string',
            'image' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        $imageData = null;
        $imageName = null;

        if ($request->hasFile('image')) {
            $image = $request->file('image');
            $imageData = file_get_contents($image->getRealPath());
            $imageName = $image->getClientOriginalName();
        }

        News::create([
            'title' => $request->title,
            'short_text' => $request->short_text,
            'article' => $request->article,
            'image' => $imageData,
            'image_name' => $imageName,
        ]);

        return redirect()->route('news.index')->with('success', 'News added successfully!');
    }

    public function show($id)
    {
        $newsItem = News::findOrFail($id);
        return view('news.show', compact('newsItem'));
    }

    public function edit($id)
    {
        $newsItem = News::findOrFail($id);
        return view('news.create', compact('newsItem'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'short_text' => 'required|string|max:500',
            'article' => 'required|string',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        $news = News::findOrFail($id);

        $imageData = $news->image;
        $imageName = $news->image_name;

        if ($request->hasFile('image')) {
            $image = $request->file('image');
            $imageData = file_get_contents($image->getRealPath());
            $imageName = $image->getClientOriginalName();
        }

        $news->update([
            'title' => $request->title,
            'short_text' => $request->short_text,
            'article' => $request->article,
            'image' => $imageData,
            'image_name' => $imageName,
        ]);

        return redirect()->route('news.show', $news->id)->with('success', 'News updated successfully!');
    }
}