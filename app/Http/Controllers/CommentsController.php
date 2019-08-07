<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Comments;
use Carbon;

class CommentsController extends Controller
{
    public function commentpost(Request $request)
    {
        $curentdate = Carbon\Carbon::now("GMT+6");
        
        $comment = new Comments;
        $comment->name = $request->name;
        $comment->comments_time = $curentdate;
        $comment->description = $request->description;
        $comment->save();
        // dd($comment);
        return redirect()->route('home')
                        ->with('success','Comment Set Successull');

    }
}
