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
		  <li class="active">Add Order</li>
		</ol>
		<!--breadcrum end-->
	
		<div class="section"> 

			<form action="{{ route('admin-add_order_submit') }}" method="post" enctype="multipart/form-data">
				@csrf
				<input type="hidden" name="p_name" id="p_name" required>
				<input type="hidden" name="lot_no" id="lot_no" required>
				<input type="hidden" name="remain_unit" id="remain_unit" required>
				<input type="hidden" name="d_name" id="d_name" required>
				<input type="hidden" name="d_contact" id="d_contact" required>
				<input type="hidden" name="d_email" id="d_email" required>
				<input type="hidden" name="d_address" id="d_address" required>
							<div class="pmd-card pmd-z-depth">
				<div class="pmd-card-body">

					<div class="group-fields clearfix row">
						<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
							<div class="lead">ADD ORDER</div>
						</div>
					</div>

					<div class="group-fields clearfix row">

						<div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
							<div class="form-group pmd-textfield">       
								<label>Select Product *</label>
								<select class="select-with-search form-control pmd-select2" name="p_id" id="p_id" required>
									<option value=""></option>
									@foreach($products as $c)
									<option value="{{$c->id}}" data-name="{{$c->name}}">{{$c->name}}</option>
									@endforeach
								</select>
							</div>
						</div>

						<div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
							<div class="form-group pmd-textfield">       
								<label value="">Select Batch *</label>
								<select class="select-with-search form-control pmd-select2" name="lot_id" id="lot_id" required>
								<option value=""></option>
								</select>
							</div>
						</div>

						<div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
							<div class="form-group pmd-textfield">       
								<label>Select Distributer *</label>
								<select class="select-with-search form-control pmd-select2" name="d_id" id="d_id" required>
									<option value=""></option>
									@foreach($distributers as $c)
									<option value="{{$c->id}}" data-name="{{$c->name}}" data-contact="{{$c->contact}}" data-email="{{$c->email}}" data-address="{{$c->address}}">{{$c->name}}</option>
									@endforeach
								</select>
							</div>
						</div>

                        <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
							<div class="form-group pmd-textfield">
								<label for="total_unit" class="control-label">Quantity*</label>
								<input type="number" name="total_unit" id="total_unit" min="0" class="form-control" oninput="this.value = Math.abs(this.value)" required>
							</div>
						</div>
						<div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
							<div class="form-group pmd-textfield">
								<label for="selling_time" class="control-label">Selling Time *</label>
								<input type="datetime-local" name="selling_time" id="selling_time" class="form-control" placeholder="Selling Time" required>
							</div>
						</div>

						<div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
							<div class="form-group pmd-textfield">       
								<label value="">Payment Method *</label>
								<select class="select-with-search form-control pmd-select2" name="payment_method" id="payment_method" required>
								<option value=""></option>
								<option value="Cash">Cash</option>
								<option value="Card">Card</option>
								<option value="Cheque">Cheque</option>
								<option value="DD">DD</option>
								<option value="Online Payment">Online Payment</option>
								<option value="UPI">UPI</option>
								</select>
							</div>
						</div>

						<div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
							<div class="form-group pmd-textfield">       
								<label value="">Payment Status *</label>
								<select class="select-with-search form-control pmd-select2" name="payment_status" id="payment_status" required>
								<option value=""></option>
								<option value="Completed">Completed</option>
								<option value="Due">Due</option>
								<option value="Partially Due">Partially Due</option>
								</select>
							</div>
						</div>
						<div class="col-lg-6 col-md-6 col-sm-6 col-xs-12 completed_payment" style="display: none;">
							<div class="form-group pmd-textfield">
								<label for="completed_payment" class="control-label">Completed Payment (₹) *</label>
								<input type="number" name="completed_payment" id="completed_payment" min="0" oninput="this.value = Math.abs(this.value)" class="form-control" value="0" placeholder="₹" required>
							</div>
						</div>
						<div class="col-lg-6 col-md-6 col-sm-6 col-xs-12 due_payment" style="display: none;">
							<div class="form-group pmd-textfield">
								<label for="due_payment" class="control-label">Due Payment (₹) *</label>
								<input type="number" name="due_payment" id="due_payment" min="0" oninput="this.value = Math.abs(this.value)" class="form-control" value="0" placeholder="₹" required>
							</div>
						</div>

						<div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
							<div class="form-group pmd-textfield">
								<label for="unit_mrp" class="control-label">Unit MRP (₹) *</label>
								<input type="number" name="unit_mrp" id="unit_mrp" min="0" oninput="this.value = Math.abs(this.value)" class="form-control" placeholder="₹" required>
							</div>
						</div>

						<div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
							<div class="form-group pmd-textfield">
								<label for="unit_discount" class="control-label">Unit Discount (₹) *</label>
								<input type="number" name="unit_discount" id="unit_discount" min="0" oninput="this.value = Math.abs(this.value)" class="form-control" placeholder="₹" required>
							</div>
						</div>


						<div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
							<div class="form-group pmd-textfield">
								<label for="unit_price" class="control-label">Unit Price (₹) *</label>
								<input type="number" name="unit_price" id="unit_price" class="form-control" min="0" oninput="this.value = Math.abs(this.value)" placeholder="₹" readonly="true">
							</div>
						</div>

						<div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
							<div class="form-group pmd-textfield">
								<label for="total_mrp" class="control-label">Total MRP (₹) *</label>
								<input type="number" name="total_mrp" id="total_mrp" class="form-control" min="0" oninput="this.value = Math.abs(this.value)" placeholder="₹" readonly="true">
							</div>
						</div>

						<div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
							<div class="form-group pmd-textfield">
								<label for="total_discount" class="control-label">Total Discount (₹) *</label>
								<input type="number" name="total_discount" id="total_discount" class="form-control" min="0" placeholder="₹" readonly="true">
							</div>
						</div>

						<div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
							<div class="form-group pmd-textfield">
								<label for="special_discount" class="control-label">Special Discount (₹)</label>
								<input type="number" name="special_discount" id="special_discount" class="form-control" min="0" oninput="this.value = Math.abs(this.value)" value="0" placeholder="₹" required>
							</div>
						</div>

						<div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
							<div class="form-group pmd-textfield">
								<label for="total_price" class="control-label">Total Price (₹) *</label>
								<input type="number" name="total_price" id="total_price" class="form-control" min="0" oninput="this.value = Math.abs(this.value)" placeholder="₹" readonly="true">
							</div>
						</div>


						
						<div class="pmd-card-actions col-lg-12 col-md-12 col-sm-12 col-xs-12">
							<p align="right">
							<button type="submit" class="btn pmd-ripple-effect btn-danger" name="submit">Submit</button>
							<a href="{{ route('admin-order') }}" class="btn pmd-ripple-effect btn-info">Cancel</a>
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
$('#p_id').on('change',function() {
    var loading = document.getElementById('loading');
    loading.style.display=''; 
    var img ="{{ route('admin-get_lot',['id'=>':page']) }}";
    var img = img.replace('%3Apage',$(this).val());
    $.get(img,function(data){
          $('#lot_id').empty().html('<option value=""></option>');
          for(var i=0; i<data.length;i++){
          	if(parseInt(data[i].remain_unit)>0){
              $('#lot_id').append('<option value="'+data[i].id+'" data-no="'+data[i].lot_no+'" data-unit="'+data[i].unit+'" data-mrp="'+data[i].lot_mrp+'" data-discount="'+data[i].lot_discount+'" data-price="'+data[i].lot_price+'" data-remain_unit="'+data[i].remain_unit+'">'+data[i].lot_no+ '  (Avl Qty :'+data[i].remain_unit+')</option>');
            }
          }
    })
    $("#loading").fadeOut(500);
    var selected = $(this).find('option:selected');
    $('#p_name').val(selected.data('name'));   
     calculate();
});
$('#lot_id').on('change',function() {
	var selected = $(this).find('option:selected');
    $('#unit_mrp').val(parseFloat(selected.data('mrp'))/parseInt(selected.data('unit')));
    $('#unit_discount').val(parseFloat(selected.data('discount'))/parseInt(selected.data('unit')));
    $('#unit_price').val(parseFloat(selected.data('price'))/parseInt(selected.data('unit')));
    $('#lot_no').val(selected.data('no'));
    $('#remain_unit').val(selected.data('remain_unit'));
    $('#total_unit').attr('max',selected.data('remain_unit'));
     calculate();
});

