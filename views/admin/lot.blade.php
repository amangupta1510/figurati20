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
		  <li class="active">Batch Entries</li>
		</ol><!--breadcrum end-->
	
		<div class="section" id="tbody"> 
			<div class="pmd-card pmd-z-depth">
				<div class="pmd-card-body">

					<div class="group-fields clearfix row">
						<div class="col-lg-9 col-md-9 col-sm-9 col-xs-12">
							<div class="lead">BATCH ENTRIES &nbsp;<a href="{{ route('admin-add_lot') }}" class="btn pmd-ripple-effect btn-success"style="padding: 7px 5px;font-size: 15px;">Add New</a></div>
						</div>
					</div>

					<div class="table-responsive"> 
						<table cellspacing="0" cellpadding="0" class="table pmd-table table-hover" id="table-propeller">
							<thead>
								<tr>
									<th>S.No.</th>
									<th>Batch Id.</th>
									<th>Product&nbsp;name</th>
									<th>Avl Qty.</th>
									<th>Sold Qty.</th>
									<th>MRP</th>
									<th>Discount</th>
									<th>Price</th>
									<th>Details</th>
									<th>Edit</th>
									<th>Delete</th>
								</tr>
							</thead>
							<tbody>
								<?php $no=1;?>
							@foreach($lots as $c)
								<tr>
									<td>{{$no++}}</td>
									<td>{{$c->lot_no}}</td>
									<td>{{$c->p_name}}</td>
									<td>{{$c->remain_unit}}&nbsp;units</td>
									<td>{{$c->sold_unit}}&nbsp;units</td>
									<td>₹&nbsp;{{$c->lot_mrp}}</td>
									<td>₹&nbsp;{{$c->lot_discount}}</td>
									<td>₹&nbsp;{{$c->lot_price}}</td>
									<td style="text-align: center;"><a href="{{ route('admin-lot_details',['id'=>$c->id]) }}"><span style="font-size: 1.3em; color: #ff9933; "><i class="fas fa-server"></i></span></a></td>
									<td><a href="{{ route('admin-edit_lot',['id'=>$c->id]) }}"><span style="font-size: 1.3em; color: #ff9933;"><i class="fas fa-pencil-alt"></i></span></a></td>
									<td><a href="{{ route('admin-delete_lot',['id'=>$c->id]) }}" onclick="return confirm('Are you sure want to Delete Lot Number ({{$c->lot_no}})?')"><span style="font-size: 1.3em; color: #ff5c33;"><i class="fas fa-trash-alt"></i></span></a></td>
									<td>
									   
									</td>									
								</tr>
								@endforeach
							</tbody>

						</table>

					</div>
				</div>
			</div> <!-- section content end -->  
			 <p>{{$lots->links()}}</p>
		</div>
			
	</div><!-- tab end -->

</div><!--end content area-->
@endsection
