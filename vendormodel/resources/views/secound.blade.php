<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Registration</title>

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
        <style>
           
#first{
  top:150px;

}
#body{

  height: 100%;
font-family: 'Josefin Sans', sans-serif;
}
#img{
  width: 95%;
  height: 100%;
}

        </style>
<script>
      $(document).ready(function() {
         function disablePrev() { window.history.forward() }
         window.onload = disablePrev();
         window.onpageshow = function(evt) { if (evt.persisted) disableBack() }
      });
   </script>
    </head>
    <body id="body">
           <div class="progress" >
  <div class="progress-bar bg-success" style="width:22.2%"></div>
</div><br>
      <div class="container" style="margin-top: 40px;">
          <div class="row">
            <div class="col-sm-7" id="first">
              <form action="third">
              <h1>REQUIRED DOCUMENT</h1>
              <br>
              <h4>We require following document for</h4>
              <h4>Vendor Registration</h4>
              <br>
              <ul>
                  <li>Pan Card</li>
                  <li>GST Registration Certificate</li>
                  <li>Shop Establishment Number</li>
                  <li>Aadhaar Card of Owner</li>
              </ul>
              <button class="btn btn-success" style="margin-left: 100px; margin-top: 25px; width: 90px;" >Next111</button>
              </form>
            </div>

            <div class="col-sm-5">
              <img src="vendorlogin0.jpg" id="img">
            </div>
          </div>
        </div>
    </body>
</html>
