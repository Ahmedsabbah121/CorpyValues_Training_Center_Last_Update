@extends('admin_layout')
@section('admin_content')

	   <div class="row">
        <section class="inner-header divider parallax layer-overlay overlay-white-8" data-bg-img="http://placehold.it/1920x855">
          <div class="container pt-60 pb-60">
            <!-- Section Content -->
            <div class="section-content">
              <div class="row">
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
                <div class="col-md-8 text-center">
		             
              		    <h2 class="title">Traning Acadamy Registration </h2>

                    <div class="card-body">
                    <form method="POST" id="edit_center" action="{{ url('/save_update_center' , $selected_center->id) }}" aria-label="{{ __('Register') }}" enctype="multipart/form-data">
                        @csrf

                        <div class="form-group row">
                            <label for="name" class="col-md-4 col-form-label text-md-right">{{ __('Name') }}</label>

                            <div class="col-md-6">
                                <input id="name" type="text" class="form-control{{ $errors->has('name') ? ' is-invalid' : '' }}" name="name" value="{{$selected_center->name}}" required autofocus>

                                @if ($errors->has('name'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('name') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="email" class="col-md-4 col-form-label text-md-right">{{ __('E-Mail Address') }}</label>

                            <div class="col-md-6">
                                <input id="email" type="email" class="form-control{{ $errors->has('email') ? ' is-invalid' : '' }}" name="email" value="{{$selected_center->email}}" required>

                                @if ($errors->has('email'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('email') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="password" class="col-md-4 col-form-label text-md-right">{{ __('Password') }}</label>

                            <div class="col-md-6">
                                <input id="password" type="password" class="form-control{{ $errors->has('password') ? ' is-invalid' : '' }}" name="password" required>

                                @if ($errors->has('password'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('password') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

     					<div class="form-group row">
                            <label for="phone" class="col-md-4 col-form-label text-md-right">{{ __('phone') }}</label>

                            <div class="col-md-6">
                                <input id="phone" type="text" class="form-control{{ $errors->has('phone') ? ' is-invalid' : '' }}" name="phone" value="{{$selected_center->phone}}" required autofocus>

                                @if ($errors->has('phone'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('phone') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="city" class="col-md-4 col-form-label text-md-right">{{ __('city') }}</label>

                            <div class="col-md-6">
                                <input id="city" type="text" class="form-control{{ $errors->has('city') ? ' is-invalid' : '' }}" name="city" value="{{$selected_center->city}}" required autofocus>

                                @if ($errors->has('city'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('city') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="address" class="col-md-4 col-form-label text-md-right">{{ __('address') }}</label>

                            <div class="col-md-6">
                                <input id="address" type="text" class="form-control{{ $errors->has('address') ? ' is-invalid' : '' }}" name="address" value="{{$selected_center->address}}" required autofocus>

                                @if ($errors->has('address'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('address') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="image" class="col-md-4 col-form-label text-md-right">{{ __('Image') }} [Brand Logo]</label>

                            <div class="col-md-6">
                               	<input class="input-file uniform_on"  name="image" id="image" type="file">

                                @if ($errors->has('image'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('image') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

 	
 				        <div class="form-group row">
                            <label for="off_doc" class="col-md-4 col-form-label text-md-right">{{ __('official_documents') }}</label>

                            <div class="col-md-6">
                                 	<div class="input-group control-group increment" >
							          <input type="file" name="off_doc[]"  class="form-control">

							          <div class="input-group-btn"> 
							            <button class="btn btn-success" type="button"><i class="glyphicon glyphicon-plus"></i>Add</button>
							          </div>
							        </div>

							        <div class="clone hide">
							          <div class="control-group input-group" style="margin-top:10px">
							            <input type="file" name="off_doc[]" class="form-control">
							            <div class="input-group-btn"> 
							              <button class="btn btn-danger" type="button"><i class="glyphicon glyphicon-remove"></i> Remove</button>
							            </div>
							          </div>
							        </div>

                                            @if (count($errors) > 0)
                                              <div class="alert alert-danger">
                                                <strong>Whoops!</strong> There were some problems with your input.<br><br>
                                                <ul>
                                                  @foreach ($errors->all() as $error)
                                                      <li>{{ $error }}</li>
                                                  @endforeach
                                                </ul>
                                              </div>
                                            @endif

                                            @if(session('success'))
                                                <div class="alert alert-success">
                                                  {{ session('success') }}
                                                </div> 
                                            @endif

                               <!--  @if ($errors->has('off_doc'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('off_doc') }}</strong>
                                    </span>
                                @endif -->
                            </div>
                        </div>	


                        <div class="form-group row">
                            <label for="image" class="col-md-4 col-form-label text-md-right">{{ __('Publication Stauts') }}</label>

                            <div class="col-md-6">
                                <input type="checkbox" name="publication_status" id="publication_status" value="1" class="styled" > Accept publish this Center

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
                                    {{ __('Update') }}
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