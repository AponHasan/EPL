<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Comments;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $comment = Comments::orderBy('id','desc')->get();
        return view('home',compact('comment'));
    }
}
