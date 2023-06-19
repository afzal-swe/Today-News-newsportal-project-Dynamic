<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Website;

class WebsiteController extends Controller
{
    // __All Category Manage Function__ //
    public function index()
    {
        // $categoryData = DB::table('categories')->get();  // Sql Query , Add DB All DATA
        $websiteinfo = Website::all();

        return view('admin.website_section.index', compact('websiteinfo'));
    }
    // End Category index

    // __Store websit Manage Function__ //
    public function store(Request $request)
    {
        $request->validate([
            'website_name' => 'required|unique:websites|max:100',
            'website_link' => 'required|unique:websites|max:100',
        ]);

        // $data=array();
        // $data['category_bn'] =  $request->category_bn;
        // $data['category_en'] =  $request->category_en;
        // DB::table('categories')->insert($data);

        Website::insert([
            'website_name' => $request->website_name,
            'website_link' => $request->website_link,
        ]);

        $notification = array('messege' => 'website Added Successfully !', 'alert-type' => "success");
        return redirect()->back()->with($notification);
    }
    // End website Store

    // Website Delete Function Start

    public function destroy($id)
    {
        Website::destroy($id);

        $notification = array('messege' => 'Successfully Delete!', 'alert-type' => "success");
        return redirect()->back()->with($notification);
    }

    // Website Delete Function End
}
