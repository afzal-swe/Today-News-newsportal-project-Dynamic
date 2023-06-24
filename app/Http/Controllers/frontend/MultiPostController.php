<?php

namespace App\Http\Controllers\frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class MultiPostController extends Controller
{
    public function singlePost($id, $slug)
    {
        $post_data = DB::table('posts')
            ->join('categories', 'posts.cat_id', 'categories.id')
            ->join('subcategories', 'posts.subcat_id', 'subcategories.id')
            ->join('users', 'posts.user_id', 'users.id')
            ->select('posts.*', 'categories.category_bn', 'categories.category_en', 'subcategories.subcategory_bn', 'subcategories.subcategory_en', 'users.name')
            ->where('posts.id', $id)
            ->first();

        return view('frontend.singpost', compact('post_data'));
    }



    /// Nav Route 
    public function subnav($id)
    {
        $posts = DB::table('posts')->where('subcat_id', $id)->orderBy('id', 'DESC')->paginate(12);
        return view('frontend.nav', compact('posts'));
    }

    /// Nav Route 
    public function more($id,)
    {
        $posts = DB::table('posts')->where('cat_id', $id)->orderBy('id', 'DESC')->paginate(12);
        return view('frontend.nav', compact('posts'));
    }
}
