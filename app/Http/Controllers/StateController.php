<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\State;

class StateController extends Controller
{
    public function index()
    {
        $states = State::paginate(20);
        $states->setPath(asset('/state'));
        return view('admin/state')->with('states', $states);
    }
    public function add()
    {
        return view('admin/addState');
    }
    public function save(Request $request)
    {
        $request->validate([
            'name' => 'required|string',
        ]);
        $home_page_status = 0;
        if($request->home_page_status) {
            $home_page_status = 1;
        }
        State::create([
            'name' => $request->name,
            'home_page_status' => $home_page_status,
        ]);
        return redirect('state');
    }
    public function edit($id)
    {
        $state = State::where('id', $id)->first();
        return view('admin/editState')->with('state', $state);
    }
    public function editSave($id, Request $request)
    {
        $request->validate([
            'name' => 'required|string',
        ]);
        $home_page_status = 0;
        if($request->home_page_status) {
            $home_page_status = 1;
        }
        State::where('id', $id)->update([
            'name' => $request->name,
            'home_page_status' => $home_page_status,
        ]);
        return redirect('state');
    }
}
