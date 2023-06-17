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

}
