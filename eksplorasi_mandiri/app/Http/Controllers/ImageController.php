<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ImageController extends Controller
{
    public function index () {
         return view('image-upload');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'image' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);

        $file = $request->file('image');
        $filename = time().'.'.$file->extension();
        $file->move(public_path('images'), $filename);

        return back()
            ->with('success', 'Gambar berhasil diupload')
            ->with('image', $filename);
    }
}
