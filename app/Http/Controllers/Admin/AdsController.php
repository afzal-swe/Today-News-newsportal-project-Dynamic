<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\Ads;
use Intervention\Image\Facades\Image;

class AdsController extends Controller
{
    public function index()
    {
        $ads = DB::table('ads')->get();

        return view('admin.ads_section.index', compact('ads'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'link' => 'required',
            'ads' => 'required',
        ]);

        $data = array();
        $data['link'] = $request->link;
        if ($request->type == 2) {
            $image = $request->ads;

            $name_gen = hexdec(uniqid()) . '.' . $image->getClientOriginalExtension();
            Image::make($image)->resize(970, 90)->save("image/ads/" . $name_gen);
            $data['ads'] = "image/ads/" . $name_gen;
            $data['type'] = 2;
            DB::table('ads')->insert($data);

            $notification = array('messege' => 'Horizontal Ads Successfully  Added!', 'alert-type' => "success");
            return redirect()->back()->with($notification);
        } else {
            $image = $request->ads;

            $name_gen = hexdec(uniqid()) . '.' . $image->getClientOriginalExtension();
            Image::make($image)->resize(500, 500)->save("image/ads/" . $name_gen);
            $data['ads'] = "image/ads/" . $name_gen;
            $data['type'] = 1;
            DB::table('ads')->insert($data);

            $notification = array('messege' => 'vertical Ads Successfully  Added!', 'alert-type' => "success");
            return redirect()->back()->with($notification);
        }
    }
}
