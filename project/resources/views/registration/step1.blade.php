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
        <div class="progress" >

  <div id="first_p_bar" class="progress-bar bg-success" style="width:33.3%"></div>
  <div id="second_p_bar" class="progress-bar bg-success d-none" style="width:44.4%"></div>
  <div id="third_p_bar" class="progress-bar bg-success d-none" style="width:55.5%"></div>
  <div id="fourth_p_bar" class="progress-bar bg-success d-none" style="width:66.6%"></div>
  <div id="fifth_p_bar" class="progress-bar bg-success d-none" style="width:77.7%"></div>

</div><br>

      <div class="container" style="">
        @if ($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif
      <form id="registration_form_first" method="post" action="{{route('post.step1')}}"  enctype="multipart/form-data">
        {{ csrf_field() }}

        <div id="first_form">
          <div class="space140"></div>  

          <h1 style="text-align: center;">YOUR COMPANY CREDENTIAL</h1><br>
          <div class="space140"></div>
          <div class="row">

            <div class="col-sm-6">

              <img src="{{asset('assets/jpg/vendorlogin2.jpg')}}" id="img">

            </div>

            <div class="col-sm-6" id="">
                  
              <div class="" id="first">
                  <h1>Your Brand Name </h1>

                  <br>

                <input type="text" id="brand_name" style="" class="w-heiht" name="brand_name" value="{{ session()->get('register.brand_name') }}" required><br><br>

                <label class="label">(Legal Name-As Listed in your GST Certificate)</label><br><br>
                <div class="check_div">
                  <input type="checkbox" id="checkbox"  name="terms_condition" required> I agree to <a href="#" id="myBtn" class="text-center" data-toggle="modal" data-target="#myModal">Terms & Conditions.</a>
                <br>
                  {{-- <label class="label" style="margin-left: 0px"><svg width="1em" height="1em" viewBox="0 0 16 16" class="bi bi-info-circle" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                    <path fill-rule="evenodd" d="M8 15A7 7 0 1 0 8 1a7 7 0 0 0 0 14zm0 1A8 8 0 1 0 8 0a8 8 0 0 0 0 16z"/>
                    <path d="M8.93 6.588l-2.29.287-.082.38.45.083c.294.07.352.176.288.469l-.738 3.468c-.194.897.105 1.319.808 1.319.545 0 1.178-.252 1.465-.598l.088-.416c-.2.176-.492.246-.686.246-.275 0-.375-.193-.304-.533L8.93 6.588z"/>
                    <circle cx="8" cy="4.5" r="1"/>
                  </svg> Messages can only be sent between 9am to 9pm as restricted by TRAI NCCP regulation. Please Register befor the given timeline.</label> --}}
                  <div class="d-inline-flex mt-2">
                    <label class="label" style="margin-left: 0px"> Messages can only be sent between 9am to 9pm as restricted by TRAI NCCP regulation. Please register between the given timeline.</label>
                  </div>
                  <br><br>
                </div>
                    <!-- Modal content -->
                      <div class="modal fade bd-example-modal-lg" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModallabel" aria-hidden="true">
                        <div class="modal-dialog modal-lg " role="document">
                          <div class="modal-content" style="padding: 40px;">
                              <span class="close"  data-dismiss="modal">&times;</span>
                                <p><center><b>TERMS & CONDITIONS</b></center> <br>PLEASE READ THIS TERMS OF SERVICE AGREEMENT CAREFULLY. BY USING THIS WEBSITE OR ORDERING PRODUCTS FROM THIS WEBSITE YOU AGREE TO BE BOUND BY ALL OF THE TERMS AND CONDITIONS OF THIS AGREEMENT.</p>
                              <p>

                                <li><b>USE OF THE WEB PORTAL</b></li>

                              </p><br>

                              <p>

                                Welcome to www.Allearthy.com (<b>"Site" or "All EARTHY "</b>). The website <a href="#"> www.Allearthy.com</a> is owned and operated by ________________,  _____________________(Entity name  and registered office address)________________________________________________________.<br> 

                              You may be accessing our Site from a computer or mobile phone device (through an iOS or Android application, for example) and these Terms of Use govern your use of our Site and your conduct, regardless of the means of access. These Terms of Use govern all the products offered on the Platform.<br>

                              The Platform is only to be used for your personal non-commercial use and information. Your use of the services and features of the Platform shall be governed by these Terms and Conditions (hereinafter "<b>Terms of Use</b> ") along with the Privacy Policy, Shipping Policy and Cancellation, Refund and Return Policy (together "<b>Policies</b>") as modified and amended from time to time.<br>

                              By mere accessing or using the Platform, you are acknowledging, without limitation or qualification, to be bound by these Terms of Use and the Polices, whether you have read the same or not. <b>ACCESSING, BROWSING OR OTHERWISE USING THE PLATFORM INDICATES YOUR UNCONDITIONAL AGREEMENT TO ALL THE TERMS AND CONDITIONS IN THIS AGREEMENT, SO PLEASE READ THIS AGREEMENT CAREFULLY BEFORE PROCEEDING.</b>          If you do not agree to any of the terms enumerated in the Terms of Use or the Policies, please do not use the Platform. You are responsible to ensure that your access to this Platform and material available on or through it are legal in each jurisdiction, in or through which you access or view the platform or such material.<br>

                              ALL EARTHY reserves the unilateral right to change the particulars contained in the Terms of Use or the Policies from time to time and at any time, without notice to its users and in its sole discretion. If ALL EARTHY decides to change the Terms of Use or Policies, ALL EARTHY will post the new version of the Terms of Use or the Policies on the Site and update the date specified above. Any change or modification to the Terms of Use and the Policies will be effective immediately from the date of such upload of the Terms of Use and Policies on the Site. Your continued use of the Platform following the modifications to the Terms of Use and Policies constitutes your acceptance of the modified Terms of Use and Policies whether or not you have read them. For this reason, you should frequently review these Terms of Use, our Guidelines and Rules and any other applicable policies, including their dates, to understand the terms and conditions that apply to your use of the Site.<br>

                              <b> 2. PRIVACY PROTECTION MEASURES</b><br>

                              We understand the importance of safeguarding your personal information and we have formulated a Privacy Policy, to ensure that your personal information is sufficiently protected. Apart from these Terms of Use, the Privacy Policy shall also govern your visit and use of the Site. Your continued use of the Site implies that you have read and accepted the Privacy Policy and agree to be bound by its terms and conditions. You consent to the use of personal information by ALL EARTHY in accordance with the terms of and purposes set forth in the Privacy Policy, the same may be subject to amendment from time to time at the sole discretion of ALL EARTHY.<br>

                              <b>3. YOUR ACCOUNT</b><br>

                              This Site is directed to be used by adults only. We assume that any minor, if at all, accessing our Site is under the supervision of their guardians. ALL EARTHY or its associates do not knowingly collect information from minors. You will be responsible for maintaining confidentiality of your account, password, and restricting access to your computer, and you hereby accept responsibility for all activities that occur under your account and password. You acknowledge that the information you provide, in any manner whatsoever, are not confidential or proprietary and does not infringe any rights of a third party in whatsoever nature<br>

                              If you are accessing, browsing and using the Site on someone else’s behalf; you represent that you have the authority to bind that person to all the terms and conditions herein. In the event that the person refuses to be bound as the principal to the Terms of Use, you agree to accept liability for any harm caused by any wrongful use of the Site resulting from such access or use of the Site in whatsoever nature<br>

                              If you know or have reasons to believe that the security of your account has been breached, you should contact us immediately at the 'Contact Information' provided below. If we have found a breach or suspected breach of the security of your account, we may require you to change your password, temporarily or permanently block or suspend your account without any liability to ALL EARTHY.<br>

                              We reserve the right to refuse service and/or terminate accounts without prior notice if these Terms of Use are violated or if we decide, in our sole discretion, that it would be in your and ALL EARTHY’s best interests to do so. You are solely responsible for all contents that you upload, post, email or otherwise transmit via the Site. The information provided to us shall be maintained by us in accordance with our Privacy Policy.<br>

                              <b>4. PRODUCT & SERVICES INFORMATION</b><br>

                              ALL EARTHY attempts to be as accurate as possible in the description of the product on the Platform. However, ALL EARTHY does not warrant that the product description, color, information or other content of the Platform is accurate, complete, reliable, current or error-free. The Site may contain typographical errors or inaccuracies and may not be complete or current. The product pictures are indicative and may not match the actual product.<br>

                              ALL EARTHY reserves the right to correct, change or update information, errors, inaccuracies or omissions at any time (including after an order has been submitted) without prior notice. Please note that such errors, inaccuracies or omissions may also relate to pricing and availability of the product or services.<br>

                              <b>5. PRODUCT USE</b><br> 

                              The products and services available on the Platform, are for your personal and/or professional use only. The products or samples thereof, which you may receive from us, shall not be sold or resold for any/commercial reasons.<br>

                              In case any products or beauty services purchased / received / availed causes side effects or doesn’t suit you, please note that ALL EARTHY is in no manner responsible for any manufactural side-effects and manufacturer of the product or shall be solely responsible for such side effects and consumer complaints. You should carefully read the individual terms and conditions in relation to the products and consult a specialist before the use of the same.<br>

                              <b>6. RECOMMENDATION OF THE PRODUCT</b><br>

                              Any recommendation made to you in the Site during the course of your use of the Site is purely for informational purposes and for your convenience and does not amount to endorsement of the product by ALL EARTHY or any of its associates in any manner.<br>

                              <b>7. PRICING INFORMATION</b><br>

                              ALL EARTHY strives to provide accurate product and pricing information, however errors may occur.<br>

                              ALL EARTHY cannot confirm the price of the product until you make the order. Without limiting the generality of Clause 8 (Cancellations, Refunds and Returns) below, if a product  is listed at an incorrect price or with incorrect information due to any technical error, ALL EARTHY shall have the right, at its sole discretion, to refuse or cancel any orders placed for that product, unless the product has already been delivered or the service has already been availed by you. In the event that an item is wrongly priced, ALL EARTHY may, at its discretion, either contact you for instructions or cancel your order and notify you of such cancellation. Unless the product ordered by you has been delivered , your offer will not be deemed accepted and ALL EARTHY will have the right to modify the price of the product/ service and contact you for further instructions using the e-mail address provided by you during the time of registration or placing of order, or cancel the order and notify you of such cancellation. In the event that ALL EARTHY accepts your order the same shall be debited to your credit card/ debit card account and duly notified to you by email that the payment has been processed. The payment may be processed prior to ALL EARTHY’s dispatch of the product that you have ordered. If we have to cancel the order after we have processed the payment, the said amount will be reversed to your credit / debit card account.<br><b>PRICES AND AVAILABILITY OF THE PRODUCTS PROVIDED OR OFFERRED ON THE SITE ARE SUBJECT TO CHANGE WITHOUT PRIOR NOTICE AND AT THE SOLE DISCRETION OF ALL EARTHY.</b> ALL EARTHY may revise and cease to make available any product at any-time. In the event, ALL EARTHY is unable to deliver the product to you on time or at all, you will be notified by an e-mail and your order will be automatically cancelled due to unavailability of the product or at your instructions due to failure to deliver the product on the expected time of delivery by our delivery partners. ALL EARTHY shall not be liable to pay for any damages in such an event owing to cancellation of the order or delay in delivery.<br>

                              <b>8. CANCELLATIONS, REFUNDS AND RETURNS</b><br>

                              Please refer to our Cancellation, Refunds and Returns Policy provided on our Site.<br>

                              <b>9. MODE OF PAYMENT</b><br>

                              Payments for the products available on the Site may be made in the following ways:<br>

                              <ul><li>Payments can be made by Credit Cards, Debit Cards, Net Banking, Wallets.</li><li>

                              Credit card, Debit Card and Net Banking payment options are instant payment options and recommended to ensure faster processing of your order.</li>

                              <li>Cash on Delivery option is not available for orders outside India.</li></ul><br>

                              <b>10. SHIPPING AND DELIVERY</b>

                              <p>Please refer to our <u>Shipping and Delivery</u> Policy provided on our Site, as amended from time to time.</p>



                              </p>
                          </div>
                        </div>
                    </div>
                  <div class="mb-5 text-center">
                  
                    <a id="first_next" class="btn second disabled" style=""  disabled><span class="material-icons">
                      east
                      </span></a>
                  </div>
                </form>
            </div>
            </div>
          </div>
        </div><!--first step end-->
      </div><!--container end-->
    </body>
    </html>
 <script>
        // Get the modal
        var modal = document.getElementById("myModal");
        // Get the button that opens the modal
        var btn = document.getElementById("myBtn");
        // Get the <span> element that closes the modal
        var span = document.getElementsByClassName("close")[0];
        // When the user clicks the button, open the modal 
        btn.onclick = function() {
          modal.style.display = "block";
        }
        // When the user clicks on <span> (x), close the modal
        span.onclick = function() {
          modal.style.display = "none";
        }
        // When the user clicks anywhere outside of the modal, close it
        
        window.onclick = function(event) {
        
          if (event.target == modal) {
        
            modal.style.display = "none";
        
          }
        
        }

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

      $('#mobile_otp').keyup(function(e)
                                      {
        if (/\D/g.test(this.value))
        {
          // Filter non-digits from input value.
          this.value = this.value.replace(/\D/g, '');
        }
      });

</script>
    