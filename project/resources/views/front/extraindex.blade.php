@if($ps->service == 1)

{{-- Info Area Start --}}
<section class="info-area">
		<div class="container">

				@foreach($services->chunk(4) as $chunk)

					<div class="row">

						<div class="col-lg-12 p-0">
							<div class="info-big-box">
								<div class="row">
									@foreach($chunk as $service)
										<div class="col-6 col-xl-3 p-0">
											<div class="info-box">
												<div class="icon">
													<img src="{{ asset('assets/images/services/'.$service->photo) }}">
												</div>
												<div class="info">
													<div class="details">
														<h4 class="title">{{ $service->title }}</h4>
														<p class="text">
															{!! $service->details !!}
														</p>
													</div>
												</div>
											</div>
										</div>
									@endforeach
								</div>
							</div>
						</div>

					</div>

				@endforeach

		</div>
	</section>
	{{-- Info Area End  --}}

	@endif		
	



	@if($ps->partners == 1)
		<!-- Partners Area Start -->
		<section class="partners">
			<div class="container">
				<div class="row">
					<div class="col-lg-12">
						<div class="partner-slider">
							@foreach($partners as $data)
								<div class="item-slide">
									<a href="{{ $data->link }}" target="_blank">
										<img src="{{asset('assets/images/partner/'.$data->photo)}}" alt="">
									</a>
								</div>
							@endforeach
						</div>
					</div>
				</div>
			</div>
		</section>
		<!-- Partners Area Start -->
	@endif


	@if($ps->large_banner == 1)
	<!-- Banner Area One Start -->
	<section>
		<div class="container-fluid"  >
				<div class="row"  id="slid" style="height:400px;background-image: url('assets/images/banners/1599829597lady with flower.jpg');">
						<div class="col-lg-6"></div>
						<div class="col-lg-6" style="font-family: Josefin Sans">
							<div style="margin:50px;">
							<h3 style="color: white">NEW BEAUTIFUL</h3>
							<h3 style="color: white">SKIN CARE PRODUCTS BY</h3>
							<h3 style="color: white">ALL EARTHY</h3>
							<br>
							<p style="color: white">Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam.</p>
							<br>
							<button type="button" class="btn btn-outline-light" style="border: 1px solid #fdfcfc;">Discover More</button>
						</div>
						</div>
				</div>
		</div>
	</section>
	<!-- Banner Area One Start -->
@endif

<section>
	<div id="card" style="padding: 80px">
		<div class="row">
			<div class="col-lg-6" style="height:400px;text-align: center;background-image: url('assets/images/1599886325newsletter.jpg');">
				<h2 style="color: white;font-family:Josefin Sans">ALL EARTHY HAIR <br>CARE PRODUCTS</h2>
				<br><br>
				<p style="color: white;">Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s.</p>
				<br><br>
				<button type="button" class="btn btn-outline-light" style="border: 1px solid #fdfcfc;font-family: Josefin Sans">Check More</button>
			</div>
			<div id="blogcard" class="col-lg-6" style="background-image: url('assets/images/blog.jpeg');height: 400px;width:609px;padding:85px">
				<div class="card promoting-card" style="background-color:rgb(236, 234, 231);height:245px;padding-top: 30px">
						<h3 style="text-align: center;font-family:Josefin Sans">
							Natural Hair Care <br>Products
						</h3><br>
						<b style="color: silver;text-align: center">$ 45.09</b><br>
					<center><img src="{{asset('assets/front/images/favicon.png')}}" alt="" style="width: 35px"></center>
				</div>
				{{-- <img src="{{asset()}}" style="" alt=""> --}}
			</div>
		</div>
		<div class="row">
			<div>
			<img src="{{asset('assets/images/pexels-photo-3985349.jpeg')}}" style="width: 609px; height:400px"alt="">
			</div>
			<div class="col-lg-6" style="height:400px;text-align: center;background-image: url('assets/images/1599886325newsletter.jpg')">
				<h2 style="color: white;font-family:Josefin Sans">ALL EARTHY HAIR <br>CARE PRODUCTS</h2>
				<br><br>
				<p style="color: white;">Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s.</p>
				<br><br>
				<button type="button" class="btn btn-outline-light" style="border: 1px solid #fdfcfc;font-family: Josefin Sans">Check More</button>
			</div>
		</div>
	</div>
