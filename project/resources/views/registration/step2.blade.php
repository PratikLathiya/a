<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">

  <title>Registration</title>
	<link rel="icon"  type="image/x-icon" href="{{asset('assets/images/all-earthy-icon-main.png')}}"/>

  <!-- Fonts -->
  <link href="https://fonts.googleapis.com/css?family=Nunito:200,600" rel="stylesheet">
  
  <!-- CSS only -->
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css" integrity="sha384-9aIt2nRpC12Uk9gS9baDl411NQApFmC26EwAOH8WgZl5MYYxFfc+NcPb1dKGj7Sk" crossorigin="anonymous">

  <!-- JS, Popper.js, and jQuery -->
  <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
  <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js" integrity="sha384-OgVRvuATP1z7JjHLkuOU7Xw704+h835Lr+6QL9UvYjZE3Ipu6Tp75j7Bh/kR0JKI" crossorigin="anonymous"></script>
  <link href="https://fonts.googleapis.com/css2?family=Josefin+Sans:ital,wght@0,200;0,300;0,400;0,423;0,700;1,200;1,300;1,400;1,423;1,600;1,700&display=swap" rel="stylesheet">
  <!-- Styles -->
    <link rel='stylesheet' href='https://cdn.jsdelivr.net/npm/sweetalert2@7.12.15/dist/sweetalert2.min.css'>
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <link href="  https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet">

  <!-- scripts -->

  <script src="https://cdn.jsdelivr.net/npm/sweetalert2@7.12.15/dist/sweetalert2.all.min.js"></script>
  <script src="{{asset('assets/js/custom.js')}}"></script>
  <link rel='stylesheet' href="{{asset('assets/front/css/registration.css')}}">
</head>
    <body id="body" >
        <div class="progress">

    <div class="progress-bar bg-success" style="width:44.4%"></div>
  
  </div><br>
  <div class="container" style="">
      <div class="" id="second_form">        
        <div class="space140"></div>
            <h1 class="text-center">PERSONAL DETAIL</h1><br>
      <div class="space140"></div>
        <div class="row">
          <div class="col-sm-6 mobile-col">

            <img src="{{asset('assets/jpg/vendorlogin3.jpg')}}" width="">

          </div>

          <div class="col-sm-6" id="">
            <div class="">
            <form id="registration_form_second" method="post" action="{{route('post.step2')}}"  enctype="multipart/form-data">
              <input type="hidden" name="_token" value="{{ csrf_token() }}">
              @if ($errors->has('message'))
              <div class="alert alert-info">
                <p>{{ $errors->first('message') }}</p>
              </div>
              @endif
              @if ($errors->any())
              <div class="alert alert-danger">
                <ul>
                  @foreach($errors->all() as $error)
                  <li>{{ $error }}</li>
                @endforeach
                  </ul>
            </div>
              @endif
              <b>Your Full Name*</b><br><br>

              <input type="text" id="customer_name" name="customer_name" value="{{ session()->get('register.customer_name') }}" class="cust_name w-100 mb-5" style=""><br>

              <b>Email*</b><br><br>
              
              
              <input type="email" id="customer_email" name="customer_email" value="{{ session()->get('register.customer_email') }}" class="w-100 mb-5" style=""><br>

              <b>Mobile No*</b><br><br>

                <input type="tel" id="customer_number" name="customer_number" value="{{ session()->get('register.customer_number') }}" class="w-100 mb-5" style=""><br>
                {{-- @if ($errors->has('failuer'))
                <div class="alert alert-danger">
                  <p>{{ $errors->first('failuer') }}</p>
                </div>
                @endif --}}
              <div class="mb-5 text-center mt">
                  {{-- <a id="second_next" class="btn btn-success" style="margin-left: 125px; width: 90px" >Next</a> --}}
                  <a id="second_next" class="btn second" style=""><span class="material-icons">
                    east
                    </span></a>
              </div>
            </form>
            </div>
        </div>

          <div class="col-sm-6 desktop-col">

            <img src="{{asset('assets/jpg/vendorlogin3.jpg')}}" id="img-personal">

          </div>

        </div>
    </div>
  </div>
    </body>
    </html>
<script>
   function validateEmail(email) {
          var emailReg = /^([\w-\.]+@([\w-]+\.)+[\w-]{2,4})?$/;
          return emailReg.test( email );
      }
      var clicked = jQuery("#customer_email");

      clicked.focusout(function() {
          var email = jQuery("input[type='email']").val();
          if(!validateEmail(email) ){
          
            swal({
                      title: "Oops Invalid!",
                      text: "Please Add Valid Email Address.",
                      type: "warning",
                      showCancelButton: false,
                      confirmButtonColor: "#5D926E",
                      confirmButtonClass: "btn-danger",
                      confirmButtonText: "Okay",
                      closeOnConfirm: false
                    })
            jQuery("input[type='email']").val("");
          }else{
            console.log('Succcess');
          }
          // ( !validateEmail(email) ) ? alert('Please Add Valid Email Address') jQuery("input[type='email']").val("") :
      });

    
</script>
    
