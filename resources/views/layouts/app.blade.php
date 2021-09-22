<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="description" content="">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <!-- The above 4 meta tags *must* come first in the head; any other head content must come *after* these tags -->

    <!-- Title  -->
    <title>MovieFix - {{Route::currentRouteName()}}</title>

    <!-- Favicon  -->
    <link rel="icon" href="img/core-img/favicon.ico">

    <!-- Core Style CSS -->
    <link rel="stylesheet" href="/css/core-style.css">
    <link rel="stylesheet" href="{{asset('/style.css')}}">
    <link rel="stylesheet" href="/font-awesome.min.css">

    <!-- Responsive CSS -->
    <link href="/css/responsive.css" rel="stylesheet">
    <script src="/js/jquery/jquery-2.2.4.min.js"></script>
     
    <style>
        @import url('https://fonts.googleapis.com/css2?family=Montserrat:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&family=Nunito:ital,wght@0,200;0,400;0,600;0,700;0,800;0,900;1,200;1,300;1,400;1,600;1,700;1,800;1,900&family=Raleway:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap');

        body,p,a,div,*{font-family: 'Nunito',sans-serif !important;}
        .nav-item >a{
            font-size:11px !important;
            font-family: 'Nunito',sans-serif !important;
        }
    </style>

</head>

