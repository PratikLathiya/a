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
  <script src="{{asset('js/custom.js')}}"></script>
  <link rel='stylesheet' href="{{asset('css/registration.css')}}">
</head>
    <body id="body" >
        <div class="progress">
            <div class="progress-bar bg-success" style="width:77.7%"></div>
        </div><br>
        <div class="container" >
            <div class="" id="fifth_form">
                <div class="space140"></div>
                <h1 style="text-align: center;">REQUIRED DOCUMENTS</h1>
                <div class="row">
                    {{-- <div class="col-sm-6 final_image_mobile">
                        <img src="{{asset('assets/jpg/vendorlogin6.jpg')}}" id="img">
                      </div> --}}
                    <div class="col-sm-6" id="">
                        <div class="" id="fourth">
                        <form action="{{route('post.step5')}}" id="registration_form_fifth" method="POST"  enctype="multipart/form-data">
                          {{ csrf_field() }}
                              <b>Pancard Number*</b><br><br>
                              <input type="text" name="pancard" style="" class="w-100" value="{{ session()->get('register.pancard') }}" required><br><br>
                              <b>GST Registration Certificate*</b><br><br>
                              <div class="input-group">
                                <input type="file" name="gst_certi[]"  class="w-100" style="" accept="image/*" multiple required/>
                              </div><br><br>
                              <b>Shop Establishment Number*</b><br><br>
                              <input type="text" name="shop_establishment_no" value="{{ session()->get('register.shop_establishment_no') }}" style="" class="w-100" required><br><br>
                              <b>Aadhaar Card of Owner*</b><br><br>
                              <div class="input-group">
                                <input type="file" name="adhaarcard_no[]" class="w-100" style=""  accept="image/*" multiple required/>   
                              </div>
                              <br><br>  
                              <div class="text-center d-block mb-5">
                                  <input type="submit" id="submitnow" class="btn btn-success submit_btn" style="" >
                              </div>
                            </form>
                        </div>
                      </div>
                      
                       <div class="col-sm-6 final_image_desktop">
                    <img src="{{asset('assets/jpg/vendorlogin6.jpg')}}" id="img" style="width:78%; height:83%">
                  </div> 
                </div>
                </div>
            </div>
        </div>
    </body>
</html>