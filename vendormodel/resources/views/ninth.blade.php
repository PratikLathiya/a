<!DOCTYPE html>

<html>

<head>

	<title>Congratulations Registration Successfull !</title>

	 <meta charset="utf-8">

        <meta name="viewport" content="width=device-width, initial-scale=1">
		<title>Registration</title>
	<link rel="icon"  type="image/x-icon" href="{{asset('/images/all-earthy-icon-main.png')}}"/>
		
        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Nunito:200,600" rel="stylesheet">
        <!-- CSS only -->
		<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css" integrity="sha384-9aIt2nRpC12Uk9gS9baDl411NQApFmC26EwAOH8WgZl5MYYxFfc+NcPb1dKGj7Sk" crossorigin="anonymous">



<!-- JS, Popper.js, and jQuery -->

<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>

<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>

<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js" integrity="sha384-OgVRvuATP1z7JjHLkuOU7Xw704+h835Lr+6QL9UvYjZE3Ipu6Tp75j7Bh/kR0JKI" crossorigin="anonymous"></script>

<link href="https://fonts.googleapis.com/css2?family=Josefin+Sans:ital,wght@0,200;0,300;0,400;0,423;0,700;1,200;1,300;1,400;1,423;1,600;1,700&display=swap" rel="stylesheet">

<style type="text/css">

#body{

height: 100vh;

background-image:url({{url('jpg/vendorlogin8.jpg')}});

font-family: 'Josefin Sans', sans-serif;
background-size: cover;
/* background-repeat: no-repeat; */

}
.padding{
	padding-top:  225px;
}
@media (min-width:320px) and (max-width:420px){
.padding {
    /* padding-top: 127px; */
}
h1{
	font-size: 25px
}
#body{
	background-repeat: repeat;
	background-size: inherit;
	background-position-y: 17px;
}
}

@media (width:1280px){
	#body{
    background-size: inherit;
    background-repeat: no-repeat;
    background-position-x: 44%;
	}
}
@media(min-width:768px) and (max-width:1024px){
	#body{
		    background-repeat: repeat-y;
	}
}
.btn-success{
	background: #5D926E!important;
}
</style>

 <script type="text/javascript"> 

        window.history.forward(); 

        function noBack() { 

            window.history.forward(); 

        } 

    </script> 

<script type="text/javascript">

	function closeForm() {

  		document.getElementsById("popUpMain").style.display = "none";

  	}

</script>



</head>

<body id="body">
   <div class="progress">
  		<div class="progress-bar bg-success" style="width:100%"></div>
   </div>
	<br>
	<div class="padding text-center" style="">
		<h1>THANK YOU!</h1>
		<h1>WE HAVE RECEIVED YOUR REQUEST.</h1>
		<h1>WE SHALL</h1>
		<h1>GET BACK TO YOU SOON</h1><br><br>
		<a href="home" style="color: white;"><button class="btn btn-success"  onclick="closeForm()">Home</button></a>

	</div>

</body>

</html>