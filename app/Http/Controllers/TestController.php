<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Menu;
use App\Models\Blog;
use App\Models\Category;
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
    public function changeUrl() {
        $blogs = Blog::get()->all();
        foreach($blogs as $blog) {
            $url = $this->clean($blog->eng_name);
            $url = strtolower(str_replace(' ', '-',trim($url)));
            Blog::where('id', $blog->id)->update([
                'site_url' => $url,
            ]);
        }
        $categories = Category::get()->all();
        foreach($categories as $category) {
            $url = $this->clean($category->eng_name);
            $url = strtolower(str_replace(' ', '-',trim($url)));
            Category::where('id', $category->id)->update([
                'site_url' => $url,
            ]);
        }
    }
    public function clean($string) {
        $string = str_replace(' ', '-', $string); // Replaces all spaces with hyphens.
        $string = preg_replace('/[^A-Za-z0-9\-]/', '', $string); // Removes special chars.
        $string = trim($string);
        return preg_replace('/-+/', ' ', $string); // Replaces multiple hyphens with single one.
     }

}