$('#d_id').on('change',function() {
	var selected = $(this).find('option:selected');
    $('#d_name').val(selected.data('name'));
    $('#d_contact').val(selected.data('contact'));
    $('#d_email').val(selected.data('email'));
    $('#d_address').val(selected.data('address'));
});
$('#payment_status').on('change',function() {
	var selected = $(this).find('option:selected');
	if(selected.val()=="Partially Due"){
		$('.completed_payment').css('display','');
		$('.due_payment').css('display','');
	}else if(selected.val()=="Due"){
		$('#completed_payment').val('0');
		$('#due_payment').val($('#total_price').val());
		$('.completed_payment').css('display','none');
		$('.due_payment').css('display','none');
	}
	else if(selected.val()=="Completed"){
		$('#completed_payment').val($('#total_price').val());
		$('#due_payment').val('0');
		$('.completed_payment').css('display','none');
		$('.due_payment').css('display','none');
	}
});

$('#total_unit').on('keyup', function() {
   if(parseInt($(this).val())>parseInt($('#remain_unit').val())){
   	$(this).val(parseInt($('#remain_unit').val()));
   }
 calculate();
});

 $('#completed_payment').on('keyup', function() {
   if(parseInt($(this).val())>parseInt($('#total_price').val())){
   	$(this).val($('#total_price').val());
   	$('#due_payment').val('0');
   }else{
   	var total = parseInt($('#total_price').val())-parseInt($(this).val());
   	$('#due_payment').val(total);
   }
});
 $('#due_payment').on('keyup', function() {
   if(parseInt($(this).val())>parseInt($('#total_price').val())){
   	$(this).val($('#total_price').val());
   	$('#completed_payment').val('0');
   }else{
   	var total = parseInt($('#total_price').val())-parseInt($(this).val());
   	$('#completed_payment').val(total);
   }
});

