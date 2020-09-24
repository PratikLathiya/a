
@extends('layout.index')
@push('before-styles')
<link rel='stylesheet' href="{{asset('css/registration.css')}}">
<style>
  .urlchoice .form-control {
    margin: 0px 15px 0px 14px;
    min-width: 147px;
}
.selectOption {
  list-style-type: none;
  margin: 25px 0 0 0;
  padding: 0;
}

.selectOption li {
  float: left;
  margin: 0 5px 0 0;
  min-width: 162px;
  height: 40px;
  position: relative;
}

.selectOption label,
.selectOption input {
  display: block;
  position: absolute;
  top: 0;
  left: 0;
  right: 0;
  bottom: 0;
}

.selectOption input[type="radio"] {
  opacity: 0.01;
  z-index: 100;
}

.selectOption input[type="radio"]:checked+label,
.Checked+label {
  background: #5D926E;
  color: white;
}

.selectOption label {
  padding: 5px;
  border: 1px solid #CCC;
  cursor: pointer;
  z-index: 90;
  text-align: center;
}

.selectOption label:hover {
  background: #DDD;
}
</style>
@endpush
@section('content')
    <div class="progress">
        <div class="progress-bar bg-success" style="width:66.6%"></div>
    </div><br>
    <div class="container" style="">
      <div class="" style="" id="fourth_form">
        <div class="space140"></div>
                <div class="row">
          <div class="col-sm-6 mob_mb">
            <img src="jpg/vendorlogin5.jpg" id="img">
          </div>

          <div class="col-sm-6 mt" id="second">
            <h1>CATEGORY LIST</h1><br><br>
          <form action="{{route('vendor.post.step4')}}" id="registration_form_fourth"  method="POST"  enctype="multipart/form-data">
            @csrf
            {{-- <label class="font-weight-bold"> Select the option</label>
            <div class="urlchoice d-inline-flex pb-3">
              <ul class="selectOption">
                <li>
                  <input type="radio" id="instagram" name="chooseurl"  value="instagram"/>
                  <label for="instagram" class="rounded-pill">Instagram URL</label>
                </li>
                <li>
                  <input type="radio" id="website" name="chooseurl" value="website"/>
                  <label for="website" class="rounded-pill">Website URL</label>
                </li>
                <li>
                  <input type="radio" id="upload" name="chooseurl" value="upload"/>
                  <label for="upload" class="rounded-pill">Upload Files</label>
                </li>
              </ul>
            </div> --}}
            <div class="div_input instagram d-none">
              <label class="font-weight-bold">Enter Instagram url</label>
              <input type="text" id="instagram_url" name="instagram_url" value="{{ session()->get('register.instagram_url') }}"  class="cust_name w-100 mb-5" style=""><br>
            </div>
            <div class="div_input website d-none">
              <label class="font-weight-bold">Enter Website Url</label>
              <input type="text" id="website_url" name="website_url" value="{{ session()->get('register.website_url') }}"  class="cust_name w-100 mb-5" style=""><br>
            </div>
            <div class="div_input upload d-none">
              <label class="font-weight-bold">Upload Pics</label>
              <input type="file" id="upload_pics" name="upload_pics[]" multiple accept="image/*"  class="cust_name w-100 mb-5" style="" ><br>
            </div>
                <b>Products Category</b><br>
                  <div class="dropdown" multiple="multiple">
                    <button class="btn btn-default dropdown-btn dropdown-toggle w-100" type="button" id="dropdownMenu1" data-toggle="dropdown"  aria-haspopup="true" aria-expanded="true" style="width: 65%; border: 1px solid white;box-shadow: 0px 1px 8px rgba(0, 0, 0, 0.2);">
                      Select your products
                      <span class="caret"></span>
                    </button>
                    <ul class="dropdown-menu multi-level" style="" class="" role="menu" aria-labelledby="dropdownMenu" >
                            <li class="dropdown-submenu">Skin Care
                                <ul class="dropdown-menu" >
                                <li ><input type="checkbox" name="cat[]" value="Body wash"> Body wash</li>
                                <li><input type="checkbox" name="cat[]" value="Face wash"> Face wash</li>    
                                <li><input type="checkbox" name="cat[]" value="Scrubs"> Scrubs</li>
                                <li><input type="checkbox" name="cat[]" value="Lotions & Creams"> Lotions & Creams</li>
                                <li><input type="checkbox" name="cat[]" value="Oils"> Oils</li>
                                <li><input type="checkbox" name="cat[]" value="Soaps"> Soaps</li>
                                <li><input type="checkbox" name="cat[]" value="Face Packs"> Face Packs</li> 
                              </ul>

                            </li>

                            <li class="dropdown-submenu">Hair Care
                                <ul class="dropdown-menu" >
                                <li ><input type="checkbox" name="cat[]" value="Shampoos & Shampoo Bars"> Shampoos & Shampoo Bars</li>
                                <li><input type="checkbox" name="cat[]" value="Conditioners"> Conditioners</li>    
                                <li><input type="checkbox" name="cat[]" value="Hair Oils"> Hair Oils</li>
                                <li><input type="checkbox" name="cat[]" value="Hair Serum"> Hair Serum</li>
                                <li><input type="checkbox" name="cat[]" value="Hair Packs"> Hair Packs</li>
                              </ul>

                            </li>

                            <li class="dropdown-submenu">Wellness
                              <ul class="dropdown-menu" style="">
                                <li><input type="checkbox" name="cat[]" value="Essential Oils"> Essential Oils</li>
                                <li><input type="checkbox" name="cat[]" value="Food Products"> Food Products</li>    
                              </ul>
                            </li>
                            <li class="dropdown-submenu"><input type="checkbox" name="cat[]" value="others"> Others</li>
                      </ul>
                  </div><br><br>
                <b>Address</b><br>
                <textarea type="text" id="product_address" name="product_address" cols="40" rows="4" class="w-100" style="" value="{{ session()->get('register.product_address') }}" required></textarea><br><br>
                <label>Billing address as stated in GST Certificate</label><br><br>
                  <div class="text-center d-block mb-5">
                  <a id="fourth_next" class="btn second" style=""><span class="material-icons">
                    east
                    </span></a>
                  </div>
              </form>
          </div>
        </div>

      </div><!--forth step end-->
    </div>
