@extends('layout.index')
@push('before-styles')
<link rel='stylesheet' href="{{asset('css/registration.css')}}">
@endpush
@section('content')
    

  <div class="progress">
    <div class="progress-bar bg-success" style="width:77.7%"></div>
  </div><br>
  <div class="container" >
          <!----fifth step start -->
    
        <div class="" id="fifth_form">
          <div class="space140"></div>
          <h1 style="text-align: center;">REQUIRED DOCUMENTS</h1>
  
            <div class="row">
              <div class="col-sm-6 final_image_mobile">
                <img src="./jpg/vendorlogin6.jpg" id="img">
              </div>
              <div class="col-sm-6" id="">
                <div class="" id="fourth">
                <form action="{{route('vendor.post.step5')}}" id="registration_form_fifth" method="POST"  enctype="multipart/form-data">
                  @csrf
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
                    <img src="./jpg/vendorlogin6.jpg" id="img-final">
                  </div> 
            </div>
          </div><!--fifth step end-->
    </div>

@endsection