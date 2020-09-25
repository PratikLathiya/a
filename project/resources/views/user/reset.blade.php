<!DOCTYPE html>
<html lang="en">

<head>
	<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge" />
	<meta http-equiv="X-UA-Compatible" content="ie=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
    @if(isset($page->meta_tag) && isset($page->meta_description))
        <meta name="keywords" content="{{ $page->meta_tag }}">
        <meta name="description" content="{{ $page->meta_description }}">
		<title>{{$gs->title}}</title>
    @elseif(isset($blog->meta_tag) && isset($blog->meta_description))
        <meta name="keywords" content="{{ $blog->meta_tag }}">
        <meta name="description" content="{{ $blog->meta_description }}">
		<title>{{$gs->title}}</title>
    @elseif(isset($productt))
		<meta name="keywords" content="{{ !empty($productt->meta_tag) ? implode(',', $productt->meta_tag ): '' }}">
		<meta name="description" content="{{ $productt->meta_description != null ? $productt->meta_description : strip_tags($productt->description) }}">
	    <meta property="og:title" content="{{$productt->name}}" />
	    <meta property="og:description" content="{{ $productt->meta_description != null ? $productt->meta_description : strip_tags($productt->description) }}" />
	    <meta property="og:image" content="{{asset('assets/images/thumbnails/'.$productt->thumbnail)}}" />
	    <meta name="author" content="GeniusOcean">
    	<title>{{substr($productt->name, 0,11)."-"}}{{$gs->title}}</title>
    @else
	    <meta name="keywords" content="{{ $seo->meta_keys }}">
	    <meta name="author" content="GeniusOcean">
		<title>{{$gs->title}}</title>
    @endif
	<!-- favicon -->
	<link rel="icon"  type="image/x-icon" href="{{asset('assets/images/'.$gs->favicon)}}"/>
<!--font-->
<link rel="stylesheet" type="text/css" href="//fonts.googleapis.com/css?family=Josefin+Sans" />

@if($langg->rtl == "1")

	<!-- stylesheet -->
	<link rel="stylesheet" href="{{asset('assets/front/css/rtl/all.css')}}">

    <!--Updated CSS-->
 	<link rel="stylesheet" href="{{ asset('assets/front/css/rtl/styles.php?color='.str_replace('#','',$gs->colors).'&amp;'.'header_color='.str_replace('#','',$gs->header_color).'&amp;'.'footer_color='.str_replace('#','',$gs->footer_color).'&amp;'.'copyright_color='.str_replace('#','',$gs->copyright_color).'&amp;'.'menu_color='.str_replace('#','',$gs->menu_color).'&amp;'.'menu_hover_color='.str_replace('#','',$gs->menu_hover_color)) }}">

@else

	<!-- stylesheet -->
	<link rel="stylesheet" href="{{asset('assets/front/css/all.css')}}">

    <!--Updated CSS-->
 	<link rel="stylesheet" href="{{ asset('assets/front/css/styles.php?color='.str_replace('#','',$gs->colors).'&amp;'.'header_color='.str_replace('#','',$gs->header_color).'&amp;'.'footer_color='.str_replace('#','',$gs->footer_color).'&amp;'.'copyright_color='.str_replace('#','',$gs->copyright_color).'&amp;'.'menu_color='.str_replace('#','',$gs->menu_color).'&amp;'.'menu_hover_color='.str_replace('#','',$gs->menu_hover_color)) }}">

@endif



	@yield('styles')
	<style>
	.cropped {
		width: 46%; /* width of container */
		height: 1%; /* height of container */
		overflow: hidden;
		border: 3px solid black;
		text-align: center
	}
	
	.cropped img {
		margin: -9px 0px 0px 0px;
	}
	.cropped1 {
		width: 100%; /* width of container */
		height: 1%; /* height of container */
		overflow: hidden;
		border: 3px solid black;
		text-align: center
	}
	.cropped3 {
		width: 47%; /* width of container */
		height: 1%; /* height of container */
		overflow: hidden;
		border: 3px solid black;
		text-align: center
	}

input[type=text], select, textarea {
  width: 100%;
  padding: 4px;
  border: 1px solid #ccc;
  border-radius: 4px;
  resize: vertical;
}

