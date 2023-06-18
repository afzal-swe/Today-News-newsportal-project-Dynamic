<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Intervention\Image\Facades\Image;
use Illuminate\Support\Str;
use Illuminate\Support\Carbon;
use App\Models\Post;
use Illuminate\Support\Facades\Auth;

class PostController extends Controller
{
    // __All Post Manage Function__ //
    public function index()
    {

        $post_data = Post::all();

        return view('admin.post_section.index', compact('post_data'));
    }
    // End Category index


    // __Create Post Manage Function__ //
    public function create()
    {
        $category = DB::table('categories')->get();
        $district = DB::table('districts')->get();

        // $category = Category::all();
        // $district = District::all();

        return view('admin.post_section.create', compact('category', 'district'));
    }
    // End Create Post


    // __Store Post Manage Function__ //
    public function store(Request $request)
    {
        $request->validate([
            'cat_id' => 'required',
            'subcat_id' => 'required',
            'dist_id' => 'required',
            'subdist_id' => 'required',
            'title_en' => 'required',
            'title_bn' => 'required',
            'details_en' => 'required',
            'details_bn' => 'required',
            'tags_en' => 'required',
            'tags_bn' => 'required',
        ]);

        $img = $request->file('image');

        $name_gen = hexdec(uniqid()) . '.' . $img->getClientOriginalExtension();

        Image::make($img)->resize(430, 327)->save("image/post/" . $name_gen);

        $save_img_url = "image/post/" . $name_gen;

        Post::insert([
            'cat_id' => $request->cat_id,
            'subcat_id' => $request->subcat_id,
            'dist_id' => $request->dist_id,
            'subdist_id' => $request->subdist_id,
            'title_en' => $request->title_en,
            'title_bn' => $request->title_bn,
            'details_en' => $request->details_en,
            'details_bn' => $request->details_bn,
            'tags_en' => $request->tags_en,
            'tags_bn' => $request->tags_bn,
            'headline' => $request->headline,
            'first_section' => $request->first_section,
            'first_section_thumbnail' => $request->first_section_thumbnail,
            'bigthumbnail' => $request->bigthumbnail,
            'post_date' => date('d-m-Y'),
            'post_month' => date('F'),
            'image' => $save_img_url,
            'created_at' => Carbon::now(),

        ]);
        $notification = array('messege' => 'Post Upload Successfully !!', 'alert-type' => "success");
        return redirect()->route('post.index')->with($notification);
    }
    // End Store  Post





    /// Json Data Return //////
    public function GetSubcat($cat_id)
    {
        $sub = DB::table('subcategories')->where('category_id', $cat_id)->get();
        return response()->json($sub);
    }
    /// Json Data Return //////
    public function GetSubDist($dist_id)
    {
        $sub = DB::table('subdistricts')->where('district_id', $dist_id)->get();
        return response()->json($sub);
    }
}
