@extends('layout.index')
@push('before-styles')
<style>

  @media (min-width:320px) and (max-width:420px){

   p.avatar.rounded-circle {
    top: -14px;
  } 
  .mb{
    margin-bottom: 15px;
  }
}


#body{
  height: 100%;
  font-family: 'Josefin Sans', sans-serif;
  background-image:url({{url('jpg/vendorlogin1.jpg')}});
background-size: cover;

}
.avatar {
/* border: 0.3rem solid rgba(#fff, 0.3); */
/* margin-top: -6rem; */
/* margin-bottom: 1rem; */
position: relative;
  top: -4rem;
  max-width: 6rem;
  background-color: #A9786D;
  font-size: 40px;
  color: white;
  text-align: center;
  margin: auto;
  height: 90px;
  padding: 17px;

}
.card-body {
  min-height: 296px;
}

.card{
/* width: 330px; */
border-radius: 12px;
box-shadow: 0 0 4px 4px #0000000d;
}
.mg-top{
margin-top:5%;
}
.heading h2{
text-align: center; 
font-size:50px;
}
.heading span{
display: block;
text-align: center;
font-size: 25px;
}
.mt-10{
margin-top: 10%;
}
.heading_2{
margin-top: 53px;font-size: 30px;
}
.btn_next{
margin-top: 30px; width: 90px;color: white;
background: #5D926E;
border-radius: 27px;
}
a.btn.btn_next span {
padding-top: 9px;
}
@media (width:768px){
.card {
  min-height: 318px;
}
}
button#go_register {
  text-align: center;
  padding: 9px 27px;
  background: #5d926e;
  color: white;
  border: none;
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
.close{
text-align: right;
}
ul li{
list-style:unset;
padding: 9px;
}
@media(min-width:320px) and (max-width:420px){
button#go_register{
  padding: 9px 19px;
}
}
@media (width:1366px) and (height:728px){
.heading_2 {
  margin-top: 25px;

}
.card-body {
  min-height: 272px;
}

}
@import url('https://fonts.googleapis.com/css2?family=Josefin+Sans:wght@100;300;423;600&display=swap');
</style>
@endpush
@section('content')
    

  <div class="progress">
        <div class="progress-bar bg-success" style="width:11.1%"></div>
      </div><br>
      <div class="container" style="">

        <div class="heading">
          <h2>Jazz up your brand</h2>
          <span>Here's what we offer</span>
        </div>
        <div class="row mt-10" style="">
          <div class="col-md-4 mb">
            <div class="card" >

              <div class="card-body text-center">

                <p class="avatar rounded-circle">1.</p>
                <h4><b>PHOTOSHOOTS</b></h4>
              <h5>  <p class="card-text">Bring out your passion filled
                products for some camera sessions. We may ask them to remain still. ;) </p></h5>

              </div>
            </div>
          </div>

          <div class="col-md-4 mb">
            <div class="card" >

              <div class="card-body text-center">

                <p class="avatar rounded-circle">2.</p>
                <h4><b>PROMOTIONS</b></h4>
               <h5> <p class="card-text" style="height: 70px;">Now, who keeps those
                  (es)sensuals in a box? Lets put them up on our grid.                                               
                </p></h5>

              </div>

            </div>

          </div>
          <div class="col-md-4 mb">
            <div class="card">

              <div class="card-body text-center">

                <p class="avatar rounded-circle">3.</p>
               <h4> <b>PEOPLE</b></h4>
                <h5><p class="card-text">Oh well! You know hoomans. 
                  Let's endorse sensuality to them. Argh! You know they need to learn [rolls eyes].
                </p></h5>

              </div>
            </div>
          </div>
        </div>
        <div class="become_section text-center mb">
          <p class="heading_2" style="">Become Our Vendor</p>

          <a href="" id="openModal" data-toggle="modal" data-target="#require_doc_model" style="" class="btn btn_next" style=""><span class="material-icons">
            east
          </span>
        </a>
        
        </div>
      </div>
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
    </div>
  @endsection
  @push('before-scripts')
  <script>
  
    $(document).ready(function(){
        $('#go_register').click(function(){
          goRegister();
          })
        console.log('hi');
        function goRegister(){
          
            window.location.href = "{{route('vendor.step1')}}";
            console.log('reg');
        }
      })
      </script>
  @endpush