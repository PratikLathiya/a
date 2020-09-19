@extends('layouts.front')

@section('content')

	@if($ps->slider == 1)

		@if(count($sliders))
			@include('includes.slider-style')
		@endif
	@endif

	@if($ps->slider == 1)
		<!-- Hero Area Start -->
		<section class="hero-area">
			@if($ps->slider == 1)

				@if(count($sliders))
					<div class="hero-area-slider">
						<div class="slide-progress"></div>
						<div class="intro-carousel">
							@foreach($sliders as $data)
								<div class="intro-content {{$data->position}}" style="background-image: url({{asset('assets/images/sliders/'.$data->photo)}})">
									<div class="container">
										<div class="row">
											<div class="col-lg-12">
												<div class="slider-content">
													<!-- layer 1 -->
													<div class="layer-1">
														<h4 style="font-size: {{$data->subtitle_size}}px; color: {{$data->subtitle_color}}" class="subtitle subtitle{{$data->id}}" data-animation="animated {{$data->subtitle_anime}}">{{$data->subtitle_text}}</h4>
														<h2 style="font-size: {{$data->title_size}}px; color: {{$data->title_color}}" class="title title{{$data->id}}" data-animation="animated {{$data->title_anime}}">{{$data->title_text}}</h2>
													</div>
													<!-- layer 2 -->
													<div class="layer-2">
														<p style="font-size: {{$data->details_size}}px; color: {{$data->details_color}}"  class="text text{{$data->id}}" data-animation="animated {{$data->details_anime}}">{{$data->details_text}}</p>
													</div>
													<!-- layer 3 -->
													{{-- <div class="layer-3">
														<a href="{{$data->link}}" target="_blank" class="mybtn1"><span>{{ $langg->lang25 }} <i class="fas fa-chevron-right"></i></span></a>
													</div> --}}
												</div>
											</div>
										</div>
									</div>
								</div>
							@endforeach
						</div>
					</div>
				@endif

			@endif

		</section>
		<!-- Hero Area End -->
	@endif
<section>
	<div>
		<img src="{{asset('assets/images/services/15998297072.jpg')}}" alt="" id="servi">
		<div class="row" style="margin-top:-168px ;opacity:1;font-family: Josefin Sans" id="servitext" >
			<div class="handmade1" style="width: 18rem;text-align: center ; margin-left:302px">
				<div class="handmade" style="opacity: 1">
				  <b class="card-title">HAND MADE</b>
				  <hr class="servihr">
				  <p class="card-text extra_content" id="extra_content" style="color:rgb(243, 236, 236)">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
				  <center><button id="read_more" class="read_more btn btn-outline-light" data-toggle="modal" data-target="#myModal">Details</button></center>
				  <div class="modal fade" id="myModal" role="dialog">
					<div class="modal-dialog">
					
					  <!-- Modal content-->
					  <div class="modal-content">
						<div class="modal-header">
						  <button type="button" class="close" data-dismiss="modal">&times;</button>
						</div>
						<div class="modal-body">
						  <p>Some quick example text to build on the card title and make up the bulk of the card's content.</p>
						</div>
					  </div>
					  
					</div>
				  </div>
				</div>
				
			</div>
			<div  style="width: 18rem;text-align: center;" id="servitext1">
				<div class="nature" style="opacity: 1">
				  <b class="card-title">100 % NATURE</b>
				  <hr class="servihr">
				  <p class="card-text extra_content" id="extra_content" style="color: rgb(243, 236, 236)">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
				  <center><button id="read_more" class="read_more btn btn-outline-light" data-toggle="modal" data-target="#myModal">Details</button></center>
				  <div class="modal fade" id="myModal" role="dialog">
					<div class="modal-dialog">
					
					  <!-- Modal content-->
					  <div class="modal-content">
						<div class="modal-header">
						  <button type="button" class="close" data-dismiss="modal">&times;</button>
						</div>
						<div class="modal-body">
						  <p>Some quick example text to build on the card title and make up the bulk of the card's content.</p>
						</div>
					  </div>
					  
					</div>
				  </div>
				</div>
			</div>
			<div  style="width: 18rem;text-align: center;" id="servitext2">
				<div class="cruelty" style="opacity: 1">
				  <b class="card-title">CRUELTY FREE</b>
				  <hr class="servihr">
				  <p class="card-text extra_content" id="extra_content" style="color: rgb(243, 236, 236)">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
				  <center><button id="read_more" class="read_more btn btn-outline-light" data-toggle="modal" data-target="#myModal">Details</button></center>
				  <div class="modal fade" id="myModal" role="dialog">
					<div class="modal-dialog">
					
					  <!-- Modal content-->
					  <div class="modal-content">
						<div class="modal-header">
						  <button type="button" class="close" data-dismiss="modal">&times;</button>
						</div>
						<div class="modal-body">
						  <p>Some quick example text to build on the card title and make up the bulk of the card's content.</p>
						</div>
					  </div>
					  
					</div>
				  </div>
				</div>
			</div>
		</div>
	</div>
</section>


	@if($ps->featured == 1)
		<!-- Trending Item Area Start -->
		<section  class="trending">
			<div class="container" style="font-family: Josefin Sans">
				<div class="row">
					<div class="col-lg-12 remove-padding">
						<div class="section-top">
							<h2 class="section-title" style="text-align: center">
								FEATURED PRODUCTS
							</h2>
							{{-- <a href="#" class="link">View All</a> --}}
						</div>
					</div>
				</div>
				<div class="row">
					<div class="col-lg-12 remove-padding">
						<div class="trending-item-slider">
							@foreach($feature_products as $prod)
								@include('includes.product.slider-product')
							@endforeach
						</div>
					</div>

				</div>
			</div>
		</section>
		<!-- Tranding Item Area End -->
		<hr style="width: 85%">
	@endif

	@if($ps->small_banner == 1)

		<!-- Banner Area One Start -->
		<section class="banner-section">
			<div class="container" >
				@foreach($top_small_banners->chunk(2) as $chunk)
					<div class="row">
						@foreach($chunk as $img)
							<div class="col-lg-6 remove-padding">
								<div class="left">
									<a class="banner-effect" href="{{ $img->link }}" target="_blank">
										<img src="{{asset('assets/images/banners/'.$img->photo)}}" alt=""> 
										
									</a>
								</div>
							</div>
						@endforeach
					</div>
				@endforeach
			</div>
		</section>
		<!-- Banner Area One Start -->
		
	@endif



	<section id="extraData">
		<div class="text-center">
			<img src="{{asset('assets/images/'.$gs->loader)}}">
		</div>
	</section>


@endsection

@section('scripts')
	<script>
        $(window).on('load',function() {

            setTimeout(function(){

                $('#extraData').load('{{route('front.extraIndex')}}');

            }, 500);
        });

	</script>
@endsection