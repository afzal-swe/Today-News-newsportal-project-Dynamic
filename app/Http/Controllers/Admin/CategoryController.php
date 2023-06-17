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

        return redirect()->back();
    }
    // End Category Store


}
