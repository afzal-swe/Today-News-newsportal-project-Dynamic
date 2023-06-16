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
}
