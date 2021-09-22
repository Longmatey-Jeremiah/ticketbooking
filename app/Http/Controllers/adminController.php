<?php

namespace App\Http\Controllers;
use App\booked_ticket;
use App\ticket;
use Illuminate\Http\Request;

class adminController extends Controller
{
    public function __construct(){
       
        $this->middleware('admin');
    }
    public function allticket(){
        $ticket = ticket::all();
        return view('auth2.ticket.alltickets')->with('ticket',$ticket);
    }
    public function index()
    {
        return view('auth2.index');
    }
    public function ticket_all(){
        $booked = booked_ticket::all();
        return view('auth2.ticket.tickets_all')->with('booked',$booked);
    }
    public function ticket_today(){
        $booked = booked_ticket::all();
        return view('auth2.ticket.tickets_today')->with('booked',$booked);
    }
    public function qrcode(){
        return view('auth2.ticket.qrcode');
    }
}
