@extends('admin_layout')
@section('admin_content')

			<ul class="breadcrumb">
				<li>
					<i class="icon-home"></i>
					<a href="index.html">Home</a>
					<i class="icon-angle-right"></i> 
				</li>
				<li>
					<i class="icon-edit"></i>
					<a href="#">View Trainees</a>
				</li>
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
						<h2><i class="halflings-icon user"></i><span class="break"></span>Trainees</h2>
					</div>
					<div class="box-content">
						<table class="table table-striped table-bordered bootstrap-datatable datatable">
						  <thead>
							  <tr>
<!-- 							  <th>Trainee ID</th>
 -->							  <th>Trainee Name</th>
								  <th>Trainee Email</th>
								  <th>Trainee Phone</th>
								  <th>Trainee City</th>
								  <th>Trainee Address</th>
<!-- 							  <th>Trainee status</th>
 -->							  <th>Trainee Image</th>
								  <th>Status</th>
								  <th>Actions</th>
							  </tr>
						  </thead>  
						    @foreach($all_trainees as $v_train)
							  <tbody>
								<tr>
<!-- 									<td >{{$v_train->id}}</td>
 -->
									<td >{{$v_train->name}}</td>
									<td >{{$v_train->email}}</td>
									<td >{{$v_train->phone}}</td>
									<td >{{$v_train->city}}</td>
									<td >{{$v_train->address}} </td>
									<td >{{$v_train->trainee->status}} </td>
									<td ><img src="{{url('/frontend/images/upload/trainee/'.$v_train->image)}}" width="100px" height="100px"> </td>

									<!-- <td class="center">
										@if($v_train->publication_status == 1)
										<span class="label label-success">Active</span>
										@else
										<span class="label label-danger">UnActive</span>
										@endif
									</td> -->
									<td class="center">
										<!-- @if($v_train->publication_status == 1 )
										<a class="btn btn-danger" href="{{URL::to('/unactive_trainee/'.$v_train->id)}}">
											<i class="fa fa-thumbs-down"></i>  
										</a>
										@else
										<a class="btn btn-success" href="{{URL::to('/active_trainee/'.$v_train->id)}}">
											<i class="fa fa-thumbs-up"></i>  
										</a>
										@endif -->

										<a class="btn btn-info" href="{{URL::to('/edit_trainee/'.$v_train->id)}}">
											<i class="fa fa-edit"></i>  
										</a>
										<a class="btn btn-danger" href="{{URL::to('/delete_trainee/'.$v_train->id)}}"  id="delete" >
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