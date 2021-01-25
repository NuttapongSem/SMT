<?php

namespace App\Http\Controllers;

use App\Models\Video;
use Illuminate\Http\Request;

class VideoController extends Controller
{
    public function saveVideo(Request $request)
    {
        $filevideo = new Video();
        $filevideo->videoTags = $request->videoTags;

        $filevideo->save();

        return response()->json([
            'status' => "success"
        ], 200);
    }


    public function getVideo(Request $request)
    {
        $filevideo = Video::get();
        

        return response($filevideo);
    }


    public function searchinterest(Request $request)
    {
        $data = Video::where('videoTags', 'like', "%{$request->videoTags}%")->get();

        return response()->json($data, 200);
    }

    
    public function numview(Request $request)
    {
        $query = Video::find($request->id);
        $query->view = $query->view + 1;
        $query->save();

        return response()->json(['massege' => "save view"], 200);
    }
}
