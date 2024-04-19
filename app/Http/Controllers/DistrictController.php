<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\District;
use App\Models\State;

class DistrictController extends Controller
{
    public function index()
    {
        $data = District::select('districts.id', 'districts.name', 'states.name as state_name')->JoinState()->paginate(20);
        $data->setPath(asset('/district'));
        return view('admin/district')->with('districts',$data);
    }
    public function add()
    {
        return view('admin/addDistrict')->with('states', State::get()->all());
    }
    public function save(Request $request)
    {
        $request->validate([
            'name' => 'required|string',
            'state_id' => 'required',
        ]);
        District::create([
            'name' => $request->name,
            'state_id' => $request->state_id,
        ]);
        return redirect('district');
    }
    public function edit($id)
    {
        return view('admin\editDistrict')->with('data', ['district' => District::where('id', $id)->first(), 'states'=>State::get()->all()]);
    }
    public function editSave($id, Request $request)
    {
        $request->validate([
            'name' => 'required|string',
            'state_id' => 'required',
        ]);
        District::where('id', $id)->update([
            'name' => $request->name,
            'state_id' => $request->state_id,
        ]);
        return redirect('district');
    }
}
