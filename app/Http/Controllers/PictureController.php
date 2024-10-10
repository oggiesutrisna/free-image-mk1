<?php

namespace App\Http\Controllers;

use App\Models\Picture;
use Illuminate\Http\Request;

class PictureController extends Controller
{
    public function index()
    {
        $pictures = Picture::orderBy('created_at', 'desc')->paginate(6);
        return view('welcome', compact('pictures'));
    }

    public function store(Request $request)
    {
        //
    }

    public function show($picture_slug)
    {
        $picture = Picture::where('picture_slug', $picture_slug)->firstOrFail();

        return view('pictures.show', compact('picture'));
    }

    public function update(Request $request, Picture $picture)
    {
        //
    }

    public function destroy(Picture $picture)
    {
        //
    }
}
