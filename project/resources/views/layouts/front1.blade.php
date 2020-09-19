<!--<html>-->
<!--<head>-->
<!--<title>-->
<!--AllEarthy-->
<!--</title>-->
<!--</head>-->
<!--<body>-->
<!--<img src="underconstruction.jpg" style="width:100%">-->
<!--</body>-->
<!--</html>-->

 <!--  <style>
          .card {
              background: url(http://allearthy.com/vendormodel/public/BlogSection.jpg);
              width: 90%;
              height: 80%;
              margin: auto;
              min-height: 512px;
              box-shadow: 0px 35px 70px 0px rgb(169 169 169), 0px 30px 40px -10px rgba(14, 63, 100, 0.07);
              /* background: linear-gradient(180deg, rgb(49 140 43) 0%, rgb(140 199 75 / 94%) 100%); */
              border-radius: 10px;
              display: flex;
              flex-direction: column;
          }

          @media screen and (max-width: 512px) {
            .card {
              width: 100%;
              height: 100%;
              border-radius: 0;
              box-shadow: none;
            }
          }

          .header {
            display: flex;
            padding: 48px;
            justify-content: space-between;
            align-items: center;
            color: #fff;
          }

          .logo {
            font-weight: bold;
            font-size: 1.5em;
            transition: opacity 0.05s ease;
          }

          .logo:hover {
            opacity: 0.75;
          }

          .social {
            display: flex;
          }

          .social a {
            display: inline-block;
            margin-right: 12px;
            transition: opacity 0.05s ease;
          }

          .social a:last-child {
            margin-right: 0;
          }

          .social a:hover {
            opacity: 0.75;
          }

          .social .icon {
            width: 18px;
            fill: #fff;
          }

          .content {
            flex: 1 1 auto;
            min-height: 256px;
            display: flex;
            flex-direction: column;
            justify-content: center;
            align-items: center;
          }

          .content .title-holder {
            color: #fff;
            text-align: center;
            margin-bottom: 24px;
          }

          .content .title-holder h1 {
          font-weight: bold;
              font-size: 86px;
              margin-bottom: 12px;
              color: black;
              font-family: 'Open Sans', sans-serif;
          }

          .content .title-holder p {
            font-size: 24px;
              line-height: 28px;
              color: black !important;
              font-family: 'Open Sans', sans-serif;
              font-weight: 500;
          }

          @media screen and (max-width: 768px) {
            .content .title-holder {
              max-width: 80%;
            }
          }

          .content .cta {
            min-width: 64px;
            padding: 16px 24px;
            background: #fff;
            border-radius: 50px;
            cursor: pointer;
            text-align: center;
            font-size: 1em;
            font-weight: bold;
            transform: none;
            box-shadow: 0px 10px 30px 0px rgba(0, 0, 0, 0.1);
            transition: box-shadow 0.3s cubic-bezier(0.25, 0.25, 0.315, 1.35), transform 0.1s linear;
          }

          .content .cta:hover {
            transform: translateY(-1px);
            box-shadow: 0px 10px 40px 0px rgba(0, 0, 0, 0.3);
          }

          .footer {
            display: flex;
            flex-direction: row;
            padding: 48px;
            justify-content: center;
            color: #fff;
            font-size: 14px;
            font-weight: 500;
            text-align: center;
          }

          a.underlined:hover {
            border-bottom: 1px dotted #fff;
          }
          .team-page{
              padding-top:50px;
          }
    </style> -->

  {{-- <!--   team page start   -->
  <div class="team-page">
    <div class="container">
        <div class="card">
            <div class="content">
                <div class="title-holder">
                    <h1>Coming Soon</h1>
                    <p> Our website is under construction. We`ll be here soon with our new awesome site,</p>
                </div>
                
            </div>
        </div>
        
      </div>
  </div>
  <!--   team page end   --> --}}

  <!DOCTYPE html>
<html>
<head>
	<title>Registration</title>

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
	    <meta property="og:image" content="{{asset('assets/images/'.$productt->photo)}}" />
	    <meta name="author" content="GeniusOcean">
    	<title>{{substr($productt->name, 0,11)."-"}}{{$gs->title}}</title>
    @else
	    <meta name="keywords" content="{{ $seo->meta_keys }}">
	    <meta name="author" content="GeniusOcean">
		<title>{{$gs->title}}</title>
    @endif
	<!-- favicon -->
	<link rel="icon"  type="image/x-icon" href="{{asset('assets/images/all-earthy-icon-main.png')}}"/>
	<!-- bootstrap -->
	<link rel="stylesheet" href="{{asset('assets/front/css/bootstrap.min.css')}}">
	<!-- Plugin css -->
	<link rel="stylesheet" href="{{asset('assets/front/css/plugin.css')}}">
	<link rel="stylesheet" href="{{asset('assets/front/css/animate.css')}}">
	<link rel="stylesheet" href="{{asset('assets/front/css/toastr.css')}}">
	<link rel="stylesheet" href="{{asset('assets/front/css/toastr.css')}}">

	<!-- jQuery Ui Css-->
	<link rel="stylesheet" href="{{asset('assets/front/jquery-ui/jquery-ui.min.css')}}">
	<link rel="stylesheet" href="{{asset('assets/front/jquery-ui/jquery-ui.structure.min.css')}}">

@if($langg->rtl == "1")

	<!-- stylesheet -->
	<link rel="stylesheet" href="{{asset('assets/front/css/rtl/style.css')}}">
	<link rel="stylesheet" href="{{asset('assets/front/css/rtl/custom.css')}}">
	<link rel="stylesheet" href="{{asset('assets/front/css/common.css')}}">
	<!-- responsive -->
	<link rel="stylesheet" href="{{asset('assets/front/css/rtl/responsive.css')}}">
	<link rel="stylesheet" href="{{asset('assets/front/css/common-responsive.css')}}">

    <!--Updated CSS-->
 <link rel="stylesheet" href="{{ asset('assets/front/css/rtl/styles.php?color='.str_replace('#','',$gs->colors).'&amp;'.'header_color='.str_replace('#','',$gs->header_color).'&amp;'.'footer_color='.str_replace('#','',$gs->footer_color).'&amp;'.'copyright_color='.str_replace('#','',$gs->copyright_color).'&amp;'.'menu_color='.str_replace('#','',$gs->menu_color).'&amp;'.'menu_hover_color='.str_replace('#','',$gs->menu_hover_color)) }}">

@else

	<!-- stylesheet -->
	<link rel="stylesheet" href="{{asset('assets/front/css/style.css')}}">
	<link rel="stylesheet" href="{{asset('assets/front/css/custom.css')}}">
	<link rel="stylesheet" href="{{asset('assets/front/css/common.css')}}">
	<!-- responsive -->
	<link rel="stylesheet" href="{{asset('assets/front/css/responsive.css')}}">
	<link rel="stylesheet" href="{{asset('assets/front/css/common-responsive.css')}}">

    <!--Updated CSS-->
 <link rel="stylesheet" href="{{ asset('assets/front/css/styles.php?color='.str_replace('#','',$gs->colors).'&amp;'.'header_color='.str_replace('#','',$gs->header_color).'&amp;'.'footer_color='.str_replace('#','',$gs->footer_color).'&amp;'.'copyright_color='.str_replace('#','',$gs->copyright_color).'&amp;'.'menu_color='.str_replace('#','',$gs->menu_color).'&amp;'.'menu_hover_color='.str_replace('#','',$gs->menu_hover_color)) }}">
 <link href="https://fonts.googleapis.com/css2?family=Josefin+Sans:wght@700&display=swap" rel="stylesheet">
@endif
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
<!-- Latest compiled JavaScript -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
<script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
<script src="{{asset('assets/js/custom.js')}}"></script>
{{-- <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous"> --}}





  <style type="text/css">
   h1, h2, h3, h4, h5, h6{
font-family: 'Josefin Sans', sans-serif;

}
body{

font-family: 'Josefin Sans', sans-serif;

}
/* #popUpMain{
  position: absolute;
  width: 80%;
  height: 100%;
  background: rgba(0,0,0,0);
  z-index: 1001;
  text-align: center; */
}
.modal-backdrop.fade {
    opacity: 0.5;
}
.fade:not(.show){
  opacity: 0.5;
}
div#require_doc_model {
    opacity: 1;
}
.close{
  text-align: right;
  cursor: pointer;
}
.close:hover{
  cursor: pointer;
}
#popup{
	width: 85%;
	height: 98%;
	background-image: url("assets/images/newsletter.png");
	position: absolute;
	top: 50%;
	left: 50%;
	transform: translate(-50%,-50%);
	box-shadow: 1px,2px,5px,3px black;

}
#newsHeading{
	transform: translateY(50px);
	color: white;
}

button.submitId.btn.btn-success {
    position: relative;
    bottom: 277px;
    padding: 16px;
    width: 250px;
    left: 87px;
}
.heading h1{
	font-family: 'Josefin Sans', sans-serif;
	color: black;
	text-align: center;
  font-size: 40px;
}
.logo{
	text-align: center;
}
.logo img {
    width: 30%;
    text-align: center;
}
.border-color{
	border:5px solid #5D926E;
}
.space140{
	height: 80px;
}
.subtitle h2{
	font-family: 'Josefin Sans', sans-serif;
	color: black;
	text-align: center;
  font-size: 30px;
}
.button_div a {
    text-align: center;
    padding: 17px 39px;
    background: #5d926e;
    color: white;
    border-radius: 11px;
	font-family: 'Josefin Sans', sans-serif;
    
    
}
button#go_register {
  text-align: center;
    padding: 9px 27px;
    background: #5d926e;
    color: white;
    border:none;
    border-radius: 11px;
    font-family: 'Josefin Sans', sans-serif;
}

button#close_model{
  text-align: center;
  padding: 9px 27px;
    background: #6c757d;
    color: white;
    border:none;
    border-radius: 11px;
	font-family: 'Josefin Sans', sans-serif;
}

.content-div{
	padding: 30px;
	height: 100vh;
  background-image:url({{asset('assets/images/registration-7.png')}}); 
  background-size:cover;
  /* background-position-x: -496px;
   */
   background-position-y: -202px;

}
ul li{
  list-style:unset;
  padding: 9px;
}
/*media query */
@media(min-width:320px) and (max-width:420px){
	.subtitle h2{
		font-size: 30px;
	}
	.heading h1{
		font-size: 28px;
	}
	.logo img {
    width: 100%;
	}
 
  .content-div{
    padding: 19px;
    background-position-x:417px;
    background-position-y: -4px;
  }
  button#go_register{
    padding: 9px 19px;
  }
  .space140 {
    height: 49px;
}
.col-sm-6.final_image_mobile{
  width: 100%;
  height: 88%;
}
}
@media (min-width:1200px) and (max-width:1439px) {
  .content-div {
    background-position-y: -312px;
    background-position-x: 30px;
  }
}
  @media (min-width:1024px) and (max-width:1199px) {
  .content-div {
    background-position-y: -131px;
    background-position-x: 30px;
  }
  }
  @media (width:1024px) and (orientation:portrait) {
  .content-div {
    background-position-y: -2px;
    background-position-x: -352px;
  }
}
@media (width:768px) and (orientation:portrait) {
  .content-div {
    background-position-x: -263px;
    background-position-y: -2px;
  }
}
@media (width:1440px){
  .content-div {
    background-position-y: -237px;
    background-position-x: 30px;
  }
}
@media (width:1280px) and (height:950px){
  .content-div {
    background-position-y: -189px;
    background-position-x: 30px;
  }
}
@media (width:812px) and (height:628px){
  .content-div {
    background-position-y: -93px;
    /* background-position-x: 30px; */
  }
}
@media (width:1366px) and (height:728px){
  .content-div {
    background-position-y: -411px;
    background-position-x: 30px;
}
  
}

	</style>
</head>
<body>
<div class=" m-auto container  content-div">
	
	<div class="logo m-auto">
		<img src="{{asset('assets/images/logo.png')}}">
	</div>
	<div class="space140 "></div>

	<div class="heading m-auto">
		<h1>We're working hard to bring you closer to your roots.</h1>
	</div>
	<div class="space140"></div>
	<div class="subtitle m-auto">
		<h2>Mean while, if you are a vendor, <br>
      Registrations are now open.
		</h2>
	</div>
	<div class="space140"></div>
	<div class="m-auto text-center button_div">
    <a href="http://localhost/allearthy/vendormodel/public/" class="submitId btn-register">Register Now</a>
		{{-- <a href="" class="submitId btn-register" >Register Now</a> --}}
    
	</div>
</div>
{{-- Model Code--}}
<!-- Button trigger modal -->
{{-- <button type="button" class="btn btn-primary">
	Launch demo modal
  </button>
   --}}
  <!-- Modal -->
  <!-- Button trigger modal -->
  
  <!-- Modal -->
    <!-- Modal content -->
    <div class="modal fade bd-example-modal-lg" id="require_doc_model" tabindex="-1" role="dialog" aria-labelledby="require_doc_model_label" aria-hidden="true">
      <div class="modal-dialog modal-lg modal-dialog-centered" role="document">
        <div class="modal-content" style="padding: 40px;">
            <span class="close"  data-dismiss="modal">&times;</span>
            <p><center><b>REQUIRED DOCUMENTS</b></center> <br>We require following documents for
              Vendor Registration</p>
                <div class="content">
                    <ul>
                      <li>Pan Card</li>
                      <li>GST Registration Certificate</li>
                      <li>Shop Establishment Number</li>
                      <li>Aadhaar Card of Owner</li>
                    </ul>
                </div>
              <div class="modal-footer">
                <button type="button" class="btn btn-secondary"  id="close_model"data-dismiss="modal">Close</button>
                <button type="button" class="btn btn-primary"  id="go_register">Register Now</button>
                  {{-- <a href="/vendormodel/public/" class="submitId btn-register">Register Now</a> --}}
              </div>

        </div>

      </div>

  </div>


</body>
<script>

  $(document).ready(function(){
    $('#go_register').click(function(){
      goRegister();
      })
    console.log('hi');
    function goRegister(){
      
        window.location.href = "http://localhost/allearthy/vendormodel/public/";
        console.log('reg');
    }
  })
</script>
</html>