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
					<a href="#">View Courses</a>
				</li>
			</ul>


			<p class="alert-success">
					<?php

						// echo "<pre>"; print_r($all_courses_info); echo "</pre>"; die;
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
						<h2><i class="halflings-icon user"></i><span class="break"></span>Courses</h2>
					</div>
					<div class="box-content">
						<table class="table table-striped table-bordered bootstrap-datatable datatable">
						  <thead>
							  <tr>
<!-- 								  <th>Course ID</th>
 -->								  <th>Course Name</th>
								  <th>Major Name</th>
								  <th>Center Name</th>
<!-- 							  <th>Course Content</th>
 -->							  <th>Course Level</th>
								  <th>Course Price</th>
								  <th>Course hours</th>
								  <th>Course Image</th>
								  <th>Status</th>
								  <th>Actions</th>
							  </tr>
						  </thead>  
						    @foreach($all_courses_info as $v_course)


							  <tbody>
								<tr>
<!-- 									<td>{{$v_course->course_id}}</td>
 -->									<td >{{$v_course->course_name}}</td>
									<td >{{$v_course->major_name}}</td>
									<td >{{$v_course->name}}</td>
									<td >{{$v_course->course_level}}</td>
									<td >{{$v_course->course_price}} EG</td>
									<td >{{$v_course->course_hours}} hour</td>
									<td ><img src="{{url('/backend/courses/'.$v_course->course_image)}}" width="100px" height="100px"> </td>

									<td class="center">
										@if($v_course->publication_status == 1 )
										<span class="label label-success">Avalible</span>
										@else
										<span class="label label-danger">UnAvalible</span>
										@endif

									</td>
									<td class="center">
										@if($v_course->publication_status == 1 )
										<a class="btn btn-danger" href="{{URL::to('/unactive_course/'.$v_course->course_id)}}">
											<i class="fa fa-thumbs-up"></i>  
										</a>
										@else
										<a class="btn btn-success" href="{{URL::to('/active_course/'.$v_course->course_id)}}">
											<i class="fa fa-thumbs-down"></i>  
										</a>
										@endif

										<a class="btn btn-info" href="{{URL::to('/edit_course/'.$v_course->course_id)}}">
											<i class="fa fa-edit"></i>  
										</a>
										<a class="btn btn-danger" href="{{URL::to('/delete_course/'.$v_course->course_id)}}"  id="delete" >
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

