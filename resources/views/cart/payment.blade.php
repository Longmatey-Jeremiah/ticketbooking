@extends('layouts.app')
@section('content')
<div class="checkout_area section_padding_100">
        <div class="container">
            <div class="row">

                <div class="col-12 col-md-6">
                    <div class="checkout_details_area mt-50 clearfix">

                        <div class="cart-page-heading">
                            <h5>Billing Address</h5>
                            
                        </div>
                       
                        <form> 
                        <div class="row">
                                <div class="col-md-6 mb-3">
                                    <label for="name">Name <span>*</span></label>
                                    <input type="text" name="name" class="form-control" id="name" value="{{Auth::user()->name}}" required disabled>
                                </div>
                                <div class="col-12 mb-3">
                                    <label for="street_address">Address <span>*</span></label>
                                <input type="text" name="address" class="form-control mb-3" id="street_address" disabled value="{{Auth::user()->address}}">
                                </div>
                                <div class="col-12 mb-3">
                                    <label for="city">Town/City <span>*</span></label>
                                    <input type="text" name="city"  class="form-control" id="city" disabled value="{{Auth::user()->city}}">
                                </div>
                                <div class="col-12 mb-3">
                                    <label for="phone_number">Phone No <span>*</span></label>
                                    <input type="number" name="phone" class="form-control" id="phone_number" disabled min="0" value="{{Auth::user()->phone}}">
                                </div>
                                <div class="col-12 mb-4">
                                    <label for="email_address">Email Address <span>*</span></label>
                                    <input type="email" name="email" class="form-control" id="email_address" disabled value="{{Auth::user()->email}}">
                                </div>

                                
                            </div>
                        </form>
                            
                    </div>
                </div>
                <div class="col-12 col-md-6 col-lg-5 ml-lg-auto">
                        <div class="order-details-confirmation">
    
                            <div class="cart-page-heading">
                                <h5>Your Order</h5>
                                <p>The Details</p>
                            </div>
                            
                            <?php $pay = Cart::total() * 100;?>
                            <div class="order-details-form mb-4">
                                    {!! Form::open(['action'=>'paymentController@store','method'=>'POST','class'=>"form-horizontal",'files'=>true]) !!}
                                            <script
                                              src="https://checkout.stripe.com/checkout.js" class="stripe-button"
                                              data-key="pk_test_cnm3b38ziPZhWSjQKzjbvrmd"
                                              data-amount="{{$pay / 4}}"
                                              data-name="MovieFix"
                                              data-description="Book Ticket"
                                              data-image="https://stripe.com/img/documentation/checkout/marketplace.png"
                                              data-locale="auto">
                                            </script>
                                          </form>
                              
                            </div>
    
                           
                           
                            
                            
                        </div>
                    </div>
    
                </div>
            </div>
        </div>



@endsection
