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
		  <li class="active">Product List</li>
		</ol><!--breadcrum end-->
	
		<div class="section" id="tbody"> 
			<div class="pmd-card pmd-z-depth">
				<div class="pmd-card-body">

					<div class="group-fields clearfix row">
						<div class="col-lg-9 col-md-9 col-sm-9 col-xs-12">
							<div class="lead">Product List &nbsp;<a href="{{ route('admin-add_product') }}" class="btn pmd-ripple-effect btn-success"style="padding: 7px 5px;font-size: 15px;">Add New</a></div>
						</div>
					</div>

					<div class="table-responsive"> 
						<table cellspacing="0" cellpadding="0" class="table pmd-table table-hover" id="table-propeller">
							<thead>
								<tr>
									<th>S.No.</th>
									<th>Image</th>
									<th>Name</th>
									<th>Avl Qty.</th>
									<th>Sold Qty.</th>
									<th>MRP</th>
									<th>Discount</th>
									<th>Price</th>
									<th width="15%">Description</th>
									<th>Details</th>
									<th>Edit</th>
									<th>Delete</th>
								</tr>
							</thead>
							<tbody>
								<?php $no=1;?>
							@foreach($products as $c)
								<tr>
									<td>{{$no++}}</td>
									<td><img src="{{ asset("$c->image") }}" width="30px" height="30px"/></td>
									<td>{{$c->name}}</td>
									<td>{{$c->available_unit}}&nbsp;units</td>
									<td>{{$c->sold_unit}}&nbsp;units</td>
									<td>₹&nbsp;{{$c->mrp}}</td>
									<td>₹&nbsp;{{$c->discount}}</td>
									<td>₹&nbsp;{{$c->price}}</td>
									<td>{{$c->description}}</td>
									<td style="text-align: center;"><a href="{{ route('admin-product_details',['id'=>$c->id]) }}"><span style="font-size: 1.3em; color: #ff9933; "><i class="fas fa-server"></i></span></a></td>
									<td><a href="{{ route('admin-edit_product',['id'=>$c->id]) }}"><span style="font-size: 1.3em; color: #ff9933;"><i class="fas fa-pencil-alt"></i></span></a></td>
									<td><a href="{{ route('admin-delete_product',['id'=>$c->id]) }}" onclick="return confirm('Are you sure want to Delete Product ({{$c->name}})?')"><span style="font-size: 1.3em; color: #ff5c33;"><i class="fas fa-trash-alt"></i></span></a></td>
									<td>
									   
									</td>									
								</tr>
								@endforeach
							</tbody>

						</table>

					</div>
				</div>
			</div> <!-- section content end -->  
			 <p>{{$products->links()}}</p>
		</div>
			
	</div><!-- tab end -->

</div><!--end content area-->
@endsection
