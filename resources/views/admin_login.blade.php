<!DOCTYPE html>
<html lang="en" dir="rtl">
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Admin Login</title>

	<!-- Global stylesheets -->
	<link href="https://fonts.googleapis.com/css?family=Roboto:400,300,100,500,700,900" rel="stylesheet" type="text/css">

	<link href="{{ asset ('backend/assets/css/icons/icomoon/styles.css')}}" rel="stylesheet" type="text/css">
	<link href="{{ asset ('backend/assets/css/bootstrap.css')}}" rel="stylesheet" type="text/css">
	<link href="{{ asset ('backend/assets/css/core.css')}}" rel="stylesheet" type="text/css">
	<link href="{{ asset ('backend/assets/css/components.css')}}" rel="stylesheet" type="text/css">
	<link href="{{ asset ('backend/assets/css/colors.css')}}" rel="stylesheet" type="text/css">
	<!-- /global stylesheets -->

	
</head>

<body class="login-container bg-slate-800">

	<!-- Page container -->
	<div class="page-container">

		<!-- Page content -->
		<div class="page-content">

			<!-- Main content -->
			<div class="content-wrapper">

				<!-- Content area -->
				<div class="content">

					<h3 class="alert-danger" class="text-center">
						<?php
							$message = Session::get('message');
							if($message){
								echo $message;
								Session::put('message' , null);
							}
						?>
					</h3>

					<!-- Advanced login -->
					<form action="{{ url('admin_dashboard') }}" method="POST">
						{{ csrf_field() }}

						<div class="panel panel-body login-form">
							<div class="text-center">
								<div class="icon-object border-warning-400 text-warning-400"><i class="icon-people"></i></div>
								<h3 class="content-group-lg">Login to your account </h3>
							</div>

							<div class="form-group has-feedback has-feedback-left">
								<input type="text" class="form-control" name="email" placeholder="Enter Your email" required>
								<div class="form-control-feedback">
									<i class="icon-user text-muted"></i>
								</div>
								 @if ($errors->has('email'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('email') }}</strong>
                                    </span>
                                @endif
							</div>

							<div class="form-group has-feedback has-feedback-left">
								<input type="password" class="form-control" name="password" placeholder="Password" >
								<div class="form-control-feedback">
									<i class="icon-lock2 text-muted"></i>
								</div>
								 @if ($errors->has('password'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('password') }}</strong>
                                    </span>
                                @endif
							</div>

							<!-- <div class="form-group login-options">
									<div class="row">
										<div class="col-sm-12">
											<label class="checkbox-inline" style="float: left">
												<input type="checkbox" name="rememberme" class="styled" value="1">
												Remember me
											</label>
										</div>

									</div>
							</div>

							 -->

							<div class="form-group">
								<button type="submit" class="btn bg-blue btn-block">Login <i class="icon-circle-left2 position-right"></i></button>
							</div>

							<h2 class="help-block text-center no-margin">All Right Rederved by Corpy_Edu 2018</h2>
						</div>
					</form>
					<!-- /advanced login -->

				</div>
				<!-- /content area -->

			</div>
			<!-- /main content -->

		</div>
		<!-- /page content -->

	</div>
	<!-- /page container -->

	<!-- Core JS files -->
	<script type="text/javascript" src="{{ asset ('backend/assets/js/plugins/loaders/pace.min.js')}}"></script>
	<script type="text/javascript" src="{{ asset ('backend/assets/js/core/libraries/jquery.min.js')}}"></script>
	<script type="text/javascript" src="{{ asset ('backend/assets/js/core/libraries/bootstrap.min.js')}}"></script>
	<script type="text/javascript" src="{{ asset ('backend/assets/js/plugins/loaders/blockui.min.js')}}"></script>
	<!-- /core JS files -->
	<!-- Theme JS files -->
	<script type="text/javascript" src="{{ asset ('backend/assets/js/plugins/forms/styling/uniform.min.js')}}"></script>

	<script type="text/javascript" src="{{ asset ('backend/assets/js/core/app.js')}}"></script>
	<script type="text/javascript" src="{{ asset ('backend/assets/js/pages/login.js')}}"></script>
	<!-- /theme JS files -->

</body>
</html>
