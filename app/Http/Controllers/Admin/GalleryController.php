<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Intervention\Image\Facades\Image;
use App\Models\Photo;

class GalleryController extends Controller
{
    // __All Photos Manage Function__ //
    public function PhotoGallery()
    {
        // $photo = DB::table('photos')->get();  // Sql Query , Add DB All DATA
        $photo = Photo::all();

        return view('admin.gallery_section.photos', compact('photo'));
    }
    // End Photos index


    // __Store Photos Manage Function__ //
    public function PhotoStore(Request $request)
    {
        $request->validate([
            'photo' => 'required',
            'title' => 'required',
            'type' => 'required',
        ]);

        $img = $request->file('photo');

        $name_gen = hexdec(uniqid()) . '.' . $img->getClientOriginalExtension();

        Image::make($img)->resize(500, 310)->save("image/gallery/" . $name_gen);

        $save_img_url = "image/gallery/" . $name_gen;

        Photo::insert([
            'title' => $request->title,
            'type' => $request->type,
            'photo' => $save_img_url,


        ]);
        $notification = array('messege' => 'Photo Upload Successfully !!', 'alert-type' => "success");
        return redirect()->back()->with($notification);
    }
    // End District Store

    // Delete Photo function
    public function PhotoDestroy($id)
    {
        $file = Photo::findOrFail($id);
        $img = $file->photo; // Multi_image come to the database Fild name.
        unlink($img);

        Photo::findOrFail($id)->delete();

        $notification = array('messege' => 'Photo Delete Successfully !!', 'alert-type' => "success");
        return redirect()->back()->with($notification);
    }
    // End Photo function
}
