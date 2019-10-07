@extends('welcome')
@section('content')

			<section id="form"><!--form-->
				<div class="container">
					<div class="row">
						<div class="col-sm-4 col-sm-offset-1">

							@if(Session::has('flash_message_error'))
				                <div class="alert alert-error alert-block text-center">
				                    <button type="button" class="close" data-dismiss="alert">×</button> 
				                        <strong >{!! session('flash_message_error') !!}</strong>
				                </div>
				            @endif 

				            @if(Session::has('flash_message_success'))
				                <div class="alert alert-success alert-block text-center">
				                    <button type="button" class="close" data-dismiss="alert">×</button> 
				                        <strong class="text-center" >{!! session('flash_message_success') !!}</strong>
				                </div>
				            @endif 

							<div class="login-form"><!--login form-->
								<h1>thanks you for Course Registration...</h1>

								<h2>we will contact as soon as possible</h2>
							</div><!--/login form-->
						</div>
					</div>
				</div>
			</section><!--/form-->

@endsection