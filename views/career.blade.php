@extends('main')

@section('css')

<link rel="stylesheet" href="css/style.css" type="text/css" media="all" /> <!-- Style-CSS --> 
<link rel="stylesheet" href="css/font-awesome.css"> <!-- Font-Awesome-Icons-CSS -->

<link href="//fonts.googleapis.com/css?family=Raleway:100,100i,200,200i,300,300i,400,400i,500,500i,600,600i,700,700i,800,800i,900,900i&amp;subset=latin-ext" rel="stylesheet">


  @endsection



@section('body')

  
  

<nav class="breadcrumb" aria-label="breadcrumbs">
 <div class="container-bg"> 
  
  <h1>Career</h1>
  <a href="{{ route('index') }}" title="Back to the frontpage">Home</a>

  <span aria-hidden="true" class="breadcrumb__sep">&#47;</span>
  <span>Career</span>

  
 </div>  
</nav>
    
  <div class="center-container" style="padding-top: 300px;  background-image:url('s/files/1/0439/1806/5814/files/img-1_45e266d5-e9e4-43a3-9131-8a6547720ae0e977.png?v=1595330357'); background-repeat:no-repeat;background-position:left ;" >
		<div class="main-content-agile">
			<div class="wthree-pro">
				<h2>Fill the form to Apply</h2>
			</div>
			<div class="sub-main-w3">	
				<form action="{{ route('career_enquiry') }}" method="post">
					@csrf
					<input placeholder="First Name" name="first_name" type="text" required="">
					<span ><i  aria-hidden="true"></i></span>
					<input placeholder="Last Name" name="last_name" type="text" required="">
					<span ><i  aria-hidden="true"></i></span>
					<input placeholder="E-mail" name="email" type="email" required="">
					<span ><i aria-hidden="true"></i></span>
					<input  placeholder="Phone Number" name="contact" type="tel" required="">
					<span ><i aria-hidden="true"></i></span>
					<input  placeholder="Location" name="location" type="text" required="">
					<span ><i  aria-hidden="true"></i></span>
					<input  placeholder="Interested Profile" name="interest" type="text" required="">
					<span ><i  aria-hidden="true"></i></span>
					<input  placeholder="Link of C.V." name="link" type="text" required="">
					<span ><i  aria-hidden="true"></i></span>
					
					<input type="submit" value="Apply">
				</form>
			</div>
		</div>

	</div>



  <div class="wrap-overlay"></div>

    @endsection


   @section('js')
   

   <script type="application/x-javascript"> addEventListener("load", function() { setTimeout(hideURLbar, 0); }, false);
function hideURLbar(){ window.scrollTo(0,1); } </script>

 @endsection

