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
					<a href="#">Add Slider</a>
				</li>
			</ul>

						<div class="panel-body">
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
						
							<form id="add_major" class="form-horizontal form-validate-jquery" action="{{url('/save_slider') }}" method="post" enctype="multipart/form-data">

								{{ csrf_field() }}


								<fieldset class="content-group">
									<legend class="text-bold">Add Slider</legend>

									<!-- Maximum number -->
									<div class="form-group">
										<label class="control-label col-lg-3"> Slider Image <span class="text-danger">*</span></label>
										<div class="col-lg-9">
											<input type="file" id="slider_image" name="slider_image" class="form-control" required>
										</div>
									</div>
									<!-- /maximum number -->

									<!-- Single styled checkbox -->
									<div class="form-group">
										<label class="control-label col-lg-3">Publication Status <span class="text-danger">*</span></label>
										<div class="col-lg-9">
											<div class="checkbox">
												<label>
													<input type="checkbox" name="publication_status" id="publication_status" value="1" class="styled" required="required">
													Accept publish this Slider
												</label>
											</div>
										</div>
									</div>

									<button type="reset" class="btn btn-default" id="reset">Reset <i class="icon-reload-alt position-right" onclick="reset_form()" ></i></button>
									<button type="submit" class="btn btn-primary text-center">Add Slider <i class="icon-arrow-right14 position-right"></i></button>

								</fieldset>

							</form>
						</div>


@endsection