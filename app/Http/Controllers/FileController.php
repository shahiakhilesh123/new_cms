<?php

namespace App\Http\Controllers;
use App\Models\File;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class FileController extends Controller
{
    public function index()
    {
        $files = File::orderBy('id', 'DESC')->paginate(20);
        $files->setPath(asset('/files'));
        return view('admin/files')->with('files',$files);
    }
    public function fileAdd(Request $request)
    {
       return view('admin/addFile');
    }
    public function addFile(Request $request)
    {
        $request->validate([
            'file' => 'required'
        ]);
        $destinationPath = public_path('file');
        $fileName = $request->file->getClientOriginalName();
        $fileName = pathinfo($fileName, PATHINFO_FILENAME).time() . '.'. $request->file->extension();
        File::create(
                [
                    "user_id" => '1',
                    "file_name" => $fileName,
                    "file_type" => $request->file->getClientMimeType(),
                    "file_size" => $request->file->getSize(),
                    "full_path" => public_path('file'),
                ]
        );
        $request->file->move($destinationPath,$fileName);
        return redirect('/files');
    }
    public function uploadFile(Request $request)
    {
        if ($_FILES['file']['name']) {
            if (!$_FILES['file']['error']) {
                $name = md5(rand(100, 200));
                $ext = explode('.', $_FILES['file']['name']);
                $filename = $name . '.' . $ext[1];
                $destination = public_path('file').'/'. $filename;
                $location = $_FILES["file"]["tmp_name"];
                $user = Auth::user();
                File::create(
                    [
                        "user_id" =>  $user->id,
                        "file_name" => $filename,
                        "file_type" => $_FILES['file']['type'],
                        "file_size" =>$_FILES['file']['size'],
                        "full_path" => public_path('file'),
                    ]
                );
                move_uploaded_file($location, $destination);
                $files = File::get()->toArray();
                return response()->json(['data' => $files, 'success'=> true]);
            } else {
                return response()->json(['success'=> false]);
            }
          }
        // $destinationPath = public_path('file');
        // $fileName = $request->file->getClientOriginalName();
        // $fileName = pathinfo($fileName, PATHINFO_FILENAME).time() . '.'. $request->file->extension();
        // File::create(
        //         [
        //             "user_id" => '1',
        //             "file_name" => $fileName,
        //             "file_type" => $request->file->getClientMimeType(),
        //             "file_size" => $request->file->getSize(),
        //             "full_path" => public_path('file'),
        //         ]
        // );
        // $request->file->move($destinationPath,$fileName);
        //return redirect('/files');
    }
}

