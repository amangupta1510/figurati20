@extends('layout/vendor_dashboard')
@section('page')
<style>
  .borderless tr, .borderless td, .borderless th {
    border: none !important;
   }
</style>
<!--content area start-->
<div id="content" class="pmd-content content-area dashboard">

	<!--tab start-->
	<div class="container-fluid full-width-container">
	
		<!-- Title -->
		<h1 class="section-title" id="services">
		</h1><!-- End Title -->
			
		<!--breadcrum start-->
		<ol class="breadcrumb text-left">
		  <li class="active">Dashboard</li>
		</ol><!--breadcrum end-->
	
		<div class="section"> 


<div class="col-md-12 pmd-z-depth" style="background: #fff; padding: 10px 5px;margin-bottom: 20px;">
	<div class="media-body media-middle" align="center" style="margin-bottom: 10px;">
						<h1 class="pmd-card-title-text typo-fill-secondary propeller-title">PRODUCTS</h1>
					</div>
	@foreach($products as $p)
					<div class="col-md-2 shadow-5" align="center"style="margin: 15px 4px;">
						<img src="{{asset("$p->image")}}" style="width: 80%">
						<div><a><b>{{$p->name}}<b></a></div>
					<div style="font-size: 12px;margin-top: 5px;margin-bottom: 5px; opacity: .7;width: 100%;background-color: #e6bf55;"><a class="btn"style="font-size: 12px;font-weight: 700;color: #27211d;">Avl. Units : {{$p->available_unit}}</a></div>
						<div  style="font-size: 12px;  opacity: .7 ;margin-top: 5px;margin-bottom: 5px;background-color:#27211d; color: #e6bf55;width: 100%;"><a class="btn" style="font-size: 12px;font-weight: 700;">Sold Unit : {{$p->sold_unit}}</a></div>
					</div>
					@endforeach
				</div>
<style type="text/css">
.shadow-5 {
   box-shadow: 0 1px 2px rgba(0,0,0,0.07), 
                0 2px 4px rgba(0,0,0,0.07), 
                0 4px 8px rgba(0,0,0,0.07), 
                0 8px 16px rgba(0,0,0,0.07),
                0 16px 32px rgba(0,0,0,0.07), 
                0 32px 64px rgba(0,0,0,0.07);
                padding: 8px 7px;
}
</style>
			 
		 <div class="col-xs-12 col-sm-12 col-md-5 col-lg-5">
			<div class="pmd-card pmd-z-depth">
				<div class="pmd-card-title" align="center">
					<h1 class="pmd-card-title-text typo-fill-secondary propeller-title">INFO</h1>
				</div>
				<div class="pmd-card-body">
					<table class="table pmd-table" id="table-propeller">
						<tr>
							<td>Category</td>
							<td>:</td>
							<td>--</td>
						</tr>
						<tr>
							<td>Product</td>
							<td>:</td>
							<td>--</td>
						</tr>
						<tr>
							<td>Notification Template</td>
							<td>:</td>
							<td>--</td>
						</tr>
						<tr>
							<td>Help Menu</td>
							<td>:</td>
							<td>--</td>
						</tr>
					</table>
				</div>
			</div>
		</div>

		<div class="col-xs-12 col-sm-12 col-md-4 col-lg-4">
			<div class="pmd-card pmd-z-depth">
				<div class="pmd-card-title" align="center">
					<h1 class="pmd-card-title-text typo-fill-secondary propeller-title">SETTING</h1>
				</div>
				<div class="pmd-card-body" align="center">
					<table class="table pmd-table" id="table-propeller">
						<tr>
							<td>Currency</td>
							<td>:</td>
							<td>--</td>
						</tr>
						<tr>
							<td>Tax</td>
							<td>:</td>
							<td>-- %</td>
						</tr>
						<tr>
							<td>Notification</td>
							<td>:</td>

							<td>Not Configured</td>
						</tr>
						<tr>
							<td>Administrator</td>
							<td>:</td>
							<td><a href="{{ route('admin-profile') }}">Edit</a></td>
						</tr>
					</table>
				</div>
			</div>
		</div>

		<div class="col-xs-12 col-sm-12 col-md-3 col-lg-3">
			<div class="pmd-card pmd-z-depth">
				<div class="pmd-card-title" align="center">
					<h1 class="pmd-card-title-text typo-fill-secondary propeller-title">ABOUT</h1>
				</div>
				<div class="pmd-card-body" align="center">
					<p>Admin Panel to Manage Content On Figurati20 Website.</p>
					<br><br><br><br>
					<p>support@deltatrek.in</p>
				</div>
			</div>
		</div>

		</div>
			
	</div>

</div>
@endsection