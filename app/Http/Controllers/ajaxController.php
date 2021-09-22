<?php

namespace App\Http\Controllers;
use App\category;
use App\ticket;
use Gloudemans\Shoppingcart\Facades\Cart;
use Illuminate\Http\Request;
use App\booked_ticket;

class ajaxController extends Controller
{
    public function addCategory(Request $request){
        if($request->ajax()){
        $this->validate($request,[
            'name'=> 'required',
            'description'=>'required',
           
          ]);
        $forminput = $request->all();
      
        $products = new category;
        $products->create($forminput);
       
        return response()->json(['response'=>'Category added']);
    }
    }
    public function addTicket(Request $request){
        if($request->ajax()){
        $this->validate($request,[
            'date'=> 'required',
            'start_time'=>'required',
            'end_time'=>'required',
            'price'=> 'required',
            'ticket_count'=> 'required',
           
          ]);
        $forminput = $request->all();
      
        $tickets = new ticket;
        $tickets->int = $forminput->input('ticket_count');
        $tickets->create($forminput);
       
        return response()->json(['response'=>'Ticket log added']);
    }
    }
    public function cartUpdate(Request $request){
        if($request->ajax()){
         Cart::update($request->rowId,$request->qty);
        return response()->json(['response'=>'Movie ticket Updated']);
        }
    }
    public function cartDestroy(Request $request){
        if($request->ajax()){
            Cart::remove($request->rowId);
           return response()->json(['response'=>'Movie ticket Deleted']);
           }
       
    }
    public function changeStatus(Request $request){

       if($request->ajax()){
           $booked = booked_ticket::find($request->id);
           $booked->status = 1;
           $booked->save();
         
         return response()->json(['response'=>'Status changed to Used']);
           }
    }
}
