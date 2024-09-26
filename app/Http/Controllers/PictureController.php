<?php

namespace App\Http\Controllers;

use App\Models\Picture;
use Illuminate\Http\Request;

class PictureController extends Controller
{
    public function index()
    {
        return Picture::all();
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'user_id' => ['required', 'exists:users'],
            'picture_id' => ['required', 'integer'],
            'picture_name' => ['required'],
            'picture_description' => ['required'],
        ]);

        return Picture::create($data);
    }

    public function show(Picture $picture)
    {
        return $picture;
    }

    public function update(Request $request, Picture $picture)
    {
        $data = $request->validate([
            'user_id' => ['required', 'exists:users'],
            'picture_id' => ['required', 'integer'],
            'picture_name' => ['required'],
            'picture_description' => ['required'],
        ]);

        $picture->update($data);

        return $picture;
    }

    public function destroy(Picture $picture)
    {
        $picture->delete();

        return response()->json();
    }
}
