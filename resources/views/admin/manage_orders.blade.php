@extends('admin_layout')
@section('admin_content')
	
	
	        <ul class="breadcrumb">
				<li>
					<i class="icon-home"></i>
					<a href="index.html">Home</a> 
					<i class="icon-angle-right"></i>
				</li>
				<li><span class="label label-info"> <h4>Mange Orders</h4></span></li>
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
								  <th>customer Name</th>
								  <th>customer phone</th>
								  <th>order total</th>
								  <th>order date</th>
								  <th>order stauts</th>
								  <th>Actions</th>

							  </tr>
						  </thead>  

						  
						    @foreach($all_orders as $v_order) 

							  <tbody>
								<tr>
									<td>{{ $v_order->order_code }}</td>
									<td class="center">{{ $v_order->customer_name }}</td>
									<td class="center">{{ $v_order->customer_phone }}</td>
									<td class="center">{{ $v_order->order_total }} EG</td>
									<th>{{ $v_order->created_at }}</th>


									<td class="center">
										@if($v_order->order_stauts == "pinding" )
										<span class="label label-warning">{{  $v_order->order_stauts  }}</span>

										@else

										<span class="label label-success">{{  $v_order->order_stauts }}</span>

										@endif
									</td>


									<td class="center">
										@if($v_order->order_stauts == 'pinding' )
										<a class="btn btn-success" href="{{ URL::to('/accept_order/'.$v_order->order_id) }}">
											<i class="fa fa-thumbs-up"></i>  
										</a>
										@else
										<a class="btn btn-danger" href="{{ URL::to('/pind_order/'.$v_order->order_id) }}">
											<i class="fa fa-thumbs-down"></i>  
										</a>
										@endif

										<a class="btn btn-info" href="{{ URL::to('/view_order/'.$v_order->order_id) }}">
											<i class="fa fa-eye"></i>  
										</a>
										<a class="btn btn-danger" href="{{ URL::to('/delete_order/'.$v_order->order_id) }}"  id="delete" >
											<i class="fa fa-trash"></i> 
										</a>

									</td>



								</tr>
							  </tbody>

							@endforeach
						   
					  </table>            
					</div>
				</div><!--/span-->
			
			</div><!--/row-->


@endsection