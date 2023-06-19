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
        // $post_data = DB::table('posts')
        //     ->join('categories', 'posts.cat_id', 'categories.id')
        //     ->join('subcategories', 'posts.subcat_id', 'subcategories.id')
        //     ->join('districts', 'posts.dist_id', 'districts.id')
        //     ->join('subdistricts', 'posts.subdist_id', 'subdistricts.id')->get();

        $post_data = DB::table('posts')
            ->join('categories', 'posts.cat_id', 'categories.id')
            ->join('subcategories', 'posts.subcat_id', 'subcategories.id')
            ->select('posts.*', 'categories.category_bn', 'subcategories.subcategory_bn')
            ->get();

        // $post_data = Post::all();

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

        Image::make($img)->resize(500, 310)->save("image/post/" . $name_gen);

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
            'user_id' => Auth::user()->id,
            'post_date' => date('d-m-Y'),
            'post_month' => date('F'),
            'image' => $save_img_url,
            'created_at' => Carbon::now(),

        ]);
        $notification = array('messege' => 'Post Upload Successfully !!', 'alert-type' => "success");
        return redirect()->route('post.index')->with($notification);
    }
    // End Store  Post



    // Edit Post Section Start
    public function edit($id)
    {
        $category = DB::table('categories')->get();
        $district = DB::table('districts')->get();

        // $edit = Db::table('posts')->where('id',$id)->first();
        $edit = Post::findOrFail($id);
        return view('admin.post_section.edit', compact('edit', 'category', 'district'));
    }
    // Edit Post Section End


    // Update Post Section Start
    public function update(Request $request)
    {
        $update = $request->id;
        // $oldimage = $request->file('oldimage');
        $img = $request->file('image');

        $name_gen = hexdec(uniqid()) . '.' . $img->getClientOriginalExtension();

        Image::make($img)->resize(500, 310)->save("image/post/" . $name_gen);

        $save_img_url = "image/post/" . $name_gen;

        Post::findOrFail($update)->update([
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
            'image' => $save_img_url,
            'created_at' => Carbon::now(),

        ]);
        $notification = array('messege' => 'Post Update Successfully !!', 'alert-type' => "success");
        return redirect()->route('post.index')->with($notification);
    }
    // Update Post Section End


    // Delete News Post function
    public function destroy($id)
    {
        $file = Post::findOrFail($id);
        $img = $file->image; // Multi_image come to the database Fild name.

        unlink($img);
        Post::findOrFail($id)->delete();

        $notification = array('messege' => 'Post Delete Successfully !!', 'alert-type' => "success");
        return redirect()->route('post.index')->with($notification);
    }
    // End News Post function





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
