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
							<a href="#">Dashboard</a>
						</li>
				</ul> <hr>


 				<!-- Quick stats boxes -->
					<div class="row text-center">
						<div class="col-lg-1"></div>
						<div class="col-md-3">

							<!-- Members online -->
							<div class="panel bg-indigo-300">
								<div class="panel-body">
									<div class="heading-elements">
										<i class="icon-copy"></i>
									</div>

									<h3 class="no-margin">{{$course_num}}</h3>
										COURSES
 								</div>
							</div>
							<!-- /members online -->
						</div>

						<div class="col-md-3">

							<!-- Current server load -->
							<div class="panel bg-pink-400">
								<div class="panel-body">
									<div class="heading-elements">
										<i class="fa fa-university"></i>

									</div>

									<!--?php echo "<pre>"; print_r($center_num); echo "</pre>"; die; ?-->

									<h3 class="no-margin">{{$center_num}}</h3>

										Training Centers

								</div>

								<div id="server-load"></div>
							</div>
							<!-- /current server load -->
						</div>

						<div class="col-md-3">

							<!-- Today's revenue -->
							<div class="panel bg-slate">
								<div class="panel-body">
									<div class="heading-elements">
										<i class="icon-user"></i>
				                	</div>

									<h3 class="no-margin">{{$trainee_num}}</h3>
									Trainees
								</div>

								<div id="today-revenue"></div>
							</div>
							<!-- /today's revenue -->
						</div>
					</div>
					<!-- latest Trainee Table -->


			<div class="row-fluid sortable">		
				<div class="box span12">
					<div class="box-header" data-original-title>
						<h2 class="text-center"><i class="halflings-icon user"></i><span class="break"></span>Latest Trainees</h2>
					</div>
					<div class="box-content">
						<table class="table table-striped table-bordered bootstrap-datatable datatable">
						  <thead>
							  <tr>
							    <th>Trainee ID</th>
							    <th>Trainee Name</th>
								<th>Trainee Email</th>
								<th>Trainee Phone</th>
								<th>Trainee City</th>
								<th>Trainee Address</th>
								<th>Trainee status</th>
    							<th>Trainee Image</th>
							
							  </tr>
						  </thead>  
						    @foreach($latest_trainee as $l_train)
							  <tbody>
								<tr>
									<td >{{$l_train->id}}</td>
									<td >{{$l_train->name}}</td>
									<td >{{$l_train->email}}</td>
									<td >{{$l_train->phone}}</td>
									<td >{{$l_train->city}}</td>
									<td >{{$l_train->address}} </td>
									<td >{{$l_train->trainee->status}} </td>
									<td ><img src="{{url('/frontend/images/upload/trainee/'.$l_train->image)}}" width="100px" height="100px"> </td>
								</tr>
							  </tbody>
							@endforeach
					  </table>            
					</div>
				</div><!--/span-->
			
			</div><!--/row-->



@endsection