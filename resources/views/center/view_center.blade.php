@extends('welcome')
@section('content')
 
  <div class="main-content">
      @if ($errors->any())
          @foreach ($errors->all() as $error)
              <div>{{$error}}</div>
          @endforeach
      @endif
    <section>
      <div class="container">
        <div class="section-content">
          <div class="row">  
            @foreach($center as $c)
            <div class="product">
              <div class="col-md-4">
                  
                  
                      <div class="team-block bg-light pt-10 pb-15">
                        <div class="team-thumb text-center">
                        <img src="{{ url('/frontend/images/upload/center/'.$c->image) }}" width="250px" height="250px"> 
                        </div>
                        <div class="info">
                          <ul class="styled-icons icon-theme-colored icon-circled icon-dark icon-sm mt-15 mb-0 text-center">
                            <li><a href="#"><i class="fa fa-facebook"></i></a></li>
                            <li><a href="#"><i class="fa fa-twitter"></i></a></li>
                            <li><a href="#"><i class="fa fa-google-plus"></i></a></li>
                            <li><a href="#"><i class="fa fa-skype"></i></a></li>
                          </ul>
                        </div>
                      </div>
                      
              </div>
              <div class="col-md-8">
                <div class="product-summary">
                  <h2 class="product-title">Acadamy/Center Info</h2>
             
                      <table class="table table-striped">
                        <tbody>
                          <tr>
                            <th>Name</th>
                            <td><p>{{$c->name}}</p></td>
                          </tr>
                          <tr>
                            <th>Email</th>
                            <td><p>{{$c->email}}</p></td>
                          </tr>
                          <tr>
                            <th>phone</th>
                            <td><p>{{ $c->phone}}</p></td> 
                          </tr>
                          <tr>
                            <th>City</th>
                            <td>{{ $c->city }}</td>
                          </tr>
                          <tr>
                            <th>Address</th>
                            <td>{{ $c->address }}</td>
                          </tr>
                            <tr>
                              <th>off_image</th>
                                <td>                                  
                                     <img src="{{   url('user_images/'.$c->official_docs)}}" width="250px" height="250px"> 
                                </td>
                            </tr>
                        </tbody> 
                      </table>
                </div>
              </div>
              @endforeach
            </div>
          </div>
        </div>
      </div>
    </section>



    <section>
        <div class="container">
          <div class="section-title text-center">
            <div class="row">
              <div class="col-xs-12 col-sm-12 col-md-8 col-md-offset-2">
                <h2 class="text-center line-height-1 mt-0"><span class="text-theme-colored3">Courses</span> </h2>
              
              </div>
            </div>
          </div>
    <div class="section-content">
        <div class="row mtli-row-clearfix">
          <div class="col-md-12">
            <div class="horizontal-tab-centered">
              <div class="text-center">
                <ul class="nav nav-pills mb-10">
                </ul>
              </div>
              <div class="panel-body p-0">
                <div class="tab-content p-0">

                  <div class="tab-pane fade active in" id="tab-20">
                    <div class="row">
                      @foreach($courses as $course)
                        <div class="col-sm-4 col-md-4 col-lg-4 wow fadeInUp" data-wow-duration="1s" data-wow-delay="0.3s">
                          <div class="services mb-xs-30">
                            <div class="thumb">
                              <img class="img-fullwidth" alt="" width="480px" height="180px" src="{{ url('courses_images/'.$course->course_image) }}">
                            </div>
                            <div class="services-details clearfix">
                              <div class="p-20 p-sm-15 bg-lighter">
                                <h4 class="mt-0 line-height-1 sm-text-center"><a href="#">{{ $course->course_name }}</a></h4>
                                <ul class="list-inline text-theme-colored2 pull-left xs-pull-left  sm-pull-none sm-text-center">
                                  <li>
                                    <i class="fa fa-star" aria-hidden="true"></i>
                                    <i class="fa fa-star" aria-hidden="true"></i>
                                    <i class="fa fa-star" aria-hidden="true"></i>
                                    <i class="fa fa-star" aria-hidden="true"></i>
                                    <i class="fa fa-star" aria-hidden="true"></i>
                                  </li>
                                </ul>
                                <div class="course-price bg-theme-colored3 pull-right sm-pull-none xs-pull-right sm-text-center mt-sm-10 mt-xs-0">
                                  <span class="text-white">EG {{ $course->course_price }} </span>
                                </div>
                                <div class="clearfix"></div>
                                <ul class="list-inline mt-15 mb-10 clearfix">
                                 

                                  <li class="pull-left sm-pull-none xs-pull-left sm-text-center flip pr-0 clearfix">Period: <span class="font-weight-700"> 
                                    {{ $course->course_hours }} hours </span></li><br><br>

                                   <li class="text-theme-colored  sm-pull-none  sm-text-center flip pr-0"> Instructor : <span class="font-weight-700">{{ $c->name }}</span></li>
                                  
                                </ul>

                                 <a class="btn btn-info btn-theme-colored btn-sm text-uppercase mt-10" href="">Add To Cart</a>

                               
                                  @if(Auth::check())
                                  @if(!empty($course->status) )
                                    <a href="{{ url('/add_to_wishlist/'.$course->course_id) }}" class="btn btn-danger disabled" style="margin-top: 10px" disabled><span>+ Add to Wish List</span></a>
                                  @else
                                  <a href="{{ route('add_to_wishlist',['slug'=>$course->course_name.'-'.$course->course_id]) }}" class="btn btn-danger" style="margin-top: 10px"><span>+ Add to Wish List</span></a>
                                  @endif
                            @else
                              <a href="{{ url('/login') }}" class="btn btn-danger" style="margin-top: 10px"><span>+ Add to Wish List</span></a>
                            @endif
                                
                                
                              </div>
                            </div>
                          </div>
                      </div>
                      @endforeach
                    </div>
                  </div>

                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>
</div>
          
                                







                    
@endsection
