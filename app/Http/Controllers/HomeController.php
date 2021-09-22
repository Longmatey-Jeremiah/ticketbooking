<?php

namespace App\Http\Controllers;
use App\category;
use App\movie;
use Illuminate\Http\Request;
use Carbon\Carbon;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
       // $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $Category = category::all();
        $Movie = movie::all();
        return view('pages.index')->with('Category',$Category)->with('Movie',$Movie);
    }
}