/* The Modal (background) */
.modal {
  display: none; /* Hidden by default */
  position: fixed; /* Stay in place */
  z-index: 1; /* Sit on top */
  padding-top: 100px; /* Location of the box */
  left: 0;
  top: 0;
  width: 100%; /* Full width */
  height: 100%; /* Full height */
  overflow: auto; /* Enable scroll if needed */
  background-color: rgb(0,0,0); /* Fallback color */
  background-color: rgba(0,0,0,0.4); /* Black w/ opacity */
}

/* Modal Content */
.modal-content {
  background-color: #fefefe;
  margin: auto;
  padding: 20px;
  border: 1px solid #888;
  width: 80%;
}

/* The Close Button */
.close {
  color: #aaaaaa;
  float: right;
  font-size: 28px;
  font-weight: bold;
}

.close:hover,
.close:focus {
  color: #000;
  text-decoration: none;
  cursor: pointer;
}
	</style>
	 <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css">
	 <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
	 <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
	 <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js"></script>
	 <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js"></script>
	 <link href="//netdna.bootstrapcdn.com/bootstrap/3.2.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
	 <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
	 <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
	 <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
<script src="//netdna.bootstrapcdn.com/bootstrap/3.2.0/js/bootstrap.min.js"></script>
<script src="//code.jquery.com/jquery-1.11.1.min.js"></script>

</head>

