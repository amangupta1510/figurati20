@extends('layout/vendor_dashboard')
@section('page')
<!--content area start-->
<div id="content" class="pmd-content content-area dashboard">

	<!--tab start-->
	<div class="container-fluid full-width-container">
	
		<h1 class="section-title" id="services"></h1>
			
		<!--breadcrum start-->
		<ol class="breadcrumb text-left">
		  <li><a href="{{ route('admin-dashboard') }}">Dashboard</a></li>
		  <li class="active">Oder List</li>
		</ol><!--breadcrum end-->
	
		<div class="section" id="tbody"> 
			<div class="pmd-card pmd-z-depth">
				<div class="pmd-card-body">

					<div class="group-fields clearfix row">
						<div class="col-lg-9 col-md-9 col-sm-9 col-xs-12">
							<div class="lead">ORDER LIST &nbsp;<a href="{{ route('admin-add_order') }}" class="btn pmd-ripple-effect btn-success"style="padding: 7px 5px;font-size: 15px;">Add New</a></div>
						</div>
					</div>

					<div class="table-responsive"> 
						<table cellspacing="0" cellpadding="0" class="table pmd-table table-hover" id="table-propeller">
							<thead>
								<tr>
									<th>S.No.</th>
									<th>Order&nbsp;no.</th>
									<th>Batch&nbsp;no.</th>
									<th>Product&nbsp;name</th>
									<th>Distributer</th>
									<th>Quantity</th>
									<th>Selling&nbsp;&nbsp;Time</th>
									<th>MRP</th>
									<th>Discount</th>
									<th>Extra&nbsp;Discount</th>
									<th>Total&nbsp;Price</th>
									<th>Paid&nbsp;amount</th>
									<th>Due&nbsp;amount</th>
									<th>Method</th>
									<th>Payment</th>
									<th>Invoice</th>
									<th>Edit</th>
									<th>Delete</th>
								</tr>
							</thead>
							<tbody>
								<?php $no=1;?>
							@foreach($orders as $c)
								<tr>
									<td>{{$no++}}</td>
									<td>{{$c->order_no}}</td>
									<td>{{$c->lot_no}}</td>
									<td>{{$c->p_name}}</td>
									<td>{{$c->d_name}}</td>
									<td>{{$c->total_unit}}&nbsp;units</td>
									<td class="time">{{$c->selling_time}}</td>
									<td>₹&nbsp;{{$c->total_mrp}}</td>
									<td>₹&nbsp;{{$c->total_discount}}</td>
									<td>₹&nbsp;{{$c->special_discount}}</td>
									<td>₹&nbsp;{{$c->total_price}}</td>
									<td>₹&nbsp;{{$c->completed_payment}}</td>
									<td>₹&nbsp;{{$c->due_payment}}</td>
									<td>{{$c->payment_method}}</td>
									<td>{{$c->payment_status}}</td>
									<td style="text-align: center;"><a href="{{ route('admin-order_invoice',['id'=>$c->id]) }}"><span style="font-size: 1.3em; color: #ff9933; "><i class="fas fa-download"></i></span></a></td>
									<td><a href="{{ route('admin-edit_order',['id'=>$c->id]) }}"><span style="font-size: 1.3em; color: #ff9933;"><i class="fas fa-pencil-alt"></i></span></a></td>
									<td><a href="{{ route('admin-delete_order',['id'=>$c->id]) }}" onclick="return confirm('Are you sure want to Delete Order ({{$c->order_no}})?')"><span style="font-size: 1.3em; color: #ff5c33;"><i class="fas fa-trash-alt"></i></span></a></td>
									<td>
									   
									</td>									
								</tr>
								@endforeach
							</tbody>

						</table>

					</div>
				</div>
			</div> <!-- section content end -->  
			 <p>{{$orders->links()}}</p>
		</div>
			
	</div><!-- tab end -->

</div><!--end content area-->
@endsection
@section('js')
<script type="text/javascript">
$(document).ready(function (){
$('.time').each(function () {
    var img = $(this).text();
    var img = img.replace('T','&nbsp;');
    $(this).html(img);
});
});
</script>
@endsection