<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Subdistrict;
use App\Models\District;

use Illuminate\Support\Facades\DB;

class SubdistrictController extends Controller
{
    // __All Sub-District Manage Function__ //
    public function index()
    {
        $subdistrict = DB::table('subdistricts')->join('districts', 'subdistricts.district_id', 'districts.id')->select('districts.district_en', 'subdistricts.*')->get();  // Sql Query , Add DB All DATA

        // $categoryData = DB::table('districts')->get();  // Sql Query , Add DB All DATA
        $district = District::all();

        return view('admin.subdistrict_section.index', compact('district', 'subdistrict'));
    }
    // End Sub-District index


    // __Store Sub-District Manage Function__ //
    public function store(Request $request)
    {
        $request->validate([
            'district_id' => 'required',
            'subdistrict_bn' => 'required|unique:subdistricts|max:55',
            'subdistrict_en' => 'required|unique:subdistricts|max:55',
        ]);

        Subdistrict::insert([
            'district_id' => $request->district_id,
            'subdistrict_bn' => $request->subdistrict_bn,
            'subdistrict_en' => $request->subdistrict_en,
        ]);
        $notification = array('messege' => 'Sub-District Add Successfully !', 'alert-type' => "success");
        return redirect()->back()->with($notification);
    }
    // End Sub-District Store


    // __Edit Sub-District Manage Function__ //
    public function edit($id)
    {
        $subdistrict = Subdistrict::find($id);
        $destrict = District::all();

        return view('admin.subdistrict_section.edit', compact('subdistrict', 'destrict'));
    }
    // End Sub-District edit


    // __Update Sub-District Manage Function__ //
    public function update(Request $request)
    {
        $update = $request->id;

        Subdistrict::findOrFail($update)->update([
            'district_id' => $request->district_id,
            'subdistrict_bn' => $request->subdistrict_bn,
            'subdistrict_en' => $request->subdistrict_en,
        ]);

        $notification = array('messege' => 'Subcategory Update Successfully !', 'alert-type' => "success");
        return redirect()->route('subdistrict.index')->with($notification);
    }
    // End Sub-District Update


    // __Delete Sub-District Manage Function__ //
    public function destroy($id)
    {
        Subdistrict::destroy($id);

        $notification = array('messege' => 'Sub-District Delete Successfully !', 'alert-type' => "success");
        return redirect()->back()->with($notification);
    }
    // End Sub-District Delete
}
