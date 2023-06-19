<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Social;
use Illuminate\Support\Facades\DB;

class SocialController extends Controller
{
    public function social()
    {
        $social = DB::table('socials')->first(); // First method use first row show .

        // $social = Social::all();
        return view('admin.setting_section.social', compact('social'));
    }


    public function update(Request $request)
    {
        $update = $request->id;

        Social::findOrFail($update)->update([
            'facebook' => $request->facebook,
            'twitter' => $request->twitter,
            'youtube' => $request->youtube,
            'instagram' => $request->instagram,
            'linkedin' => $request->linkedin,
        ]);
        $notification = array('messege' => 'Social Link Update Successfully !!', 'alert-type' => "success");
        return redirect()->route('social.setting')->with($notification);
    }
}
