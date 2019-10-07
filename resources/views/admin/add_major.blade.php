@extends('admin_layout')
@section('admin_content')
	
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
						
							<form id="add_major" class="form-horizontal form-validate-jquery" action="{{url('/save_major') }}" method="post">

								{{ csrf_field() }}


								<fieldset class="content-group">
									<legend class="text-bold">Add Major</legend>

									<!-- Maximum number -->
									<div class="form-group">
										<label class="control-label col-lg-3">Major Name <span class="text-danger">*</span></label>
										<div class="col-lg-9">
											<input type="text" name="major_name" class="form-control" required="required" placeholder="Please enter a value less than or equal to 10">
										</div>
									</div>
									<!-- /maximum number -->


									<!-- Basic textarea -->
									<div class="form-group">
										<label class="control-label col-lg-3">Major Description<span class="text-danger">*</span></label>
										<div class="col-lg-9">
											<textarea rows="5" cols="5" name="major_desc" class="form-control" required="required" placeholder="Default textarea"></textarea>
										</div>
									</div>
									<!-- /basic textarea -->

									<!-- Single styled checkbox -->
									<div class="form-group">
										<label class="control-label col-lg-3">Publication Status <span class="text-danger">*</span></label>
										<div class="col-lg-9">
											<div class="checkbox">
												<label>
													<input type="checkbox" name="publication_status" id="publication_status" value="1" class="styled" required="required">
													Accept publish this Major
												</label>
											</div>
										</div>
									</div>

									<button type="reset" class="btn btn-default" id="reset">Reset <i class="icon-reload-alt position-right" onclick="reset_form()" ></i></button>
									<button type="submit" class="btn btn-primary text-center">Add Major <i class="icon-arrow-right14 position-right"></i></button>

								</fieldset>

							
							</form>
						</div>
					</div>
					<!-- /form validation -->

				</div>
				<!-- /content area -->

				<script type="text/javascript">
					function reset_form()
					{
						document.getElementById("add_major").reset();
					}
				</script>
@endsection