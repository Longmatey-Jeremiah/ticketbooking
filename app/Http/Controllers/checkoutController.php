<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\category;
use Gloudemans\Shoppingcart\Facades\Cart;
class checkoutController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    public function checkout(){
        $cartitem = Cart::content();
        $Category = category::all();
        return view('cart.checkout')->with('Category',$Category)->with('cartitem',$cartitem);
    }
    public function payment(){
        
    }
}
