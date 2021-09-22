@extends('layouts.app')
@section('content')
@auth
<div class="checkout_area section_padding_100">
        <div class="container">
            <div class="row">

                <div class="col-12 col-md-6">
                    <div class="checkout_details_area mt-50 clearfix">

                        <div class="cart-page-heading">
                            <h5>Billing Address</h5>
                            
                        </div>
                        <div>
                                @if($errors)
                                <ul>
                                    @foreach ($errors->all() as $error )
                                <li>{{$error}}</li> 
                                    @endforeach
                                </ul>
                                @endif
                            </div>
                        {{ Form::open( array('route' => array('client_info.update', Auth::user()->id), 'method' => 'PUT')) }}
                        {{csrf_field()}}   
                        <div class="row">
                                <div class="col-md-6 mb-3">
                                    <label for="name">Name <span>*</span></label>
                                    <input type="text" name="name" class="form-control" id="name" value="{{Auth::user()->name}}" required>
                                </div>
                                <div class="col-12 mb-3">
                                    <label for="street_address">Address <span>*</span></label>
                                <input type="text" name="address" class="form-control mb-3" id="street_address" value="{{Auth::user()->address}}">
                                </div>
                                <div class="col-12 mb-3">
                                    <label for="city">Town/City <span>*</span></label>
                                    <input type="text" name="city"  class="form-control" id="city" value="{{Auth::user()->city}}">
                                </div>
                                <div class="col-12 mb-3">
                                    <label for="phone_number">Phone No <span>*</span></label>
                                    <input type="number" name="phone" class="form-control" id="phone_number" min="0" value="{{Auth::user()->phone}}">
                                </div>
                                <div class="col-12 mb-4">
                                    <label for="email_address">Email Address <span>*</span></label>
                                    <input type="email" name="email" class="form-control" id="email_address" value="{{Auth::user()->email}}">
                                </div>

                               
                            </div>
                            
                    </div>
                </div>
                <div class="col-12 col-md-6 col-lg-5 ml-lg-auto">
                        <div class="order-details-confirmation">
    
                            <div class="cart-page-heading">
                                <h5>Your Order</h5>
                                <p>The Details</p>
                            </div>
    
                            <ul class="order-details-form mb-4">
                                   
                                <li><span>Movie</span> <span>Total</span></li>
                                @foreach($cartitem as $cartitems)
                                <li><span> {{$cartitems->name}}</span> <span>GH &#8373 {{$cartitems->price}}</span></li>
                                @endforeach
                                <li><span>Subtotal</span> <span>GH &#8373 {{Cart::Subtotal()}}</span></li>
                                <li><span>Tax</span> <span>GH &#8373 {{Cart::tax()}}</span></li>
                                <li><span>Total</span> <span>GH &#8373 {{Cart::total()}}</span></li>
                            </ul>
    
                           
                            <div id="accordion" role="tablist" class="mb-4">
                                <div class="card">
                                    <div class="card-header" role="tab" id="headingOne">
                                        <h6 class="mb-0">
                                            <a data-toggle="collapse" href="#collapseOne" aria-expanded="false" aria-controls="collapseOne"><i class="fa fa-circle-o mr-3"></i>Visa Card</a>
                                        </h6>
                                    </div>
    
                                    <div id="collapseOne" class="collapse" role="tabpanel" aria-labelledby="headingOne" data-parent="#accordion">
                                        <div class="card-body">
                                            <p>Please pay with any visa card of your choice. Simply click place order to proceed</p>
                                        </div>
                                    </div>
                                </div>
                                
                            </div>
                            
                            <button type="submit" class="btn karl-checkout-btn">Place Order</button>
                        </div>
                    </div>
    
                </div>
            </div>
        </div>
               
        {!! Form::close() !!} 
@endauth
                
   
      @endsection