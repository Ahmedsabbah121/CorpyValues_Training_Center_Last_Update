@extends('admin_layout')
@section('admin_content')
	

	        <ul class="breadcrumb">
				<li>
					<i class="icon-home"></i>
					<a href="index.html">Home</a> 
					<i class="icon-angle-right"></i>
				</li>
				<li><span class="label label-info"> <h4>View Order Details</h4></span></li>
			</ul>

			@if(Session::has('flash_message_error'))
                <div class="alert alert-error alert-block text-center">
                    <button type="button" class="close" data-dismiss="alert">×</button> 
                        <strong >{!! session('flash_message_error') !!}</strong>
                </div>
            @endif 

            @if(Session::has('flash_message_success'))
                <div class="alert alert-success alert-block text-center">
                    <button type="button" class="close" data-dismiss="alert">×</button> 
                        <strong class="text-center" >{!! session('flash_message_success') !!}</strong>
                </div>
            @endif 

			<div class="row-fluid sortable">		
				<div class="box span12">
					<div class="box-header" data-original-title>

					</div>
					<div class="box-content">
						<table class="table table-striped table-bordered bootstrap-datatable datatable">
						  <thead>
							  <tr>
								  <th>order Code</th>
								  <th>course name</th>
								  <th>course center</th>
								  <th>course level </th>
								  <th>course Image </th>
								  <th>course price </th>
							  </tr>
						  </thead>  

						  
						    @foreach($info_details  as  $info_order)

							  <tbody>
								<tr>
									<td>{{ $info_order->order->order_code }}</td>
									<td class="center">{{ $info_order->course_name }}</td>
									<td class="center">{{ $info_order->center_name }}</td>
									<td class="center">{{ $info_order->course_level }}</td>
									<td class="center"><img  src="{{ URL::to('/backend/courses/'.$info_order->course_image)  }}"  width="100px" height="100px" ></td>
									<td class="center">{{ $info_order->course_price}} EG</td>

								</tr>
							  </tbody>

							@endforeach
						   
					  </table>            
					</div>
				</div><!--/span-->
			
			</div><!--/row-->





@endsection