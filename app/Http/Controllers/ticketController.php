<?php

namespace App\Http\Controllers;
use App\movie;
use App\ticket;
use Illuminate\Http\Request;

class ticketController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $movie = movie::orderBy('id','desc')->take(20)->pluck('name','id');
        return view('auth2.ticket.index')->with('movie',$movie);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate(request(),[
            'date'=>'required',
            'start_time'=>'required',
            'end_time'=> 'required',
            'price'=> 'required',
            'ticket_count'=>'required',
            'movie_id'=>'required'
        ]);
        
        $ticket = new ticket;
        $ticket->movie_id = $request->input('movie_id');
        $ticket->date = $request->input('date');
        $ticket->start_time = $request->input('start_time');
        $ticket->end_time = $request->input('end_time');
        $ticket->price = $request->input('price'); 
        $ticket->int = $request->input('ticket_count'); 
        $ticket->save();

        $ticket = ticket::all();
        $movie = movie::all();
       
        return view('auth2.ticket.index')->with('ticket',$ticket)->with('movie',$movie);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
