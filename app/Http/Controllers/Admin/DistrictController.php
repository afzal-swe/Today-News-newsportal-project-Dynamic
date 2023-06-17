<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\District;

class DistrictController extends Controller
{
    // __All District Manage Function__ //
    public function index()
    {
        // $categoryData = DB::table('districts')->get();  // Sql Query , Add DB All DATA
        $district = District::all();

        return view('admin.district_section.index', compact('district'));
    }
    // End Category index

    // __Store District Manage Function__ //
    public function store(Request $request)
    {
        $request->validate([
            'district_bn' => 'required|unique:districts|max:55',
            'district_en' => 'required|unique:districts|max:55',
        ]);

        // $data=array();
        // $data['category_bn'] =  $request->category_bn;
        // $data['category_en'] =  $request->category_en;
        // DB::table('categories')->insert($data);

        District::insert([
            'district_bn' => $request->district_bn,
            'district_en' => $request->district_en,
        ]);

        $notification = array('messege' => 'Add New District Successfully !', 'alert-type' => "success");
        return redirect()->back()->with($notification);
    }
    // End District Store


    // __ Delete Manage Function__ //
    public function destroy($id)
    {
        // DB::table('districts')->where('id',$id)->delete();  // Delete Category with SQL

        District::destroy($id);

        $notification = array('messege' => 'Successfully Delete!', 'alert-type' => "success");
        return redirect()->back()->with($notification);
    }
    // End District Delete
}
