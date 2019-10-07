@extends('admin_layout')
@section('admin_content')


	       <ul class="breadcrumb">
				<li>
					<i class="icon-home"></i>
					<a href="index.html">Home</a> 
					<i class="icon-angle-right"></i>
				</li>
				<li><a href="#">Majors</a></li>
			</ul>

			<p class="alert-success">
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
						<h2><i class="halflings-icon user"></i><span class="break"></span>Majors</h2>
					</div>
					<div class="box-content">
						<table class="table table-striped table-bordered bootstrap-datatable datatable">
						  <thead>
							  <tr>
								  <th>Major ID</th>
								  <th>Major Name</th>
								  <th>Major Description</th>
								  <th>Status</th>
								  <th>Actions</th>
							  </tr>
						  </thead>  
						    @foreach($all_major_info as $v_major) 

							  <tbody>
								<tr>
									<td>{{$v_major->major_id}}</td>
									<td class="center">{{$v_major->major_name}}</td>
									<td class="center">{{$v_major->major_desc}}</td>

									<td class="center">
										@if($v_major->publication_status == 1 )
										<span class="label label-success">Avalible</span>
										@else
										<span class="label label-danger">UnAvalible</span>
										@endif

									</td>
									<td class="center">
										@if($v_major->publication_status == 1 )
										<a class="btn btn-danger" href="{{URL::to('/unactive_major/'.$v_major->major_id)}}">
											<i class="fa fa-thumbs-up"></i>  
										</a>
										@else
										<a class="btn btn-success" href="{{URL::to('/active_major/'.$v_major->major_id)}}">
											<i class="fa fa-thumbs-down"></i>  
										</a>
										@endif

										<a class="btn btn-info" href="{{URL::to('/edit_major/'.$v_major->major_id)}}">
											<i class="fa fa-edit"></i>  
										</a>
										<a class="btn btn-danger" href="{{URL::to('/delete_major/'.$v_major->major_id)}}"  id="delete" >
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