<body>
    {{-- <div class="catagories-side-menu">
        <!-- Close Icon -->
        <div id="sideMenuClose">
            <i class="ti-close"></i>
        </div>
        <!--  Side Nav  -->
        <div class="nav-side-menu">
          
        </div>
    </div> --}}

    <div id="wrapper">

        <!-- ****** Header Area Start ****** -->
      
        <!-- ****** Header Area End ****** -->

        <!-- ****** Top Discount Area Start ****** -->
        <section class="top-discount-area d-md-flex align-items-center justify-content-center" style="padding:10px;">
            <!-- Single Discount Area -->
            <div style="margin-right:0px;width:250px;">
                <h4 style="font-family: 'Raleway',sans-serif !important;">MovieFix.com</h4>
                
            </div>
            <!-- Single Discount Area -->
            <div>
                <div class="main-menu-area">
                    <nav class="navbar navbar-expand-lg align-items-start">

                        {{-- <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#karl-navbar" aria-controls="karl-navbar" aria-expanded="false" aria-label="Toggle navigation"><span class="navbar-toggler-icon"><i class="ti-menu"></i></span></button> --}}

                        <div class="collapse navbar-collapse align-items-start collapse" id="karl-navbar">
                            <ul class="navbar-nav animated" id="nav">
                                <li class="nav-item active"><a class="nav-link" href="/">Home</a></li>
                                {{-- <li class="nav-item"><a class="nav-link" href="/all">Categories</a></li> --}}
                                <li class="nav-item"><a class="nav-link" href="/today">Showing Today</a></li>
                                {{-- <li class="nav-item"><a class="nav-link" href="/contact">Contact</a></li> --}}
                                {{-- <li class="nav-item"><a class="nav-link" href="/about">About</a></li> --}}
                            </ul>
                        </div>
                    </nav>
                </div>
            </div>
            <!-- Single Discount Area -->
            <div >
					<div class="main-menu-area">
							<nav class="navbar navbar-expand-lg align-items-start">

								<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#karl-navbar" aria-controls="karl-navbar" aria-expanded="false" aria-label="Toggle navigation"><span class="navbar-toggler-icon"><i class="ti-menu"></i></span></button>

								<div class="collapse navbar-collapse align-items-start collapse " id="karl-navbar">
									<ul class="navbar-nav animated" id="nav">
                                            @if (Route::has('login'))
                                            @auth
										<li class="nav-item dropdown">
                                        <a class="nav-link dropdown-toggle" href="#" id="karlDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">{{Auth::user()->name}}</a>
											<div class="dropdown-menu" aria-labelledby="karlDropdown">
												<a class="dropdown-item" style="color:black" href="/userActivity">My Activities</a>
												<a class="dropdown-item" style="color:black" href="/logout">Logout</a>
											</div>
                                        </li>
                                        @else
                                        <li class="nav-item"><a class="nav-link" href="{{route('login')}}">LOGIN</a></li>
                                        <li class="nav-item"><a class="nav-link" href="{{route('register')}}">REGISTER</a></li>
                                        @endauth
                                        @endif
										
                                        <li class="nav-item">
                                        <div class="header-cart-menu d-flex align-items-center ml-auto">
                                            <!-- Cart Area -->
                                            <div class="cart">
                                                <a href="#" id="header-cart-btn" target="_blank"><span id="checkout_items" class="cart_quantity">{{Cart::count()}}</span> <i class="ti-bag"></i></a>
                                                <!-- Cart List Area Start -->
                                                <ul class="cart-list">
                                                    
                                                    <li class="total">
                                                        
                                                        <a href="/cart" class="btn btn-sm btn-cart">Cart</a>
                                                        <a href="/checkout" class="btn btn-sm btn-checkout">Checkout</a>
                                                    </li>
                                                </ul>
                                            </div>
                                            {{-- <div class="header-right-side-menu ml-15">
                                                <a href="#" id="sideMenuBtn"><i class="ti-menu" aria-hidden="true"></i></a> --}}
                                            </div>
                                        </div>
                                    </li>
										
									</ul>
								</div>
							</nav>
						</div>
            </div>
        </section>
        <!-- ****** Top Discount Area End ****** -->
        @if(Route::currentRouteName()=='' || Route::currentRouteName()=='home' )
        <!-- ****** Welcome Slides Area Start ****** -->
        <section class="welcome_area">
            <div class="welcome_slides owl-carousel">
                <!-- Single Slide Start -->
                <div class="single_slide height-800 bg-img background-overlay" style="background-image: url(/images/example3.jpg);">
                    <div class="container h-100">
                        <div class="row h-100 align-items-center">
                            <div class="col-12">
                                <div class="welcome_slide_text" style="margin-left: 20px;">
                                    <h6 data-animation="bounceInDown" data-delay="0" data-duration="300ms">* All New Today</h6>
                                    <h2 data-animation="fadeInUp" data-delay="300ms" data-duration="300ms">Action Movies</h2>
                                    <a href="#" class="btn karl-btn" data-animation="fadeInUp" data-delay="1s" data-duration="300ms">Book Now</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Single Slide Start -->
                <div class="single_slide height-800 bg-img background-overlay" style="background-image: url(/images/example1.jpeg);">
                    <div class="container h-100">
                        <div class="row h-100 align-items-center">
                            <div class="col-12">
                                <div class="welcome_slide_text" style="margin-left: 20px;">
                                    <h6 data-animation="fadeInDown" data-delay="0" data-duration="300ms">* Come Watch The Best</h6>
                                    <h2 data-animation="fadeInUp" data-delay="300ms" data-duration="300ms">MovieFix</h2>
                                    <a href="#" class="btn karl-btn" data-animation="fadeInLeftBig" data-delay="1s" data-duration="300ms">Check Collection</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Single Slide Start -->
                <div class="single_slide height-800 bg-img background-overlay" style="background-image: url(/images/home.jpg);">
                    <div class="container h-100">
                        <div class="row h-100 align-items-center">
                            <div class="col-12">
                                <div class="welcome_slide_text" style="margin-left: 20px;">
                                    <h6 data-animation="fadeInDown" data-delay="0" data-duration="300ms">* Feel at home with MovieFix</h6>
                                    <h2 data-animation="bounceInDown" data-delay="300ms" data-duration="300ms"></h2>
                                    <a href="#" class="btn karl-btn" data-animation="fadeInRightBig" data-delay="1s" data-duration="300ms">Book Now</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!-- ****** Welcome Slides Area End ****** -->
        

        <!-- ****** Top Catagory Area Start ****** -->
       
        <section class="top_catagory_area d-md-flex clearfix">
            <!-- Single Catagory -->
            <?php $count = 0;?>
            @foreach($Category as $categories)
				@foreach($categories->movie as $movies)
				@foreach($movies->ticket as $tickets)
                @if($tickets->date >= Carbon::now() )
                @if($count <= 2)
            <div class="single_catagory_area d-flex align-items-center bg-img" style="background-image: url(/img/{{$movies->image}});">
                <div class="catagory-content">
                    <h6>Must Watch</h6>
                    <h5>{{$movies->name}}</h5>
                    <h2>GH &#8373 {{$tickets->price}}</h2>
                    <p>Time :{{Carbon::parse($tickets->start_time)->format('h:i A')}} - {{Carbon::parse($tickets->end_time)->format('h:i A')}}</p>
                    <a id="add" ticketname="{{$movies->name}}" href="{{route('cart.edit',$tickets->id)}}" class="btn karl-btn">BOOK NOW</a>
                </div>
            </div>
            @endif
            <?php $count++;?>
           @endif
           @endforeach
           @endforeach
           @endforeach

           
            <!-- Single Catagory -->
            
        </section>
        <!-- ****** Top Catagory Area End ****** -->
        @endif
        <!-- ****** Quick View Modal Area Start ****** -->
       
        <!-- ****** Quick View Modal Area End ****** -->

        <!-- ****** New Arrivals Area Start ****** -->
      @yield('content')
        <!-- ****** New Arrivals Area End ****** -->

        <!-- ****** Offer Area Start ****** -->
        <section class="offer_area height-700 section_padding_100 bg-img" style="background-image: url(/images/example4.jpg);">
            <div class="container h-100">
                <div class="row h-100 align-items-end justify-content-end">
                    <div class="col-12 col-md-8 col-lg-6">
                        <div class="offer-content-area wow fadeInUp" data-wow-delay="1s">
                            <h2>MovieFix <span class="karl-level">Hot</span></h2>
                            <p>Get your movie at your best time</p>
                            <div class="offer-product-price">
                              
                            </div>
                            <a href="#" class="btn karl-btn mt-30">Book Now</a>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!-- ****** Offer Area End ****** -->

     

        <!-- ****** Footer Area Start ****** -->
        <footer class="footer_area">
            <div class="container">
                <div class="row">
                    <!-- Single Footer Area Start -->
                    <div class="col-12 col-md-6 col-lg-3">
                        <div class="single_footer_area">
                            <div class="footer-logo">
                               <h1>MovieFix</h1>
                            </div>
                            <div class="copywrite_text d-flex align-items-center">
                                <p><!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->
Get your movies at your own time
<!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. --></p>
                            </div>
                        </div>
                    </div>
                    <!-- Single Footer Area Start -->
                    <div class="col-6 col-sm-6 col-md-3 col-lg-2">
                        <div class="single_footer_area">
                            <ul class="footer_widget_menu">
                                <li><a href="/about">About</a></li>
                                
                                <li><a href="/fag">Faq</a></li>
                                <li><a href="/contact">Contact</a></li>
                            </ul>
                        </div>
                    </div>
                    <!-- Single Footer Area Start -->
                    <div class="col-6 col-sm-6 col-md-3 col-lg-2">
                        <div class="single_footer_area">
                            <ul class="footer_widget_menu">
                                <li><a href="/userActivity">My Account</a></li>
                                
                                <li><a href="/policy">Our Policies</a></li>
                                
                            </ul>
                        </div>
                    </div>
                    <!-- Single Footer Area Start -->
                    <div class="col-12 col-lg-5">
                        <div class="single_footer_area">
                            <div class="footer_heading mb-30">
                                <h6>Subscribe to our newsletter</h6>
                            </div>
                            <div class="subscribtion_form">
                                <form action="#" method="post">
                                    <input type="email" name="mail" class="mail" placeholder="Your email here">
                                    <button type="submit" class="submit">Subscribe</button>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="line"></div>

                <!-- Footer Bottom Area Start -->
                <div class="footer_bottom_area">
                    <div class="row">
                        <div class="col-12">
                            <div class="footer_social_area text-center">
                                <a href="#" ><i class="fa fa-pinterest" aria-hidden="true"></i></a>
                                <a href="#"><i class="fa fa-facebook" aria-hidden="true"></i></a>
                                <a href="#"><i class="fa fa-twitter" aria-hidden="true"></i></a>
                                <a href="#"><i class="fa fa-linkedin" aria-hidden="true"></i></a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </footer>
        <!-- ****** Footer Area End ****** -->
    </div>
    <!-- /.wrapper end -->

    <!-- jQuery (Necessary for All JavaScript Plugins) -->
   
    <!-- Popper js -->
    <script src="/js/popper.min.js"></script>
    <!-- Bootstrap js -->
    <script src="/js/bootstrap.min.js"></script>
    <!-- Plugins js -->
    <script src="/js/plugins.js"></script>
    <!-- Active js -->
	<script src="/js/active.js"></script>
	<script src="/vendor/sweetalert/sweetalert.min.js"></script>

</body>

</html>

