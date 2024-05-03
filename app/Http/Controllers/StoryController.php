<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Blog;
use App\Models\Category;
use App\Models\User;
class StoryController extends Controller
{
    public function showStory($cat_name, $name)
    {
        //echo $blog_name = str_replace('-', ' ', $name);
        $blog = Blog::where('site_url', $name)->with('images')->first();
        $author =  User::where('id', $blog->author)->first();
        $category = Category::where('id', $blog->categories_ids)->first();
        $other_blog = Blog::where('id','!=', $blog->id)->with('thumbnail')->where('categories_ids', $blog->categories_ids)->with('images')->limit(6)->get()->all();
        $latests = Blog::where('id','!=', $blog->id)->whereNull('link')->with('thumbnail')->with('images')->orderBy('id', 'DESC')->limit(6)->get()->all();
        //$videos_latests = Blog::where('id','!=', $blog->id)->whereNotNull('link')->with('thumbnail')->with('images')->orderBy('id', 'DESC')->limit(6)->get()->all();
        return view('detail')->with('data', ['blog'=> $blog, 'relates'=> $other_blog, 'latests' => $latests, 'category' => $category, 'author' => $author]);
    }
    public function category($name)
    {
        $page = isset($_REQUEST['page']) ? $_REQUEST['page'] : 0;
        $count = 10;
        $category = Category::where('site_url', $name)->first();
        $blog = Blog::where('categories_ids', $category->id)->with('images')->orderBy('id', 'DESC')->paginate($count);
        $blog->setPath(asset('/').$name);
        return view('category',['category'=> $category,'blogs' => $blog, 'page' => $page, 'count' => $count]);
    }
}