@endsection
@push('before-scripts')
<script>
    //collect div
  
    var instagram_input = jQuery('.instagram').html();
    var website_input = jQuery('.website').html();
    var upload_input = jQuery('.upload').html();

console.log(instagram_input);
    jQuery('input[type="radio"]').click(function(){
      var option = jQuery(this).val();
      
        if(option =="instagram"){
          jQuery('.instagram').removeClass('d-none');
          jQuery('.website ,.upload').addClass('d-none');
          
        }else if(option == "website"){
          jQuery('.website').removeClass('d-none');
          jQuery('.instagram ,.upload').addClass('d-none');
          

        }
        else if(option == "upload"){
          jQuery('.upload').removeClass('d-none');
          jQuery('.instagram,.website').addClass('d-none');
        

        }
    });

    var instagram_url = jQuery('#instagram_url');

    instagram_url.focusout(function(){
      var instagram_val = jQuery('input[name="instagram_url"]').val();
      if(instagram_val.indexOf("instagram.com")>-1){
        console.log('success');
      }else{
        swal({
        title: instagram_val ,
        text: "Please Add Valid Instagram url.",
        type: "warning",
        showCancelButton: false,
        confirmButtonColor: "#5D926E",
        confirmButtonClass: "btn-danger",
        confirmButtonText: "Okay",
        closeOnConfirm: false
        });
        jQuery('input[name="instagram_url"]').val("");
      }
     
    });

</script>
@endpush

