<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Blog;
use App\Models\Category;

class StoryController extends Controller
{
    public function showStory($name)
    {
        $blog_name = str_replace('-', ' ', $name);
        $blog = Blog::where('eng_name', $blog_name)->with('images')->first();
        $category = Category::where('id', $blog->categories_ids)->first();
        $other_blog = Blog::where('id','!=', $blog->id)->with('thumbnail')->where('categories_ids', $blog->categories_ids)->with('images')->limit(6)->get()->all();
        $latests = Blog::where('id','!=', $blog->id)->whereNull('link')->with('thumbnail')->with('images')->orderBy('id', 'DESC')->limit(6)->get()->all();
        //$videos_latests = Blog::where('id','!=', $blog->id)->whereNotNull('link')->with('thumbnail')->with('images')->orderBy('id', 'DESC')->limit(6)->get()->all();
        return view('detail')->with('data', ['blog'=> $blog, 'relates'=> $other_blog, 'latests' => $latests, 'category' => $category]);
    }
    public function category($name)
    {
        $cat_name = str_replace('-', ' ', $name);
        $category = Category::where('eng_name', $cat_name)->first();
        $blog = Blog::where('categories_ids', $category->id)->with('images')->orderBy('id', 'DESC')->paginate(10);
        return view('category',['category'=> $category,'blogs' => $blog]);
    }
}
