@extends('welcome')
@section('content')

    <!-- Section: Mission -->
    <section class="bg-lighter">
      <div class="container pb-70 pb-sm-60">
        <div class="section-title">
          <div class="row">
            <div class="col-md-8 col-md-offset-2">
              <h2 class="text-center line-height-1 mt-0">Let's get<span class="text-theme-colored3"> started & register</span></h2>
            
            </div>
          </div>
        </div>
        <div class="section-content">
          <div class="row equal-height">
            <div class="col-sm-5 col-md-5">
              <div class="icon-box-new bg-white text-center clearfix m-0 pr-20 pl-20 pt-30 pb-20 mb-40">
                <a href="#" class="icon icon-circled icon-md flip mb-20">
                  <i class="fa fa-address-book font-32 text-white"></i> 
                </a>
                <h3 class="icon-box-title mt-5 mb-15 letter-space-1 line-height-1">Trainee</h3>
              
                <button class="btn btn-info"><a class="text-white" href="{{ url('/add_trainee') }}">Sign Up</a></button>
              </div>
            </div>

            <div class="col-sm-2 col-md-2">
              <div class="icon-box-new bg-white text-center clearfix m-0 pr-20 pl-20 pt-30 pb-20 mb-40">
                
			      <i aria-hidden="true" style="color: #5fb760">OR</i>
               
              </div>
            </div>


            <div class="col-sm-5 col-md-5">
              <div class="icon-box-new bg-white text-center clearfix m-0 pr-20 pl-20 pt-30 pb-20 mb-40">
                <a href="#" class="icon icon-circled icon-md flip mb-20">
                  <i class="fa fa-university font-32 text-white"></i> 
                </a>
                <h3 class="icon-box-title mt-5 mb-15 letter-space-1 line-height-1">Traning Acadamy</h3>
             
                <button class="btn btn-info"><a class="text-white" href="{{ url('/add_center') }}">Sign Up</a></button>

              </div>
            </div> 
          </div>
        </div>
      </div>
    </section>

@endsection