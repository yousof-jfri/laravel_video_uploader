<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Video;
use Illuminate\Support\Facades\Storage;

class VideoController extends Controller
{
    public function index(){
        $videos = Video::all();
        return view('index', compact('videos'));
    }

    // store and upload video 
    public function store(Request $request)
    {
        // validate data
        $request->validate([
            'name' => 'required',
            'file' => 'required'
        ]);

        // upload Video
        $file = $request->file('file')->store('public/videos');
        
        // save video into database
        $video = Video::create([
            'title' => $request->name,
            'video' => $file,
        ]);

        return response('success', 200);
    }

    // return all the videos
    public function show($id)
    {
        $video = Video::find($id);

        return view('video', compact('video'));
    }
}
