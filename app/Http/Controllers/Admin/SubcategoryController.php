<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Category;
use Illuminate\Http\Request;
use App\Models\Subcategory;
use Illuminate\Support\Facades\DB;

class SubcategoryController extends Controller
{
    // __All Subcategory Manage Function__ //
    public function index()
    {
        $subcategoryData = DB::table('subcategories')->join('categories', 'subcategories.category_id', 'categories.id')->select('categories.category_en', 'subcategories.*')->get();  // Sql Query , Add DB All DATA
        // $categoryData = DB::table('categories')->get();  // Sql Query , Add DB All DATA
        // $subcategoryData = Subcategory::all();
        $category = Category::all();
        return view('admin.subcategory_section.index', compact('subcategoryData', 'category'));
    }
    // End Category index


    // __Store Subcategory Manage Function__ //
    public function store(Request $request)
    {
        $request->validate([
            'category_id' => 'required',
            'subcategory_bn' => 'required|unique:subcategories|max:55',
            'subcategory_en' => 'required|unique:subcategories|max:55',
        ]);

        Subcategory::insert([
            'category_id' => $request->category_id,
            'subcategory_bn' => $request->subcategory_bn,
            'subcategory_en' => $request->subcategory_en,
        ]);

        $notification = array('messege' => 'Subcategory Add Successfully !', 'alert-type' => "success");
        return redirect()->back()->with($notification);
    }
    // End Category Store


    // __Edit Subcategory Manage Function__ //
    public function edit($id)
    {
        // $edit = DB::table('subcategories')->where('id', $id)->first();  
        $edit = Subcategory::find($id);
        $category = Category::all();

        return view('admin.subcategory_section.edit', compact('edit', 'category'));
    }
    // End Subcategory Edit



    // __Update Subcategory Manage Function__ //
    public function update(Request $request)
    {
        $update = $request->id;

        Subcategory::findOrFail($update)->update([
            'category_id' => $request->category_id,
            'subcategory_bn' => $request->subcategory_bn,
            'subcategory_en' => $request->subcategory_en,
        ]);

        $notification = array('messege' => 'Subcategory Update Successfully !', 'alert-type' => "success");
        return redirect()->route('subcategory.index')->with($notification);
    }
    // End Subcategory Update


    // __Delete Category Manage Function__ //
    public function destroy($id)
    {
        // DB::table('subcategories')->where('id',$id)->delete();  // Delete Category with SQL

        Subcategory::destroy($id);

        $notification = array('messege' => 'Successfully Delete!', 'alert-type' => "success");
        return redirect()->back()->with($notification);
    }
    // End Category Delete

}
