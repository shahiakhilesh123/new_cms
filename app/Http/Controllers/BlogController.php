<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Blog;
use App\Models\Category;
use App\Models\File;
use App\Models\State;
use App\Models\District;

class BlogController extends Controller
{
    public function index(Request $request)
    {
        $blogs = Blog::orderBy('id', 'DESC');
        if (isset($request->title)) {
            $blogs->Where('name', 'like', '%' .$request->title . '%');
        }
        if (isset($request->category)) {
            $blogs->where('categories_ids', $request->category);
        }
        $blogs = $blogs->paginate(20);
        if (isset($request->category)) {
            $category = $request->category;
            $title = $request->title;
            $blogs->setPath(asset('/posts').'?category='.$request->category.'title'.$title);
        } else {
            $title = '';
            $category = 0;
            $blogs->setPath(asset('/posts'));
        }
        return view('admin/blogList')->with('data', ['blogs'=> $blogs, 'category'=> $category, 'title' => $title]);
    }
    public function addBlog()
    {
        $file = File::orderBy('id', 'DESC')->get()->all();
        $categories = Category::get()->all();
        $state = State::get()->all();
        $district = District::get()->all();
        return view('admin/blogAdd')->with('data',['categories' => $categories, 'file' => $file, 'states'=>$state, 'district'=> $district]);
    }
    public function blogAdd(Request $request)
    {
        $request->validate([
            'name' => 'required|string',
            'sort_desc' => 'required|string',
            'category' => 'required',
        ]);
        $ima = $request->images;
        $cat = $request->category;
        $state = $request->state;
        $district = $request->district;
        $home_page_status = 0;
        if($request->home_page_status) {
            $home_page_status = 1;
        }
        $header_sec = 0;
        if($request->header_sec) {
            $header_sec = 1;
        }
        Blog::create([
            'name' => $request->name,
            'eng_name' => $request->eng_name,
            'link' => $request->link,
            'author' => $request->author,
            'home_page_status' => $home_page_status,
            'header_sec' => $header_sec,
            'sort_description' => $request->sort_desc,
            'keyword' => $request->keyword,
            'state_ids' => $state,
            'district_ids' => $district,
            'thumb_images' => $request->thumb_images,
            'image_ids' => $ima,
            'categories_ids' => $cat,
            'description' => $request->description,
        ]);
        return redirect('posts');
    }
    public function edit($id)
    {
        $blogs = Blog::where('id', $id)->first();
        $file = File::orderBy('id', 'DESC')->get()->all();
        $categories = Category::get()->all();
        $state = State::get()->all();
        $district = District::get()->all();
        return view('admin/blogEdit')->with('data',['categories' => $categories, 'file' => $file, 'states'=>$state, 'district'=> $district, 'blogs' => $blogs]);
    }
    public function editSave($id, Request $request)
    {
        $request->validate([
            'name' => 'required|string',
            'sort_desc' => 'required|string',
            'category' => 'required',
        ]);
        $ima = $request->images;
        $cat = $request->category;
        $state = $request->state;
        $district = $request->district;
        $home_page_status = 0;
        if($request->home_page_status) {
            $home_page_status = 1;
        }
        $header_sec = 0;
        if($request->header_sec) {
            $header_sec = 1;
        }
        Blog::where('id', $id)->update([
            'name' => $request->name,
            'eng_name' => $request->eng_name,
            'author' => $request->author,
            'link' => $request->link,
            'home_page_status' => $home_page_status,
            'header_sec' => $header_sec,
            'sort_description' => $request->sort_desc,
            'keyword' => $request->keyword,
            'state_ids' => $state,
            'district_ids' => $district,
            'thumb_images' => $request->thumb_images,
            'image_ids' => $ima,
            'categories_ids' => $cat,
            'description' => $request->description,
        ]);
        return redirect('posts');
    }
   
}
