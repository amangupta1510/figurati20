@extends('layout/vendor_dashboard')
@section('page')
<!--content area start-->
<div id="content" class="pmd-content content-area dashboard">

	<!--tab start-->
	<div class="container-fluid full-width-container">
		<h1></h1>
			
		<!--breadcrum start-->
		<ol class="breadcrumb text-left">
		  <li><a href="{{ route('admin-dashboard') }}">Dashboard</a></li>
		  <li class="active">Add Distributer</li>
		</ol>
		<!--breadcrum end-->
	
		<div class="section"> 

			<form action="{{ route('admin-add_distributer_submit') }}" method="post" enctype="multipart/form-data">
				@csrf
			<div class="pmd-card pmd-z-depth">
				<div class="pmd-card-body">

					<div class="group-fields clearfix row">
						<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
							<div class="lead">ADD DISTRIBUTER</div>
						</div>
					</div>

					<div class="group-fields clearfix row">

						<div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
							<div class="form-group pmd-textfield">
								<label for="name" class="control-label">Distributer Name *</label>
								<input type="text" name="name" id="name" class="form-control" placeholder="Distributer Name" required>
							</div>
						</div>

						<div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
							<div class="form-group pmd-textfield">
								<label for="contact" class="control-label">Contact *</label>
								<input type="number" name="contact" id="contact" class="form-control" placeholder="Contact" onblur="checkMobile(this.value)" required>
							</div>
						</div>

						<div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
							<div class="form-group pmd-textfield">
								<label for="email" class="control-label">Email *</label>
								<input type="email" name="email" id="email" class="form-control" placeholder="someone@example.com" maxlength="255" onblur="checkEmail(this.value)" required>
							</div>
						</div>


						<div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
							<div class="form-group pmd-textfield">
								<label for="address" class="control-label">Address *</label>
								<input type="text" name="address" id="address" class="form-control" placeholder="Distributer Address" required>
							</div>
						</div>

						<div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
							<div class="form-group pmd-textfield">
								<label for="regular1" class="control-label">Distributer Image ( jpg / png )</label>
								<input type="file" name="image" id="image" class="dropify-image" data-max-file-size="1M" accept=".jpg,.jpeg,.png"onchange="return fileValidation()" required="" />
                                <div id="imagePreview" style="padding-top: 5px;"></div>
							</div>
						</div>						


						<div class="pmd-card-actions col-lg-12 col-md-12 col-sm-12 col-xs-12">
							<p align="right">
							<button type="submit" class="btn pmd-ripple-effect btn-danger" name="submit">Submit</button>
							<a href="{{ route('admin-distributer') }}" class="btn pmd-ripple-effect btn-info">Cancel</a>
							</p>
						</div>						

						</div>

				</div>

			</div> <!-- section content end -->  
			</form>
		</div>
			
	</div><!-- tab end -->

</div>
@endsection
@section('js')
<script>        
	function fileValidation(){
    var fileInput = document.getElementById('image');
    var filePath = fileInput.value;
    var allowedExtensions = /(\.jpg|\.jpeg|\.png)$/i;
    if(!allowedExtensions.exec(filePath)){
        alert("Only jpg/jpeg and png files are allowed!");
        document.getElementById('imagePreview').innerHTML = '';
        fileInput.value = '';
        return false;
    }else{
        //Image preview
        if (fileInput.files && fileInput.files[0]) {
            var reader = new FileReader();
            reader.onload = function(e) {
                document.getElementById('imagePreview').innerHTML = '<img src="'+e.target.result+'" width="100"/>';
            };
            reader.readAsDataURL(fileInput.files[0]);
        }
    }
}
function checkEmail(str)
{
    var re = /^(([^<>()[\]\\.,;:\s@\"]+(\.[^<>()[\]\\.,;:\s@\"]+)*)|(\".+\"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/;
    if(!re.test(str))
    alert("Please enter a valid email address");
    $('#email').val("");
}
function checkMobile(str)
{
   var length = str.length;
       if(length < 10 && length != 0) {
          alert("Please enter a valid Contact Number");
       }
  }
         $(document).ready(function () {
      $("#contact").keypress(function (e) {
         var length = $(this).val().length;
       if(length > 9) {
            return false;
       } else if(e.which != 8 && e.which != 0 && (e.which < 48 || e.which > 57)) {
            return false;
       } else if((length == 0) && (e.which == 48)) {
            return false;
       }
      });
    });
       </script>
@endsection