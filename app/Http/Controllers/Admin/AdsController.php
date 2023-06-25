<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\Ads;
use Intervention\Image\Facades\Image;

class AdsController extends Controller
{

    function index()
    {
        $all_ads = DB::table('ads')->get();
        return view('admin.ads_section.ads', compact('all_ads'));
    }

    function store(Request $request)
    {
        $data = array();
        $data['link'] = $request->link;

        if ($request->type == 2) {
            $img = $request->file('image');

            $name_gen = hexdec(uniqid()) . '.' . $img->getClientOriginalExtension();

            Image::make($img)->resize(970, 90)->save("image/ads/" . $name_gen);
            $data['image'] = "image/ads/" . $name_gen;
            $data['type'] = 2;
            DB::table('ads')->insert($data);

            $notification = array('messege' => 'Vartical Ads Successfully Added !!', 'alert-type' => "success");
            return redirect()->back()->with($notification);
        } else {
            $img = $request->file('image');

            $name_gen = hexdec(uniqid()) . '.' . $img->getClientOriginalExtension();

            Image::make($img)->resize(500, 500)->save("image/ads/" . $name_gen);
            $data['image'] = "image/ads/" . $name_gen;
            $data['type'] = 2;
            DB::table('ads')->insert($data);

            $notification = array('messege' => 'Horizontal Ads Successfully Added !!', 'alert-type' => "success");
            return redirect()->back()->with($notification);
        }
    }
}
