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
		  <li class="active">Add Product</li>
		</ol>
		<!--breadcrum end-->
	
		<div class="section"> 

			<form action="{{ route('admin-add_product_submit') }}" method="post" enctype="multipart/form-data">
				@csrf
			<div class="pmd-card pmd-z-depth">
				<div class="pmd-card-body">

					<div class="group-fields clearfix row">
						<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
							<div class="lead">ADD PRODUCT</div>
						</div>
					</div>

					<div class="group-fields clearfix row">

						<div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
							<div class="form-group pmd-textfield">
								<label for="name" class="control-label">Product Name *</label>
								<input type="text" name="name" id="name" class="form-control" placeholder="Product Name" required>
							</div>
						</div>

						<div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
							<div class="form-group pmd-textfield">
								<label for="description" class="control-label">Description</label>
								<input type="text" name="description" id="description" class="form-control" placeholder="Product Description">
							</div>
						</div>

						<div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
							<div class="form-group pmd-textfield">
								<label for="mrp" class="control-label">Product MRP (₹) *</label>
								<input type="number" name="mrp" id="mrp" class="form-control" placeholder="₹" min="0" oninput="this.value = Math.abs(this.value)" required>
							</div>
						</div>

						<div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
							<div class="form-group pmd-textfield">
								<label for="discount" class="control-label">Product Discount (₹) *</label>
								<input type="number" name="discount" id="discount" class="form-control" placeholder="₹" oninput="this.value = Math.abs(this.value)"  min="0" required>
							</div>
						</div>


						<div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
							<div class="form-group pmd-textfield">
								<label for="price" class="control-label">Product Price (₹) *</label>
								<input type="number" name="price" id="price" class="form-control" placeholder="₹"  oninput="this.value = Math.abs(this.value)" min="0" readonly>
							</div>
						</div>


						<div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
							<div class="form-group pmd-textfield">
								<label for="regular1" class="control-label">Product Image ( jpg / png )</label>
								<input type="file" name="image" id="image" class="dropify-image" data-max-file-size="1M" accept=".jpg,.jpeg,.png" onchange="return fileValidation()" required/>
                                <div id="imagePreview" style="padding-top: 5px;"></div>
							</div>
						</div>						


						<div class="pmd-card-actions col-lg-12 col-md-12 col-sm-12 col-xs-12">
							<p align="right">
							<button type="submit" class="btn pmd-ripple-effect btn-danger" name="submit">Submit</button>
							<a href="{{ route('admin-product') }}" class="btn pmd-ripple-effect btn-info">Cancel</a>
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
<script type="text/javascript">
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
  $('#mrp').on('keyup', function() {
   var value2 = $("#mrp").val();
   var value1 = $("#discount").val();
   var total = parseFloat(value2)-parseFloat(value1);
   $("#price").val(total); 
  });
  $('#discount').on('keyup', function() {
  	if($("#mrp").val()<$("#discount").val()){
  		$("#discount").val($("#mrp").val());
  	}
   var value2 = $("#mrp").val();
   var value1 = $("#discount").val();
   var total = parseFloat(value2)-parseFloat(value1);
   $("#price").val(total); 
  });
</script>
@endsection