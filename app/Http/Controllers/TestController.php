<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Menu;
use App\Models\Blog;
class TestController extends Controller
{
    public function index()
    {
        $data = Menu::all();
        return view('admin/test23')->with('menus', $data);
    }
    public function detail()
    {
        $blogs = Blog::where('id', '4')->first();
        print_r($blogs->sort_description);
        //return view('detail')->with('blogs', '');
    }
}
