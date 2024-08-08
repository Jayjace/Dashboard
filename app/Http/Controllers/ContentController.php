<?php

namespace App\Http\Controllers;

use App\Models\Content;
use Illuminate\Http\Request;

class ContentController extends Controller
{
    public function index()
    {
        return Content::all();
    }

    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required',
            'description' => 'required',
            'image_url' => 'required|url',
        ]);

        return Content::create($request->all());
    }

    public function show($id)
    {
        return Content::findOrFail($id);
    }

    public function update(Request $request, $id)
    {
        $content = Content::findOrFail($id);
        $content->update($request->all());

        return $content;
    }

    public function destroy($id)
    {
        Content::findOrFail($id)->delete();
        return response()->noContent();
    }
}

