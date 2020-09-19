
@extends('layout.index')       
@push('before-styles')
<link rel='stylesheet' href="{{asset('css/registration.css')}}">
@endpush
    


  <!--- second step --->
  @section('content')
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

            <img src="./jpg/vendorlogin3.jpg" width="">

          </div>

          <div class="col-sm-6" id="">
            <div class="">
            <form id="registration_form_second" method="post" action="{{route('vendor.post.step2')}}"  enctype="multipart/form-data">
              @csrf
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

            <img src="./jpg/vendorlogin3.jpg" id="img-personal">

          </div>

        </div>
    </div>
  </div>
@endsection
<!--second step end-->

@push('before-scripts')
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
@endpush