</section>


	
<section>
	<div style="background-image: url('assets/images/BlogSection.png') ;padding:100px"  >
		<center><h2 style="font-family:Josefin Sans">LATEST BLOG</h2></center>
		<div class="row mt-10" style="">
			<div class="col-md-4 mb">
			  	<div class="card" >
					<div class="card-body text-center">
						<div class="cropped">
						<img src="{{asset('assets/images/pexels-photo-4202325.jpeg')}}"  alt="">
						</div><br>
				  		<b>Lorem Ipsum is simply dummy text</b>
				  		<p class="card-text">Bring out your passion filled
				  		products for some camera sessions. We may ask them to remain still. ;) </p>
					</div>
			  	</div>
			</div>
  
			<div class="col-md-4 mb">
			  <div class="card" >
  
				<div class="card-body text-center">
					<div class="cropped1">
						<img src="{{asset('assets/images/pexels-photo-3762634.jpeg')}}"  alt="">
						</div><br>
						<b>Lorem Ipsum is simply dummy text</b>
				 <p class="card-text" style="height: 70px;">Now, who keeps those
					(es)sensuals in a box? Lets put them up on our grid.                                               
				  </p>
  
				</div>
  
			  </div>
  
			</div>
			<div class="col-md-4 mb">
			  <div class="card">
  
				<div class="card-body text-center">
					<div class="cropped3">
						<img src="{{asset('assets/images/pexels-photo-4177826.jpeg')}}"  alt="">
						</div><br>
				  		<b>Lorem Ipsum is simply dummy text</b>
				  <p class="card-text">Oh well! You know hoomans
					Lets endorse the sensuality to them. You know they need to learn. (wink wink)
				  </p>
  
				</div>
			  </div>
			</div>
		  </div>
	</div>
</section>

<section>
	<div id="card">
		<div class="row">
			<div class="col-lg-6" style="height:400px;background-image: url('assets/images/1599886325newsletter.jpg')">
				<div style="padding:80px; font-family:Josefin Sans">
					<h3 style="color: white;font-family:Josefin Sans">
						<b style="font-family:Josefin Sans"> STAY TUNED FOR <br>	UPDATES </b>
					</h3>
					<hr style="width:100px;border:2px solid white;margin-left:0px"><br>
						<input type="text" id="fname" name="firstname" placeholder="Enter Email"><br><br>
						<button type="button" class="btn btn-outline-light" style="border: 1px solid #fdfcfc;">Submit Now</button><br><br>
				</div>
			</div>
			<div class="col-lg-6" style="height: 400px;width:675px;font-family:Josefin Sans">
				<div style="background-image: url('assets/images/contact Us.jpg')">
				<div style="padding:60px">
					<h3 style="color: white">
						<b> GET IN TOUCH </b>
					</h3>
					<hr style="width:100px;border:2px solid white;margin-left:0px"><br>
					<div><i class="fa fa-phone" style="font-size:20px;color:white"></i><span style="color:white">  Call Us: <br> &nbsp; &nbsp; &nbsp;+91-000-000-000</span><br><br>
						<i class="fa fa-envelope" style="font-size:20px;color:white"></i><span style="color:white">  Mail Us: <br> &nbsp; &nbsp; &nbsp;info@companyname.com</span><br><br>
						<i class="fa fa-map-marker" style="font-size:20px;color:white"></i><span style="color:white">  Location: <br> &nbsp; &nbsp; &nbsp;100Lorem ispam,Address</span>
					</div>

				</div>
				</div>
			</div>
		</div>
</section>


	<!-- main -->
	<script src="{{asset('assets/front/js/mainextra.js')}}"></script>