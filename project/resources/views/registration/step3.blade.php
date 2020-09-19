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
        <div class="progress-bar bg-success" style="width:55.5%"></div>
      </div><br>
      <div class="container" style="">
            <!--- third step --->
                  
            <div class="" id ="third_form"style="">
              <div class="space140"></div>  

                      <h1 style="text-align: center;font-family: 'Josefin Sans', sans-serif;">VERIFY YOUR MOBILE NO & EMAIL ADDRESS</h1>
                    <div class="space140"></div>  
                      <div class="row">
                        <div class="col-sm-6">
                          <img src="{{asset('assets/jpg/vendorlogin4.jpg')}}" id="img">
                        </div>

                        <div class="col-sm-6" id="">
                          <div class="" id="third">
                          <form id="registration_form_third" post="{{route('post.step3')}}" method="POST"  enctype="multipart/form-data">
                            <input type="hidden" name="_token" value="{{ csrf_token() }}">
                            @if(session('success'))
                                     <div id="message_first" class="alert alert-success">
                                      <p>{{session('success')}}</p>
                                </div>
                            @endif
                            @if (session('error'))
                            <div class="alert alert-danger">
                              <p>{{session('error')}}</p>
                            </div>
                            @endif
                            @if ($errors->any())
                            <div class="alert alert-danger">
                              @foreach ($errors as $item)
                                  <p>{{$item}}</p>
                              @endforeach  
                            </div>
                            @endif
                            <p class="success alert-success d-none">
                            </p>
                                <b>Email Address OTP*</b><br><br>
                                <input type="text" id="email_otp" name ="email_otp" style="" value="{{ session()->get('register.email_otp') }}" class="w-100"><br><br>
                                <label><a href="" id="resend_email">Resend?</a></label>
                                <br><br>
                                  <b>Mobile No OTP*</b><br><br>
                                  <input type="text" id="mobile_otp" name="mobile_otp"style="" class="w-100" value="{{ session()->get('register.mobile_otp') }}" title="Phone number" ><br><br>
                                <label><a href="javascript:void(0)" id="resend_mobile">Resend?</a></label>
                                <br><br>
                                <div class="mb-5 text-center">
                                <a id="back_third"  class="btn second" style="">Back</a>
                                  <a id="third_next" class="btn second" style=""> Next</a>
                                </div>
                          </form>
                          </div>
                        </div>
                      </div>
            </div><!--third step end-->
        </div>

    </body>
    </html>
<script src="https://code.jquery.com/jquery-3.1.1.min.js"></script>
<script>
    $('#mobile_otp').keyup(function(e)
                                      {
        if (/\D/g.test(this.value))
        {
          // Filter non-digits from input value.
          this.value = this.value.replace(/\D/g, '');
        }
      });

      setTimeout(function() {
    $('#message_first').fadeOut('fast');
    }, 5000);
    //ajax for resend Email

    // $('#resend_email').click(function(e){
    //   e.preventDefault();
    //   let _token   = $('input[name="_token"]').val();
    //   console.log(_token);
    //   $.ajax({
    //     url: "{{route('registration.email.resend')}}",
    //     type:"POST",
    //     data:{
    //       _token: _token
    //     },
    //     success:function(response){
    //       console.log(response);
    //       if(response) {
    //         location.reload();
    //         $('.success').addClass('p-3');
    //         $('.success').removeClass('d-none');
    //         $('.success').text(response.msg);
    //       }
    //     }
    //   })
    // });
    
    //ajax for resend Email
    // $('#resend_mobile').click(function(e){
    //   e.preventDefault();
    //   let _token   = $('input[name="_token"]').val();
    //   console.log(_token);
    //   $.ajax({
    //     url: "{{route('registration.mobile.resend')}}",
    //     type:"POST",
    //     data:{
    //       _token: _token
    //     },
    //     success:function(response){
    //       console.log(response);
    //       location.reload();
    //       if(response) {
            
    //         $('.success').addClass('p-3');
    //         $('.success').removeClass('d-none');
    //         $('.success').text(response.msg);
    //       }
    //     }
    //   })
    // });
</script>
