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
					<a href="#">Edit Major</a>
				</li>
			</ul>

			<!-- Content area -->
				<div class="content">

					<!-- Form validation -->
					<div class="panel panel-flat">
					

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
						
							<form id="edit_major" class="form-horizontal form-validate-jquery" action="{{ url('/save_update_major' , $major_info->major_id) }}" method="post">

								{{ csrf_field() }}


								<fieldset class="content-group">
									<legend class="text-bold">Edit Major</legend>

									<!-- Maximum number -->
									<div class="form-group">
										<label class="control-label col-lg-3">Major Name <span class="text-danger">*</span></label>
										<div class="col-lg-9">
											<input type="text" name="major_name" class="form-control" required="required" value="{{ $major_info->major_name }}">
										</div>
									</div>
									<!-- /maximum number -->


									<!-- Basic textarea -->
									<div class="form-group">
										<label class="control-label col-lg-3">Major Description<span class="text-danger">*</span></label>
										<div class="col-lg-9">
											<textarea rows="5" cols="5" name="major_desc" class="form-control" required="required" placeholder="Default textarea">{{ $major_info->major_desc }} </textarea>
										</div>
									</div>
									<!-- /basic textarea -->

								
<!-- 
									<button type="reset" class="btn btn-default" id="edit_reset">Reset <i class="icon-reload-alt position-right" onclick="edit_reset_form()" ></i></button> -->

									<button type="submit" class="btn btn-primary text-center">Update Major <i class="icon-arrow-right14 position-right"></i></button>

								</fieldset>

							
							</form>
						</div>
					</div>
					<!-- /form validation -->

				</div>
				<!-- /content area -->

			<!-- 	<script type="text/javascript">
					function edit_reset_form()
					{
						document.getElementById("edit_major").reset();
					}
				</script>
			 -->


@endsection