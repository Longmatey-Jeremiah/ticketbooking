@extends('layouts.app')
@section('content')

<section class="shop_grid_area section_padding_100">
    <div class="container">
        <div class="row">
            <div class="col-12 col-md-4 col-lg-3">
                <div class="shop_sidebar_area"> 
                   
                    <div class="widget catagory mb-50">
                        <!--  Side Nav  -->
                        <div class="nav-side-menu">
                            <h6 class="mb-0">Catagories</h6>
                            <div class="menu-list">
                                <ul id="menu-content2" class="menu-content collapse out">
                                    <!-- Single Item -->
                                    @foreach($Category as $categories)
                                    <li data-toggle="collapse" data-target="#{{$categories->name}}">
                                        <a href="#">{{$categories->name}}</a>
                                        <ul class="sub-menu collapse show" id="{{$categories->name}}">
                                            @foreach($categories->movie as $movies)
                                            @foreach($categories->movie as $movies)
                                            @foreach($movies->ticket as $tickets)
                                            @if($tickets->date >= Carbon::now() )
                                            <li><a href="#">{{$movies->name}}</a></li>
                                            @endif
                                            @endforeach
                                            @endforeach
                                           @endforeach
                                        </ul>
                                    </li>
                                    @endforeach
                                </ul>
                            </div>
                        </div>
                    </div>

                   

                    

                   
                    <div class="widget recommended">
                        <h6 class="widget-title mb-30">Recommended</h6>

                        <div class="widget-desc">
                            <!-- Single Recommended Product -->
                            <?php $count = 0;?>
                            @foreach($Category as $categories)
                            @foreach($categories->movie as $movies)
                            @foreach($movies->ticket as $tickets)
                            @if($tickets->date >= Carbon::now() )
                            @if($count <= 2)
                            <div class="single-recommended-product d-flex mb-30">
                                <div class="single-recommended-thumb mr-3">
                                    <img src="img/{{$movies->image}}" alt="">
                                </div>
                                <div class="single-recommended-desc">
                                    <h6>{{$movies->name}}</h6>
                                    <p>{{$tickets->price}}</p>
                                    @if($tickets->int > 0)
										<button type="submit" name="addtocart" value="5" class="btn btn-success"><a id="add" ticketname="{{$movies->name}}" href="{{route('cart.edit',$tickets->id)}}">Add to cart</a></button>
									@else
										<button type="submit" name="addtocart" value="5" class="btn btn-warning"><a onclick="swal('oops','all booked out','warning')">Booked Out</a></button>
									@endif
                                </div>
                            </div>
                            <?php $count++; ?>
                            @endif
                            @endif
                            @endforeach
                            @endforeach
                            @endforeach
                            <!-- Single Recommended Product -->
                           
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-12 col-md-8 col-lg-9">
                <div class="shop_grid_product_area">
                    <div class="row">
                        <?php $count = 0;?>
                        @foreach($Category as $categories)
                        @foreach($categories->movie as $movies)
                        @foreach($movies->ticket as $tickets)
                        @if($tickets->date >= Carbon::now() )
                        @if(Carbon::parse($tickets->date)->format('Y-m-d') == Carbon::parse(today())->format('Y-m-d'))
                    <div class="modal fade" id="quickview{{$movies->id}}" tabindex="-1" role="dialog" aria-labelledby="quickview" aria-hidden="true">
                                <div class="modal-dialog modal-lg modal-dialog-centered" role="document">
                                    <div class="modal-content">
                                        <button type="button" class="close btn" data-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                    
                                        <div class="modal-body">
                                            <div class="quickview_body">
                                                <div class="container">
                                                    <div class="row">
                                                        <div class="col-12 col-lg-5">
                                                            <div class="quickview_pro_img">
                                                                <img src="img/{{$movies->image}}" alt="">
                                                            </div>
                                                        </div>
                                                        <div class="col-12 col-lg-7">
                                                            <div class="quickview_pro_des">
                                                            <h4 class="title">{{$movies->name}}</h4>
                                                                <div class="top_seller_product_rating mb-15">
                                                                    <i class="fa fa-star" aria-hidden="true"></i>
                                                                    <i class="fa fa-star" aria-hidden="true"></i>
                                                                    <i class="fa fa-star" aria-hidden="true"></i>
                                                                    <i class="fa fa-star" aria-hidden="true"></i>
                                                                    <i class="fa fa-star" aria-hidden="true"></i>
                                                                </div>
                                                            <h5 class="price">GH &#8373 {{$tickets->price}}</h5>
                                                            <p>{{$categories->name}} : {{$movies->description}}</p>
                                                            <p>Showing On :{{Carbon::parse($tickets->date)->format('l jS \of F Y') }}</p>
                                                            <p>Time :{{Carbon::parse($tickets->start_time)->format('h:i A')}} - {{Carbon::parse($tickets->end_time)->format('h:i A')}}</p>
                                                            <p>Tickets left : {{$tickets->int}}</p>
                                                            </div>
                                                            <!-- Add to Cart Form -->
                                                            @if($tickets->int > 0)
                                                                <button type="submit" name="addtocart" value="5" class="cart-submit"><a id="add" ticketname="{{$movies->name}}" href="{{route('cart.edit',$tickets->id)}}">Add to cart</a></button>
                                                            @else
                                                            <button type="submit" name="addtocart" value="5" class="cart-submit"><a onclick="swal('oops','all booked out','warning')">Booked Out</a></button>
                                                            @endif
                                                            
                    
                                                            <div class="share_wf mt-30">
                                                                <p>Share With Friend</p>
                                                                <div class="_icon">
                                                                    <a href="#"><i class="fa fa-facebook" aria-hidden="true"></i></a>
                                                                    <a href="#"><i class="fa fa-twitter" aria-hidden="true"></i></a>
                                                                    <a href="#"><i class="fa fa-pinterest" aria-hidden="true"></i></a>
                                                                    <a href="#"><i class="fa fa-google-plus" aria-hidden="true"></i></a>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        <div class="col-12 col-sm-6 col-md-4 single_gallery_item {{$categories->name}} wow fadeInUpBig" data-wow-delay="0.2s">
                            <!-- Product Image -->
                            <div class="product-img">
                                <img src="img/{{$movies->image}}" alt="">
                                <div class="product-quicview">
                                <a href="#" data-toggle="modal" data-target="#quickview{{$movies->id}}"><i class="ti-plus"></i></a>
                                </div>
                            </div>
                            <!-- Product Description -->
                            <div class="product-description">
                                <h4 class="product-price">{{$movies->price}}</h4>
                                <p id="name">{{$movies->name}}</p>
                                <p>Time :{{Carbon::parse($tickets->start_time)->format('h:i A')}} - {{Carbon::parse($tickets->end_time)->format('h:i A')}}</p>
                                
                                <!-- Add to Cart -->
                                @if($tickets->int > 0)
                                <button type="submit" name="addtocart" value="5" class="btn btn-warning"><a id="add" ticketname="{{$movies->name}}" href="{{route('cart.edit',$tickets->id)}}">add to cart</a></button>
                                @else
                                <button  onclick="swal('Sorry','{{$movies->name}} from {{Carbon::parse($tickets->start_time)->format('h:i A')}} - {{Carbon::parse($tickets->end_time)->format('h:i A')}} has been booked out ','warning')" class="btn btn-warning" name="addtocart" value="5" class="cart-submit"><a>Booked Out</a></button>
                                @endif
                            </div>
                        </div>
                        @else
                        @endif
                        @endif
                        @endforeach
                        @endforeach
                        @endforeach
                    </div>
                </div>

               
            </div>
        </div>
    </div>
</section>
<script type="text/javascript">
			
    $("body").delegate("#add","click",function(event){
        event.preventDefault();
        var name = $(this).attr('ticketname');
        $.ajax({
            url: $(this).attr('href'),
            success: function(response) {
                
                var count =parseInt($('#checkout_items').text());
                
                count = count + 1;
                swal(name,'added to cart','success');
                $('#checkout_items').html(count);


            }
        });
        return false; //for good measure
    });
    
</script>
@endsection
