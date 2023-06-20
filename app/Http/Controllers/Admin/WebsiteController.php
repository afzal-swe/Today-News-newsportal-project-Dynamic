<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Website;
use Illuminate\Support\Facades\DB;

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
            'website_name_bn' => 'required|unique:websites|max:100',
            'website_name_en' => 'required|unique:websites|max:100',
            'website_link' => 'required|unique:websites|max:100',
        ]);

        // $data=array();
        // $data['category_bn'] =  $request->category_bn;
        // $data['category_en'] =  $request->category_en;
        // DB::table('categories')->insert($data);

        Website::insert([
            'website_name_bn' => $request->website_name_bn,
            'website_name_en' => $request->website_name_en,
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

    // Website Edit Function Start
    public function edit($id)
    {
        // $edit = DB::table('websites')->where('id', $id)->first();

        $edit = Website::findOrFail($id);

        return view('admin.website_section.edit', compact('edit'));
    }
    // Website edit Function End


    // Website update Function Start
    public function update(Request $request)
    {

        $update = $request->id;

        Website::findOrFail($update)->update([
            'website_name_bn' => $request->website_name_bn,
            'website_name_en' => $request->website_name_en,
            'website_link' => $request->website_link,
        ]);
        $notification = array('messege' => 'website Update Successfully !', 'alert-type' => "success");
        return redirect()->route('website.index')->with($notification);
    }
    // Website update Function End
}
