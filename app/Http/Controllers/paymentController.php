<?php

namespace App\Http\Controllers;
use App\ticket;
use App\booked_ticket;
use Illuminate\Http\Request;
use Gloudemans\Shoppingcart\Facades\Cart;
class paymentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
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
      // echo csrf_token();
      $cartitem = Cart::content();
      foreach($cartitem as $cartitems){
        $ticket = ticket::find($cartitems->id);
        $ticket->int = $ticket->int - $cartitems->qty;
        $ticket->save();
        $booked = new booked_ticket;
        $booked->user_id = auth()->user()->id;
        $booked->ticket_id = $cartitems->id;
        $booked->qty    = $cartitems->qty;
        $booked->total  = $cartitems->price * $cartitems->qty;
        $booked->token  = substr(str_shuffle('abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ0123456789') , 0 , 30 );
        $booked->save();


      }
      Cart::destroy();
      $booked = booked_ticket::where('user_id',auth()->user()->id)->orderBy('id', 'desc')->get();
      return view('user.activity')->with('booked',$booked);

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
