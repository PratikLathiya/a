@extends('layout.index')       
@push('before-styles')
<link rel='stylesheet' href="{{asset('css/registration.css')}}">
@endpush

@section('content')

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
                          <img src="jpg/vendorlogin4.jpg" id="img">
                        </div>

                        <div class="col-sm-6" id="">
                          <div class="" id="third">
                          <form id="registration_form_third" post="{{route('vendor.post.step3')}}" method="POST"  enctype="multipart/form-data">
                            @csrf
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
                                {{-- <label><a href="" id="resend_email">Resend?</a></label> --}}
                                <br><br>
                                  <b>Mobile No OTP*</b><br><br>
                                  <input type="text" id="mobile_otp" name="mobile_otp"style="" class="w-100" value="{{ session()->get('register.mobile_otp') }}" title="Phone number" ><br><br>
                                {{-- <label><a href="javascript:void(0)" id="resend_mobile">Resend?</a></label> --}}
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

@endsection
@push('before-scripts')
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

    $('#resend_email').click(function(e){
      e.preventDefault();
      let _token   = $('input[name="_token"]').val();
      console.log(_token);
      $.ajax({
        url: "{{route('vendor.email.resend')}}",
        type:"POST",
        data:{
          _token: _token
        },
        success:function(response){
          console.log(response);
          if(response) {
            location.reload();
            $('.success').addClass('p-3');
            $('.success').removeClass('d-none');
            $('.success').text(response.msg);
          }
        }
      })
    });
    
    //ajax for resend Email
    $('#resend_mobile').click(function(e){
      e.preventDefault();
      let _token   = $('input[name="_token"]').val();
      console.log(_token);
      $.ajax({
        url: "{{route('vendor.mobile.resend')}}",
        type:"POST",
        data:{
          _token: _token
        },
        success:function(response){
          console.log(response);
          location.reload();
          if(response) {
            
            $('.success').addClass('p-3');
            $('.success').removeClass('d-none');
            $('.success').text(response.msg);
          }
        }
      })
    });
</script>
@endpush