<body>



	<!-- Logo Header Area Start -->
	<section style="font-family: Josefin Sans">
		<div class="bs-example">
			<nav class="navbar navbar-expand-md navbar-light bg-light" style="margin-bottom: 0px">
				{{-- <div class="container"> --}}
			  <div class="col-lg-2 col-sm-6 col-5 remove-padding">
				<a href="{{ route('front.index') }}">
									<img src="{{asset('assets/images/'.$gs->logo)}}" alt="">
								</a>
			  </div>
			  <div class="col-lg-10 col-sm-12 remove-padding order-last order-sm-2 order-md-2 navbar" style="padding-top: 10px;font-size: 16px" id="navba">
				<button type="button" class="navbar-toggler" data-toggle="collapse" data-target="#navbarCollapse">
					<span class="navbar-toggler-icon"></span>
				</button>
		
				<div class="collapse navbar-collapse" id="navbarCollapse">
					<div class="navbar-nav">
						<a href="{{route('front.index')}}" class="nav-item nav-link active">HOME</a>
						<a href="#" class="nav-item nav-link">FEATURE</a>
						<a href="{{ route('front.category', [Request::route('category'),Request::route('subcategory'),Request::route('childcategory')]) }}" class="nav-item nav-link">SHOP</a>
						<a href="{{ route('front.contact') }}" class="nav-item nav-link">ABOUT US</a>
						<a href="#" class="nav-item nav-link">WHERE TO BUY?</a>
						<div class="search-box-wrapper" style="padding-left: 60px">
							<div class="search-box">
								<form id="searchForm" class="search-form form-inline d-flex  md-form " action="{{ route('front.category', [Request::route('category'),Request::route('subcategory'),Request::route('childcategory')]) }}" method="GET">
									<i class="fas fa-search" aria-hidden="true"></i>
  									<input class="form-control form-control-sm ml-3 " type="text" placeholder="Search" aria-label="Search" id="prod_name" name="search" placeholder="{{ $langg->lang2 }}" value="{{ request()->input('search') }}" autocomplete="off">
									<div class="autocomplete">
									  <div id="myInputautocomplete-list" class="autocomplete-items">
									  </div>
									</div>
							  	</form>
							</div>
						</div>
					</div>
					
          <div class="navbar-nav ml-auto" style="padding-left: 125px;padding-top: 10px">
            <li class="button-dropdown">
              <a href="javascript:void(0)" class="dropdown-toggle">
                My Account<span></span>
              </a>
              <ul class="dropdown-menu" style="margin-left:75%">
                <h5>{{ $langg->lang431 }}</h5>
                <li>
                  <a href="{{ route('user-dashboard') }}"><i class="fas fa-sign-in-alt"></i> {{ $langg->lang433 }}</a>
                </li>

                <li>
                  <a href="{{ route('user-profile') }}"><i class="fas fa-user"></i> {{ $langg->lang434 }}</a>
                </li>
                <li>
                  <a href="{{ route('user-logout') }}"><i class="fas fa-power-off"></i> {{ $langg->lang435 }}</a>
                </li>
              </ul>
            </li>
            {{-- <li class="login-profile-area" > --}}
              {{-- <a class="dropdown-toggle-1" href="javascript:;">my account </a>
              <div class="dropdown-menu">
                <div class="dropdownmenu-wrapper">
                    <ul>
                      <h5>{{ $langg->lang431 }}</h5>

                        <li>
                          <a target="_blank" href="{{ route('front.vendor',str_replace(' ', '-', Auth::user()->shop_name)) }}"><i class="fas fa-eye"></i> {{ $langg->lang432 }}</a>
                        </li>

                        <li>
                          <a href="{{ route('user-dashboard') }}"><i class="fas fa-sign-in-alt"></i> {{ $langg->lang433 }}</a>
                        </li>

                        <li>
                          <a href="{{ route('vendor-profile') }}"><i class="fas fa-user"></i> {{ $langg->lang434 }}</a>
                        </li>
                        <li>
                          <a href="{{ route('user-logout') }}"><i class="fas fa-power-off"></i> {{ $langg->lang435 }}</a>
                        </li>

                      </ul>
                </div>
              </div> --}}
            {{-- </li> --}}
					</div>
				</div>
			  </div>
			</div>
			</nav>
		</div>
		
	</section>
	<!-- Logo Header Area End -->


    <section class="user-dashbord">
        <div class="container">
          <div class="row">
            @include('includes.user-dashboard-sidebar')
                    <div class="col-lg-8" >
                        <div class="user-profile-details">
                            <div class="account-info">
                                <div class="header-area">
                                    <h4 class="title" style="font-family: Josefin Sans">
                                        {{ $langg->lang272 }}
                                    </h4>
                                </div>
                                <div class="edit-info-area">
                                    
                                    <div class="body">
                                            <div class="edit-info-area-form">
                                                    <div class="gocover" style="background: url({{ asset('assets/images/'.$gs->loader) }}) no-repeat scroll center center rgba(45, 45, 45, 0.5);"></div>
                                                    <form id="userform" action="{{route('user-reset-submit')}}" method="POST" enctype="multipart/form-data" style="font-family: Josefin Sans">
                                                        {{ csrf_field() }}
                                                        @include('includes.admin.form-both') 
                                                        <div class="row">
                                                            <div class="col-lg-12">
                                                                    <input type="password" name="cpass"  class="input-field" placeholder="{{ $langg->lang273 }}" value="" required="">
                                                            </div>
                                                        </div>
                                                        <div class="row">
                                                            <div class="col-lg-12">
                                                                    <input type="password" name="newpass"  class="input-field" placeholder="{{ $langg->lang274 }}" value="" required="">
                                                            </div>
                                                        </div>
                                                        <div class="row">
                                                            <div class="col-lg-12">
                                                                    <input type="password" name="renewpass"  class="input-field" placeholder="{{ $langg->lang275 }}" value="" required="">
                                                            </div>
                                                        </div>
    
                                                            <div class="form-links">
                                                                <button class="submit-btn" type="submit">{{ $langg->lang276 }}</button>
                                                            </div>
                                                    </form>
                                                </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
          </div>
        </div>
      </section>


<script>
  jQuery(document).ready(function (e) {
    function t(t) {
        e(t).bind("click", function (t) {
            t.preventDefault();
            e(this).parent().fadeOut()
        })
    }
    e(".dropdown-toggle").click(function () {
        var t = e(this).parents(".button-dropdown").children(".dropdown-menu").is(":hidden");
        e(".button-dropdown .dropdown-menu").hide();
        e(".button-dropdown .dropdown-toggle").removeClass("active");
        if (t) {
            e(this).parents(".button-dropdown").children(".dropdown-menu").toggle().parents(".button-dropdown").children(".dropdown-toggle").addClass("active")
        }
    });
    e(document).bind("click", function (t) {
        var n = e(t.target);
        if (!n.parents().hasClass("button-dropdown")) e(".button-dropdown .dropdown-menu").hide();
    });
    e(document).bind("click", function (t) {
        var n = e(t.target);
        if (!n.parents().hasClass("button-dropdown")) e(".button-dropdown .dropdown-toggle").removeClass("active");
    })
});
</script>

</body>

</html>

