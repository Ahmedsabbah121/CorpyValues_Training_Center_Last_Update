
@extends('admin_layout')
@section('admin_content')

            <ul class="breadcrumb">
				<li>
					<i class="icon-home"></i>
					<a href="index.html">Home</a> 
					<i class="icon-angle-right"></i>
				</li>
				<li><a href="#">Centers</a></li>
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
						<h2><i class="halflings-icon user"></i><span class="break"></span>Centers</h2>
					</div>
					<div class="box-content">
						<table  class="table table-striped table-bordered bootstrap-datatable datatable">
						  <thead>
							  <tr>
<!-- 								  <th>Acadamy ID</th>
 -->							<th>Acadamy Name</th>
								  <th>Acadamy Email</th>
								  <th>Acadamy Phone</th>
								  <th>Acadamy City</th>
								  <th>Acadamy Address</th>
								  <th>Acadamy logo</th>
								  <th>Status</th>
								  <th>Actions</th>
							  </tr>
						  </thead>  
						    @foreach($all_centers as $v_center) 
							  <tbody>
								<tr>
<!-- 									<td>{{$v_center->id}}</td>
 -->								<td class="center">{{$v_center->name}}</td>
									<td class="center">{{$v_center->email}}</td>
									<td class="center">{{$v_center->phone}}</td>
									<td class="center">{{$v_center->city}}</td>
									<td class="center">{{$v_center->address}}</td>
									<td class="center"><img src="{{url('/frontend/images/upload/center/'.$v_center->image)}}" width="100px" height="100px"> </td>

									<td class="center">
										@if($v_center->publication_status == 1 )
										<span class="label label-success">Avalible</span>
										@else
										<span class="label label-danger">UnAvalible</span>
										@endif
									</td>

									<td class="center">
										@if($v_center->publication_status == 1 )
										<a class="btn btn-danger" href="{{URL::to('/unactive_center/'.$v_center->id)}}">
											<i class="fa fa-thumbs-down" style="margin-bottom: 10px"></i>  
										</a>
										@else
										<a class="btn btn-success" href="{{URL::to('/active_center/'.$v_center->id)}}">
											<i class="fa fa-thumbs-up"></i>  
										</a>
										@endif
										<a class="btn btn-info" href="{{URL::to('/edit_center/'.$v_center->id)}}">
											<i class="fa fa-edit"></i>  
										</a>
										<a class="btn btn-danger" href="{{URL::to('/delete_center/'.$v_center->id)}}"  id="delete" >
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

	