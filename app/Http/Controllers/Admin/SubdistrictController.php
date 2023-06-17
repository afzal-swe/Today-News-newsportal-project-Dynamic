<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Subdistrict;

class SubdistrictController extends Controller
{
    // __All Sub-District Manage Function__ //
    public function index()
    {
        // $categoryData = DB::table('districts')->get();  // Sql Query , Add DB All DATA
        $subdistrict = Subdistrict::all();

        return view('admin.subdistrict_section.index', compact('subdistrict'));
    }
    // End Sub-District index
}
