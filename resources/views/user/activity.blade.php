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
                                    <th>Date</th>
                                    <th>Time</th>
                                    <th>Price</th>
                                    <th>Quantity</th>
                                    <th>Total</th>
                                    <th>QrCode</th>
                                    <th>Status</th>
                                </tr>
                            </thead>
                            <tbody>
                                    @foreach($booked as $Booked)
                                <tr>
                                       <?php 
                                       //get the ticket 
                                       
                                       $ticket = App\ticket::find($Booked->ticket_id);
                                       //get the movie id
                                        $movie = App\movie::find($ticket->movie_id);
                                       ?>
                                        <?php
                                        //transform token to qrcode
                                        $png = QrCode::format('png')->size(240)->generate($Booked->token);
                                        $png = base64_encode($png);
                                       
                                        ?>
                                    <td class="cart_product_img d-flex align-items-center" id="ticket">
                                    <a href="#"><img src="/img/{{$movie->image}}" alt="Product"></a>
                                        <h6></h6>
                                    </td>
                                    <td>{{Carbon::parse($ticket->date)->format('l jS \of F Y') }}</td>
                                    <td class="price"><span>{{Carbon::parse($ticket->start_time)->format('h:i A')}} - {{Carbon::parse($ticket->end_time)->format('h:i A')}}</span></td>
                                    <td class="price"><span>{{$ticket->price}}</span></td>
                                    <td class="qty">
                                           
                                            <div class="quantity">
                                                <span class="qty-minus"></span>
                                                <input class="qty-text" id="qty" step="1" min="1" max="99" name="quantity" value="{{$Booked->qty}}" hidden>
                                                <span>{{$Booked->qty}}</span>
                                                <span class="qty-plus"></i></span>
                                            </div>
                                        </td>


                                <td class="total_price"><span>{{$Booked->total}}</span></td>
                                    <td class="total_price"><a href="/qrcode/{{$Booked->id}}"><span><?php  echo "<img src='data:image/png;base64," . $png . "'>";?></span></a></td>
                                    @if(!$Booked->status)
                                    <td><button booked="{{$Booked->id}}" id="status" class="btn btn-primary">Unused</button></td>
                                    @else
                                    <td><button  class="btn btn-warning">Used</button></td>
                                    @endif
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>

                    <div class="cart-footer d-flex mt-30">
                        <div class="back-to-shop w-50">
                            <a href="/">Continue Booking</a>
                        </div>
                       
                    </div>

                </div>
            </div>

            
        </div>
    </div>
   
      
    @endsection
    