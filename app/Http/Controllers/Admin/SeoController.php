<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\Seo;

class SeoController extends Controller
{
    public function seo()
    {
        $seo = DB::table('seos')->first(); // First method use first row show .

        // $social = Social::all();
        return view('admin.setting_section.seo', compact('seo'));
    }


    public function update(Request $request)
    {
        $update = $request->id;

        Seo::findOrFail($update)->update([
            'meta_author' => $request->meta_author,
            'meta_title' => $request->meta_title,
            'meta_keyword' => $request->meta_keyword,
            'meta_description' => $request->meta_description,
            'google_analytics' => $request->google_analytics,
            'google_verification' => $request->google_verification,
            'alexa_analytics' => $request->alexa_analytics,
        ]);
        $notification = array('messege' => 'SEO Update Successfully !!', 'alert-type' => "success");
        return redirect()->back()->with($notification);
    }
}
