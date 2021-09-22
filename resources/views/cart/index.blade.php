@extends('layouts.app')
@section('content')
<div class="cart_area section_padding_100 clearfix">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <div class="cart-table clearfix">
                        <table class="table table-responsive">
                            <thead>
                                <tr>
                                    <th>Movie Ticket</th>
                                    <th>Price</th>
                                    <th>Quantity</th>
                                    <th>Total</th>
                                    <th>Update/Delete</th>
                                </tr>
                            </thead>
                            <tbody>
                                    @foreach($cartitem as $cartitems)
                                <tr>
                                        <?php $movie_id = App\ticket::find($cartitems->id)->movie_id;?>
                                    <td class="cart_product_img d-flex align-items-center" id="ticket{{$cartitems->rowId}}">
                                    <a href="#"><img src="/img/{{App\movie::find($movie_id)->image}}" alt="Product"></a>
                                        <h6>{{$cartitems->name}}</h6>
                                    </td>
                                   
                                    <td class="price"><span>{{$cartitems->price}}</span></td>
                                    <td class="qty">
                                            {!!Form::open()!!}
                                            <div class="quantity">
                                                <span class="qty-minus"></span>
                                                <input type="number" name="qty" class="qty-text" id="qty" step="1" min="1" max="99" name="quantity" value="{{$cartitems->qty}}">
                                                <input type="text" value="{{$cartitems->rowId}}" name="rowId" hidden>
                                                <span class="qty-plus"></i></span>
                                            </div>
                                        </td>


                                <td class="total_price"><span>{{$cartitems->price * $cartitems->qty}}</span></td>
                                <td class="qty">
                                        <div class="quantity">
                                                <span id="update" class="qty-minus"><i class="fa fa-refresh" aria-hidden="true"></i></span>
                                                {!!Form::close()!!}
                                                {{Form::open([ 'method'  => 'delete', 'route' => [ 'cart.destroy', $cartitems->rowId ] ])}}

                                        <span><button type="submit"><i class="fa fa-trash" aria-hidden="true"></i></button></span>
                                                {!!Form::close()!!}
                                                
                                            </div>
                                </td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>

                    <div class="cart-footer d-flex mt-30">
                        <div class="back-to-shop w-50">
                            <a href="/">Continue Booking</a>
                        </div>
                        <div class="update-checkout w-50 text-right">
                            <a href="#">clear cart</a>
                            <a href="#">Update cart</a>
                        </div>
                    </div>

                </div>
            </div>

            <div class="row">
                <div class="col-12 col-md-6 col-lg-4">
                    <div class="coupon-code-area mt-70">
                        
                    </div>
                </div>
                <div class="col-12 col-md-6 col-lg-4">
                   
                </div>
                <div class="col-12 col-lg-4">
                    <div class="cart-total-area mt-70">
                        <div class="cart-page-heading">
                            <h5>Cart total</h5>
                            <p>Final info</p>
                        </div>

                        <ul class="cart-total-chart">
                                <li><span>Tax</span> <span>GH &#8373 {{Cart::tax()}}</span></li>
                            <li><span>Subtotal</span> <span>GH &#8373 {{Cart::Subtotal()}}</span></li>
                        <li><span>Number of tickets</span> <span>{{Cart::count()}}</span></li>
                        <li><span><strong>Grand Total</strong></span> <span><strong>GH &#8373 {{Cart::total()}}</strong></span></li>
                        </ul>
                        <a href="/checkout" class="btn karl-checkout-btn">Proceed to checkout</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script>
        
        $(document).ready(function(){
            $.ajaxSetup({
    headers: {
        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
    }
});

            $('body').delegate('#update','click', function(e) {
        e.preventDefault(); 
        var data = $('form').serialize();
        $.ajax({
        type: "POST",
        url: '/cartUpdate',
        data: data,
        beforeSend: function(){
            swal('Loading...');
        },
        success: function(data) {
            //swal("Good job!", data.response, "success");
          swal('Great',data.response,'success');
        },
        error: function(errors,status,xhr){
            var err = errors.responseJSON.errors;
           $.each(err,function(key,value){
            sweetAlert("Oops...", value+"!!", "error");
           }) ;
          
        }
    });
    });
   
           
        });
   

      </script>
  
      
    @endsection
    