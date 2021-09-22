@extends('layouts.app')
@section('content')

<section class="new_arrivals_area section_padding_100_0 clearfix">
		<div class="container">
			<div class="row">
				<div class="col-12">
					<div class="section_heading text-center">
						<h2 style="font-family: 'Raleway',sans-serif !important;">New Arrivals</h2>
					</div>
				</div>
			</div>
		</div>

		<div class="karl-projects-menu mb-100">
			<div class="text-center portfolio-menu">
				<button class="btn active" data-filter="*"  style="font-family: 'Raleway',sans-serif !important;">ALL</button>
				@foreach ($Category as $category ) 
				<button class="btn" data-filter=".{{$category->name}}" style="font-family: 'Raleway',sans-serif !important;">{{$category->name}}</button>
				@endforeach
				
			</div>
		</div>

		<div class="container">
			<div class="row karl-new-arrivals mb-100">
				<!-- Single gallery Item Start -->
			@foreach($Category as $category)
			   	@foreach($category->movie as $movies)
				  	@foreach($movies->ticket as $tickets)
						@if($tickets->date >= Carbon::now())
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
															<h5 class="price" style="font-family: 'Raleway',sans-serif !important;">GH &#8373 {{$tickets->price}}</h5>
															<p style="font-family: 'Raleway',sans-serif !important;">{{$category->name}} : {{$movies->description}}</p>
															<p style="font-family: 'Raleway',sans-serif !important;">Showing On :{{Carbon::parse($tickets->date)->format('l jS \of F Y') }}</p>
															<p style="font-family: 'Raleway',sans-serif !important;">Time :{{Carbon::parse($tickets->start_time)->format('h:i A')}} - {{Carbon::parse($tickets->end_time)->format('h:i A')}}</p>
															<p style="font-family: 'Raleway',sans-serif !important;">Tickets left : {{$tickets->int}}</p>
															</div>
															<!-- Add to Cart Form -->
															@if($tickets->int > 0)
																<button type="submit" name="addtocart" value="5" class="cart-submit"><a id="add" ticketname="{{$movies->name}}" href="{{route('cart.edit',$tickets->id)}}" style="font-family: 'Raleway',sans-serif !important;">Add to cart</a></button>
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
							<div class="col-12 col-sm-6 col-md-4 single_gallery_item {{$category->name}} wow fadeInUpBig" data-wow-delay="0.2s">
								<!-- Product Image -->
								<div class="product-img">
									<img src="img/{{$movies->image}}" alt="">
									<div class="product-quickview">
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
									<button type="submit" name="addtocart" value="5" class="btn btn-warning"><a id="add" ticketname="{{$movies->name}}" href="{{route('cart.edit',$tickets->id)}}">Add to cart</a></button>
									@else
									<button  onclick="swal('Sorry','{{$movies->name}} from {{Carbon::parse($tickets->start_time)->format('h:i A')}} - {{Carbon::parse($tickets->end_time)->format('h:i A')}} has been booked out ','warning')" class="btn btn-warning" name="addtocart" value="5" class="cart-submit"><a>Booked Out</a></button>
									@endif
								</div>
							</div>
						@endif
				   	@endforeach
			   	@endforeach
			@endforeach
				<!-- Single gallery Item End -->
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