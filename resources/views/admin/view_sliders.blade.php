@extends('admin_layout')
@section('admin_content')


	       <ul class="breadcrumb">
				<li>
					<i class="icon-home"></i>
					<a href="index.html">Home</a> 
					<i class="icon-angle-right"></i>
				</li>
				<li><a href="#">Sliders</a></li>
			</ul>

			<p class="alert-success text-center">
			<?php

				$message = Session::get('message');
				if($message)
					{
						echo $message;
						Session::put('message' , null);
					}
			?>			
			</p>

					<div class="row-fluid sortable">		
				<div class="box span12">
					<div class="box-header" data-original-title>
						<h2><i class="halflings-icon user"></i><span class="break"></span>Sliders</h2>
					</div>
					<div class="box-content">
						<table class="table table-striped table-bordered bootstrap-datatable datatable">
						  <thead>
							  <tr>
								  <th>Slider ID</th>
								  <th>Slider Image</th>
								  <th>Status</th>
								  <th>Actions</th>
							  </tr>
						  </thead>  
						    @foreach($all_sliders as $v_slider) 

							  <tbody>
								<tr>
									<td>{{$v_slider->slider_id}}</td>
									<td class="center"><img src="{{URL::to('frontend/images/upload/slider/'.$v_slider->slider_image)}}" style="width: 200px;height: 80px"></td>
									<td class="center">
										@if($v_slider->publication_status == 1 )
										<span class="label label-success">Avalible</span>
										@else
										<span class="label label-danger">UnAvalible</span>
										@endif

									</td>
									<td class="center">
										@if($v_slider->publication_status == 1 )
										<a class="btn btn-danger" href="{{URL::to('/unactive_slider/'.$v_slider->slider_id)}}">
											<i class="fa fa-thumbs-down"></i>  
										</a>
										@else
										<a class="btn btn-success" href="{{URL::to('/active_slider/'.$v_slider->slider_id)}}">
											<i class="fa fa-thumbs-up"></i>  
										</a>
										@endif

								<!-- 		<a class="btn btn-info" href="{{URL::to('/edit_slider/'.$v_slider->slider_id)}}">
											<i class="fa fa-edit"></i>  
										</a> -->

										<a class="btn btn-primary" href="{{URL::to('/delete_slider/'.$v_slider->slider_id)}}"  id="delete" >
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