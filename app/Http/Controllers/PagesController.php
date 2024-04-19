<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Pages;
use App\Models\Category;

class PagesController extends Controller
{
    public function index()
    {
        $pages = Pages::select('pages.id','pages.name','categories.name as cat_name')->JoinCategory()->get()->all();
        return view('admin/page')->with('pages', $pages);
    }
    public function add()
    {
        $category = Category::get()->all();
        return view('admin/addPage')->with('categories', $category);
    }
    public function save(Request $request)
    {
        $request->validate([
            'name' => 'required|string',
            'page_limit' => 'required',
            'category' => 'required',
        ]);
        Pages::create([
            'name' => $request->name,
            'page_limit' => $request->page_limit,
            'page_top_category' => $request->category,
        ]);
        return redirect('page'); 
    }
    public function edit($id)
    {
        $pages = Pages::where('id', $id)->first();
        $category = Category::get()->all();
        return view('admin/editPage')->with('data', ['categories' => $category, 'pages'=> $pages]);
    }
    public function editSave($id, Request $request)
    {
        $request->validate([
            'name' => 'required|string',
            'page_limit' => 'required',
            'category' => 'required',
        ]);
        Pages::where('id', $id)->update([
            'name' => $request->name,
            'page_limit' => $request->page_limit,
            'page_top_category' => $request->category,
        ]);
        return redirect('page'); 
    }
}
