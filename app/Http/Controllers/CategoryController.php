<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\StoreFileRequest;
use App\Models\Category;
use App\Models\File;
class CategoryController extends Controller
{
    public function index()
    {
        $categories = Category::paginate(20);
        $categories->setPath(asset('/categories'));
        return view('admin/category')->with('categories', $categories);
    }

    public function addCategory()
    {
        $categories = Category::get()->all();
        $file = File::get()->all();
        return view('admin/addCategory')->with('data' , ['categories'=> $categories, 'files' => $file]);
    }
    public function categoryAdd(Request $request)
    {
        $request->validate([
            'name' => 'required|string'
        ]);
        $status  = 0;
        if($request->home_page_status) {
            $status =1;
        }
        Category::create([
            'name' => $request->name,
            'image_name' => $request->file,
            'home_page_status' => $status,
            'category_id' => $request->category,
        ]);
        return redirect('/categories');
    }
    public function editCategory($id, Request $request)
    {
        $singleCate = Category::get()->where('id', $id)->first();
        $categories = Category::get()->all();
        $file = File::get()->all();
        return view('admin/editCategory')->with('data', ['categories' =>$categories, 'singleCate' => $singleCate, 'files' => $file]);
    }
    public function categoryEdit($id, Request $request)
    {
        $request->validate([
            'name' => 'required|string'
        ]);
        $status  = 0;
        if($request->home_page_status) {
            $status =1;
        }
        Category::where('id', $id)->update([
            'name' => $request->name,
            'image_name' => $request->file,
            'home_page_status' => $status,
            'category_id' => $request->category,
        ]);
        return redirect('/categories');
    }
}
