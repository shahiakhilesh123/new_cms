<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PageController extends Controller
{
    public function index(){
       
        return view('admin/pages');
    }
    public function GetFileFolder($path = '')
    {
        $html = "";
        //if($path == ""){
            $dirPath = getcwd().'/../'.$path;
        //} else {
        //    $dirPath = getcwd().'/..'.$path;
        //}
        
                $files = scandir($dirPath);
                $filePath = $path;
                for ($i = 0; $i <= count($files) - 1; $i++) { 
                    if (!str_contains($files[$i], '..') && $files[$i] != '.' && !str_contains($files[$i], '.')  && $files[$i] != 'Dockerfile' && $files[$i] != 'artisan') {
                       $html .= "<li>";
                        $html .= '<a href="#">';
                        $html .= '<i class="fa fa-folder" aria-hidden="true"></i> '.$files[$i];
                        $html .= "</a>";
                        $html .= $this->getSubFolderAndFile($files[$i]);
                        $html .= "</li>";
                    } else {
                        if (!str_contains($files[$i], '..') && $files[$i] != '.') {
                                $html .= "<li>";
                                $html .= "<a href=".route('editor.link', ['link' => base64_encode($files[$i])]).">";
                                $html .= '<i class="fa fa-file" aria-hidden="true"></i> '.$files[$i];
                                $html .= "</a>";
                                $html .= "</li>";
                        }
                    }
            //$this->GetFileFolder($filePath);
            }
                            
        return $html;
        //return pathinfo($path, PATHINFO_EXTENSION);
    }
    private function getSubFolderAndFile($path)
    {
        $html = "";
                $dirPath = getcwd().'/../'.$path;
                if (is_dir($dirPath)) {
                    $files = scandir($dirPath);
                    $filePath = $path;
                    $html .= "<ul>";
                    for ($i = 0; $i <= count($files) - 1; $i++) { 
                        if (!str_contains($files[$i], '..') && $files[$i] != '.' && !str_contains($files[$i], '.')  && $files[$i] != 'Dockerfile' && $files[$i] != 'artisan') {
                            $html .= "<li>";
                            $html .= '<a href="#">';
                            $html .= '<i class="fa fa-folder" aria-hidden="true"></i> '.$files[$i];
                            $html .= "</a>";
                            $html .= "</li>";
                            $html .= $this->getSubFolderAndFile($path.'/'.$files[$i]);
                        } else {
                            if (!str_contains($files[$i], '..') && $files[$i] != '.') {
                                    $html .= "<li>";
                                    $html .= "<a href=".route('editor.link', ['link' => base64_encode($path.'/'.$files[$i])]).">";
                                    $html .= '<i class="fa fa-file" aria-hidden="true"></i> '.$files[$i];
                                    $html .= "</a>";
                                    $html .= "</li>";
                            }
                        }
                    }
                    $html .= "</ul>";
                }
            return $html;
    }
    function checkFolderContain($path = "")
    {
       // $dirPath = getcwd().'/..'.$path;
        if (is_dir($path)) {
            return 1;
        } else {
            return 0;
        }
    }   
    public function editor(Request $request, $link)
    {
        $link = base64_decode($link);
        $path = getcwd().'/../'.$link;
        $myfile = fopen($path, "r") or die("Unable to open file!");
        $file = fread($myfile,filesize($path));
        fclose($myfile);
        return view('admin/editor')->with('data', ['file'=>$file, 'link' => $link]);
    }
    public function savePage(Request $request, $link)
    {
        $link = base64_decode($link);
        $path = getcwd().'/../'.$link;
        $myfile = fopen($path, "w") or die("Unable to open file!");
        fwrite($myfile, $request->code_content);
        fclose($myfile);
        return redirect('/pages')->with('status', 'File updated!');
    }
}
