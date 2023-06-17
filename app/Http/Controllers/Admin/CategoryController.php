<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Category;
use Illuminate\Support\Facades\DB;

class CategoryController extends Controller
{
    // __All Category Manage Function__ //
    public function index()
    {
        // $categoryData = DB::table('categories')->get();  // Sql Query , Add DB All DATA
        $categoryData = Category::all();

        return view('admin.category_section.index', compact('categoryData'));
    }
    // End Category index


    // __Store Category Manage Function__ //
    public function store(Request $request)
    {
        $request->validate([
            'category_bn' => 'required|unique:categories|max:55',
            'category_en' => 'required|unique:categories|max:55',
        ]);

        // $data=array();
        // $data['category_bn'] =  $request->category_bn;
        // $data['category_en'] =  $request->category_en;
        // DB::table('categories')->insert($data);

        Category::insert([
            'category_bn' => $request->category_bn,
            'category_en' => $request->category_en,
        ]);

        $notification = array('messege' => 'Category Add Successfully !', 'alert-type' => "success");
        return redirect()->back()->with($notification);
    }
    // End Category Store

    // __Edit Category Manage Function__ //
    public function edit($id)
    {
        // $edit = DB::table('categories')->where('id', $id)->first();  
        $edit = Category::find($id);

        return view('admin.category_section.edit', compact('edit'));
    }
    // End Category Edit


    // __Edit Category Manage Function__ //
    public function update(Request $request)
    {
        $update = $request->id;

        // $data=array();
        // $data['category_bn'] =  $request->category_bn;
        // $data['category_en'] =  $request->category_en;
        // DB::table('categories')->where('id',$id)->update($data);

        Category::findOrfail($update)->update([
            'category_bn' => $request->category_bn,
            'category_en' => $request->category_en,
        ]);

        $notification = array('messege' => 'Category Update Successfully !', 'alert-type' => "success");
        return redirect()->back()->with($notification);
    }
    // End Category Edit


    // __Delete Category Manage Function__ //
    public function destroy($id)
    {
        // DB::table('categories')->where('id',$id)->delete();  // Delete Category with SQL

        Category::destroy($id);

        $notification = array('messege' => 'Successfully Delete!', 'alert-type' => "success");
        return redirect()->back()->with($notification);
    }
    // End Category Delete


}
