<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Role;
use App\Models\File;
use Illuminate\Support\Facades\Hash;
use Auth;
//use Illuminate\Support\Facades\Validator;

class UsersController extends Controller
{
    public function index() 
    {
        $user = User::whereNot('id', 6)->paginate(20);
        $user->setPath(asset('/users'));
        return view('/admin/users', ["users"=>$user]);
    }
    public function add()
    {
        $role = Role::whereNot('id', 3)->get()->all();
        return view('/admin/addUser', ['roles'=>$role]);
    }
    public function save(Request $request)
    {
        $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => ['required', 'string', 'min:8', 'confirmed'],
            'role' => 'required|string',
        ]);
        
        User::create([
            'role' => $request->role,
            'name' =>  $request->name,
            'url_name' => $request->url_name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
        ]);
        return redirect('users');
    }
    public function edit($id)
    {
        $user = User::where('id', $id)->get()->first();
        $role = Role::whereNot('id', 3)->get()->all();
        $file = File::where('id', $user->image)->first();
        return view('/admin/editUser', ['roles'=>$role,'user'=>$user,'file'=>$file]);
    }
    public function editSave($id, Request $request)
    {
        $user = User::where('id', $id)->first();
        $file = File::where('id', $user->image)->first();
        $request->validate([
            'name' => ['required', 'string'],
            'role' => ['required']
        ]);
        $image = isset($file->file_name) ? $file->file_name : '';
        if(isset($request->image)) {
            $destinationPath = public_path('file');
            $image = $request->image->getClientOriginalName();
            $image = str_replace(' ', '_',$image);
            $image = pathinfo($image, PATHINFO_FILENAME).time() . '.'. $request->image->extension();
            $uploaded_file = File::create(
                    [
                        "user_id" => '1',
                        "file_name" => $image,
                        "file_type" => $request->image->getClientMimeType(),
                        "file_size" => $request->image->getSize(),
                        "full_path" => public_path('file'),
                    ]   
            );
            $request->image->move($destinationPath,$image);
            $image = $uploaded_file->id;
        }
        User::where('id', $id)->update([
            'role' => $request->role,
            'name' =>  $request->name,
            'image' => $image,
            'url_name' => $request->url_name,
            'description' => $request->description
        ]);
        return redirect('users');   
    }
    public function changePassword()
    {
        $user = Auth::user();
        return view('admin/changePassword')->with('user', $user);
    }
    public function savePassword(Request $request)
    {
        $user = Auth::user();
        $request->validate([
            'password' => ['required', 'string', 'min:8', 'confirmed'],
        ]);
        User::where('id', $user->id)->update([
            'password' => Hash::make($request->password),
        ]);
        return redirect('dashboard');
    }
}