function calculate(){
 $('#total_mrp').val(parseFloat($('#unit_mrp').val())*parseFloat($('#total_unit').val()));
 $('#total_discount').val(parseFloat($('#unit_discount').val())*parseFloat($('#total_unit').val()));
 $('#total_price').val((parseFloat($('#unit_price').val())*parseFloat($('#total_unit').val())) - parseFloat($('#special_discount').val()));
 if($('#payment_status').find('option:selected').val()=='Completed'){
 $('#completed_payment').val($('#total_price').val());
 $('#due_payment').val('0');
 }else if($('#payment_status').find('option:selected').val()=='Due'){
 $('#due_payment').val($('#total_price').val());
 $('#completed_payment').val('0');
 }else if($('#payment_status').find('option:selected').val()=='Partially Due'){
 	if(parseFloat($('#completed_payment').val()) <= parseFloat($('#total_price').val())){
 	 $('#due_payment').val(parseFloat($('#total_price').val())-parseFloat($('#completed_payment').val()));	
 	}else{
 		$('#completed_payment').val($('#total_price').val());
 		$('#due_payment').val('0');
 	}
 
 }else{
 $('#completed_payment').val($('#total_price').val());
 $('#due_payment').val('0');
 }
}

  $('#unit_mrp').on('keyup', function() {
   var value2 = $("#unit_mrp").val();
   var value1 = $("#unit_discount").val();
   var total = parseFloat(value2)-parseFloat(value1);
   $("#unit_price").val(total); 
   calculate();
  });
  $('#unit_discount').on('keyup', function() {
   var value2 = $("#unit_mrp").val();
   var value1 = $("#unit_discount").val();
   var total = parseFloat(value2)-parseFloat(value1);
   $("#unit_price").val(total);
   calculate(); 
  });
  $('#special_discount').on('keyup', function() {
   calculate(); 
  });
</script>
@endsection