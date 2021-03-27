@extends('layout/vendor_dashboard')
@section('page')
@foreach($data as $dt)
<!--content area start-->
<div id="content" class="pmd-content content-area dashboard">

	<!--tab start-->
	<div class="container-fluid full-width-container">
		<h1></h1>
			
		<!--breadcrum start-->
		<ol class="breadcrumb text-left">
		  <li><a href="{{ route('admin-dashboard') }}">Dashboard</a></li>
		  <li class="active">Edit Batch Entry</li>
		</ol>
		<!--breadcrum end-->
	
		<div class="section"> 

			<form action="{{ route('admin-edit_lot_submit') }}" method="post" enctype="multipart/form-data">
				@csrf
				<input type="hidden" name="id" id="id" value="{{$dt->id}}" required>
				<input type="hidden" name="p_name" id="p_name" required>
				<input type="hidden" name="unit_mrp" id="unit_mrp" required>
				<input type="hidden" name="unit_discount" id="unit_discount" required>
				<input type="hidden" name="unit_price" id="unit_price" required>
							<div class="pmd-card pmd-z-depth">
				<div class="pmd-card-body">

					<div class="group-fields clearfix row">
						<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
							<div class="lead">EDIT BATCH ENTRY</div>
						</div>
					</div>

					<div class="group-fields clearfix row">

						<div class="col-lg-6 col-md-6 col-sm-6 col-xs-12 hidden">
							<div class="form-group pmd-textfield">       
								<label>Select Product *</label>
								<select class="select-with-search form-control pmd-select2" name="p_id" id="p_id" required>
									<option>Select Product</option>
									@foreach($products as $c)
									<option value="{{$c->id}}" data-name="{{$c->name}}" data-mrp="{{$c->mrp}}" data-discount="{{$c->discount}}" data-price="{{$c->price}}" @if($dt->p_id==$c->id) selected="true" @endif>{{$c->name}}</option>
									@endforeach
								</select>
							</div>
						</div>

						<div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
							<div class="form-group pmd-textfield">
								<label for="unit" class="control-label">Unit *</label>
								<input type="number" name="unit" id="unit" class="form-control" min="0" oninput="this.value = Math.abs(this.value)" value="{{$dt->unit}}" placeholder="Product Unit" required>
							</div>
						</div>

						<div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
							<div class="form-group pmd-textfield">
								<label for="sold_unit" class="control-label">Sold Units</label>
								<input type="number" name="sold_unit" id="sold_unit" class="form-control" min="0" oninput="this.value = Math.abs(this.value)" value="{{$dt->sold_unit}}" placeholder="Product Unit" required>
							</div>
						</div>


						<div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
							<div class="form-group pmd-textfield">
								<label for="remain_unit" class="control-label">Available Units</label>
								<input type="number" name="remain_unit" id="remain_unit" class="form-control" min="0" oninput="this.value = Math.abs(this.value)" value="{{$dt->remain_unit}}" placeholder="Product Unit" readonly="true">
							</div>
						</div>

						
						<div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
							<div class="form-group pmd-textfield">
								<label for="lot_no" class="control-label">Batch Id *</label>
								<input type="text" name="lot_no" id="lot_no" class="form-control" value="{{$dt->lot_no}}" placeholder="Batch Id" required>
							</div>
						</div>

						<div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
							<div class="form-group pmd-textfield">
								<label for="entry_time" class="control-label">Entry Time *</label>
								<input type="datetime-local" name="entry_time" id="entry_time" class="form-control" value="{{$dt->entry_time}}"placeholder="Entry Time" required>
							</div>
						</div>

						<div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
							<div class="form-group pmd-textfield">
								<label for="description" class="control-label">Description</label>
								<input type="text" name="description" id="description" class="form-control" value="{{$dt->description}}" placeholder="Description">
							</div>
						</div>


						<div class="col-lg-6 col-md-6 col-sm-6 col-xs-12 hidden">
							<div class="form-group pmd-textfield">
								<label for="lot_mrp" class="control-label">Batch MRP (₹) *</label>
								<input type="number" name="lot_mrp" id="lot_mrp" class="form-control"  min="0" oninput="this.value = Math.abs(this.value)" value="{{$dt->lot_mrp}}" placeholder="₹" required>
							</div>
						</div>

						<div class="col-lg-6 col-md-6 col-sm-6 col-xs-12 hidden">
							<div class="form-group pmd-textfield">
								<label for="lot_discount" class="control-label">Batch Discount (₹) *</label>
								<input type="number" name="lot_discount" id="lot_discount" class="form-control"  min="0" oninput="this.value = Math.abs(this.value)" value="{{$dt->lot_discount}}" placeholder="₹" required>
							</div>
						</div>


						<div class="col-lg-6 col-md-6 col-sm-6 col-xs-12 hidden">
							<div class="form-group pmd-textfield">
								<label for="lot_price" class="control-label">Batch Price (₹) *</label>
								<input type="number" name="lot_price" id="lot_price" class="form-control" value="{{$dt->lot_price}}" min="0" oninput="this.value = Math.abs(this.value)" placeholder="₹" readonly="true">
							</div>
						</div>


						
						<div class="pmd-card-actions col-lg-12 col-md-12 col-sm-12 col-xs-12">
							<p align="right">
							<button type="submit" class="btn pmd-ripple-effect btn-danger" name="submit">Update</button>
							<a href="{{ route('admin-lot') }}" class="btn pmd-ripple-effect btn-info">Cancel</a>
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
$(document).ready(function(){
function product(){
	var selected = $('#p_id').find('option:selected');
	$('#p_name').val(selected.data('name'));
    $('#unit_mrp').val(selected.data('mrp'));
    $('#unit_discount').val(selected.data('discount'));
    $('#unit_price').val(selected.data('price'));
	}
$('#p_id').on('change',function() {
	var selected = $(this).find('option:selected');
	
    $('#p_name').val(selected.data('name'));
    $('#unit_mrp').val(selected.data('mrp'));
    $('#unit_discount').val(selected.data('discount'));
    $('#unit_price').val(selected.data('price'));
     
    var mrp = selected.data('mrp');
    var discount = selected.data('discount');
    var price = selected.data('price');
    var unit = $('#unit').val();
    
    $("#lot_mrp").val(parseFloat(mrp)*parseFloat(unit));
    $("#lot_discount").val(parseFloat(discount)*parseFloat(unit));
    $("#lot_price").val(parseFloat(price)*parseFloat(unit));
   
});
$('#unit').on('keyup', function() {
	var selected = $('#p_id').find('option:selected');
   var mrp = selected.data('mrp');
    var discount = selected.data('discount');
    var price = selected.data('price');
    var unit = $(this).val();
   var sold_unit = $('#sold_unit').val();

    $("#remain_unit").val(parseFloat(unit)-parseFloat(sold_unit));
    $("#lot_mrp").val(parseFloat(mrp)*parseFloat(unit));
    $("#lot_discount").val(parseFloat(discount)*parseFloat(unit));
    $("#lot_price").val(parseFloat(price)*parseFloat(unit));
  });

$('#sold_unit').on('keyup', function() {
	if($("#unit").val()<$("#sold_unit").val()){
  		$("#sold_unit").val($("#unit").val());
  	}
    var unit = $('#unit').val();
    var sold_unit = $('#sold_unit').val();
    $("#remain_unit").val(parseFloat(unit)-parseFloat(sold_unit));
  });


  $('#lot_mrp').on('keyup', function() {
   var value2 = $("#lot_mrp").val();
   var value1 = $("#lot_discount").val();
   var total = parseFloat(value2)-parseFloat(value1);
   $("#lot_price").val(total); 
  });
  $('#lot_discount').on('keyup', function() {
   var value2 = $("#lot_mrp").val();
   var value1 = $("#lot_discount").val();
   var total = parseFloat(value2)-parseFloat(value1);
   $("#lot_price").val(total); 
  });
  product();
})
</script>
@endforeach
@endsection