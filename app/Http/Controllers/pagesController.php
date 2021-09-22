<?php

namespace App\Http\Controllers;
use App\category;
use App\booked_ticket;
use Illuminate\Http\Request;

class pagesController extends Controller
{
    public function index(){
        $Category = category::all();
        return view('pages.index')->with('Category',$Category);
    }
    public function userActivity(){
        $booked = booked_ticket::where('user_id',auth()->user()->id)->orderBy('id', 'desc')->get();
        return view('user.activity')->with('booked',$booked);
    }
    public function qrcode($id){
        $booked = booked_ticket::find($id);
        return view('user.qrcode')->with('booked',$booked);
    }
    public function today(){
        $Category = category::all();
        return view('pages.today')->with('Category',$Category);;
    }
}
