<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Blog;
use App\Models\Pages;
use App\Models\PageSequence;

class PageSequenceController extends Controller
{
    public function index()
    {
        $pages = Pages::where('id', '1')->first();
        $sequences = Blog::select('blogs.id', 'blogs.name', 'blogs.sort_description', 'page_sequences.sequence')->whereRaw("find_in_set('".$pages->page_top_category."',categories_ids)")->where('header_sec', '1')->JoinSequence()->orderBy('sequence', 'ASC')->get();
        return view('admin/sequence')->with('data', ['sequences' => $sequences, 'pages' => $pages]);
    }
    public function save(Request $request)
    {
        $request->validate([
            'pageid' => 'required',
            'sequence' => 'required',
        ]);
        $sequence = json_decode($request->sequence);
        for($i=1; $i < count($sequence); $i++) {
            if($sequence[$i] != '') {
                $data = PageSequence::where('sequence', $i)->where('page_id', $request->pageid)->first();
                if($data !== null){
                    PageSequence::where('sequence', $i)->update([
                        'page_id' => $request->pageid,
                        'blog_id' => $sequence[$i],
                        'sequence' => $i,
                    ]);
                } else {
                    PageSequence::create([
                                'page_id' => $request->pageid,
                                'blog_id' => $sequence[$i],
                                'sequence' => $i,
                    ]);
                }
            }
        }
        return true;
    }
}
