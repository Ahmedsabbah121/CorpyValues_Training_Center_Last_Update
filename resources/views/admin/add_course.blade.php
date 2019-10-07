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
					<a href="#">Add Course</a>
				</li>
			</ul>

	<div class="row">
        <section class="inner-header divider parallax layer-overlay overlay-white-8" data-bg-img="http://placehold.it/1920x855">
          <div class="container pt-60 pb-60">
            <!-- Section Content -->
            <div class="section-content">
              <div class="row">
                    <p class="alert-success text-center">
                        <?php
                            // echo "<pre>"; print_r($all_centers); die;
                            $message = Session::get('message');
                            if($message)
                            {
                                echo $message;
                                Session::put('message' , null);
                            }
                        ?>          
                    </p>
                <div class="col-md-8 text-center">
		             
              		    <h2 class="title">Course Registration </h2>

                    <div class="card-body">
                    <form method="POST" action="{{url('/save_course')}}" aria-label="{{ __('Register') }}" enctype="multipart/form-data">
                        @csrf

                        <div class="form-group row">
                            <label for="course_name" class="col-md-4 col-form-label text-md-right">{{ __('Course Name') }}</label>

                            <div class="col-md-6">
                                <input id="course_name" type="text" class="form-control{{ $errors->has('course_name') ? ' is-invalid' : '' }}" name="course_name" value="{{ old('course_name') }}" required autofocus>

                                @if ($errors->has('course_name'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('course_name') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>


                        <div class="form-group row">
                            <label for="major_id" class="col-md-4 col-form-label text-md-right">{{ __('Major Name') }}</label>

                            <div class="col-md-1">
                                <div class="form-group">
								  <select name="major_id" required>
								  	<option>Select Major</option>
								  		<?php 

                                        $publish_majors = DB::table('majors')
                                                        ->where('publication_status' , '1')
                                                        ->get();

										// echo "<pre>"; print_r($publish_majors); die;
                                                 
                                        foreach ($publish_majors as $v_major){?>              
											<option value="{{$v_major->major_id}}">{{$v_major->major_name  }}</option>
										<?php } ?>
								
								  </select>
								</div>

                                <!-- @if ($errors->has('major_name'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('major_name') }}</strong>
                                    </span>
                                @endif -->
                            </div>
                        </div>


                        <div class="form-group row">
                            <label for="center_name" class="col-md-4 col-form-label text-md-right">{{ __('Center Name') }}</label>

                            <div class="col-md-1">
                                <div class="form-group">
								  <select name="user_id" required>
								  		<option>Select Center</option>

								  	<?php 

                                        $publish_centers = DB::table('users')
                                                    ->where([
													    ['type', 'center'],
													    ['publication_status', '1'],
													])->get();

										// echo "<pre>"; print_r($publish_centers); die;
                                                 
                                        foreach ($publish_centers as $v_center){?>              
											<option value="{{$v_center->id}}">{{$v_center->name}}</option>
									<?php } ?>
								
								  </select>
								</div>

                            <!--     @if ($errors->has('center_name'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('center_name') }}</strong>
                                    </span>
                                @endif -->
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="course_content" class="col-md-4 col-form-label text-md-right">{{ __('Course Content') }}</label>

                            <div class="col-md-6">
                            	<textarea cols="50" id="txt" contenteditable="true" name="course_content" runat="server" rows="10" required></textarea>
                            </div>
                        </div>



                    
                        <div class="form-group row">
                            <label for="course_level" class="col-md-4 col-form-label text-md-right">{{ __('Course Level') }}</label>

                            <div class="col-md-1">
                                <div class="form-group">
								  <select name="course_level" required>
								  	<option>Select Level</option>
									<option  value="beginner">beginner</option>
									<option  value="intermediate">intermediate</option>
									<option  value="advanced">advanced</option>
								  </select>
								</div>

                                @if ($errors->has('course_level'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('course_level') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

     					<div class="form-group row">
                            <label for="course_price" class="col-md-4 col-form-label text-md-right">{{ __('Course Price') }}</label>

                            <div class="col-md-6">
                                <input id="course_price" type="text" class="form-control{{ $errors->has('course_price') ? ' is-invalid' : '' }}" name="course_price" value="{{ old('course_price') }}" required autofocus  placeholder="ex:300 EG">

                                @if ($errors->has('course_price'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('course_price') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                       	<div class="form-group row">
                            <label for="course_hours" class="col-md-4 col-form-label text-md-right">{{ __('Course hours') }}</label>

                            <div class="col-md-6">
                                <input id="course_hours" type="text" class="form-control{{ $errors->has('course_hours') ? ' is-invalid' : '' }}" name="course_hours" value="{{ old('course_hours') }}" required autofocus placeholder="ex:30 hour">

                                @if ($errors->has('course_hours'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('course_hours') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>


                        <div class="form-group row">
                            <label for="course_image" class="col-md-4 col-form-label text-md-right">{{ __('Course Image') }}</label>

                            <div class="col-md-6">
                                <input id="course_image" type="file" class="form-control{{ $errors->has('course_image') ? ' is-invalid' : '' }}" name="course_image" value="{{ old('course_image') }}" required autofocus>

                                @if ($errors->has('course_image'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('course_image') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>


                        <div class="form-group row">
                            <label for="image" class="col-md-4 col-form-label text-md-right">{{ __('Publication Stauts') }}</label>

                            <div class="col-md-2">
                                <input type="checkbox" name="publication_status" id="publication_status" value="1" class="styled" required="required"> Accept publish

                                @if ($errors->has('publication_status'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('publication_status') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>


                        <div class="form-group row mb-0 ">
                            <div class="col-md-12 offset-md-4">
                                <button type="submit" class="btn btn-primary ">
                                    {{ __('Register') }}
                                </button>
                            </div>
                        </div>

                    </form>
                </div>
                
                </div>
              </div>
            </div>
          </div>      
        </section>
    </div>


	



@endsection