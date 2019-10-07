@extends('welcome')
@section('content')


<section class="inner-header divider parallax layer-overlay overlay-white-8" >
    <div class="container">
      <div class="section-title text-center">
          <div class="row">
              <div class="col-md-12 text-center">
                <h2 class="title">My Wishlist </h2>
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

                        @foreach ($wish_courses as $wish_course)
                          <div class="col-sm-4 col-md-4 col-lg-4 wow fadeInUp" data-wow-duration="1s" data-wow-delay="0.3s">
                            <div class="services mb-xs-30">
                              <div class="thumb">
                                <img class="img-fullwidth" alt="" width="480px" height="180px" src="{{url('/backend/courses/'.$wish_course->course_image)}}">
                              </div>
                              <div class="services-details clearfix">
                                <div class="p-20 p-sm-15 bg-lighter">
                                  <h4 class="mt-0 line-height-1 sm-text-center"><a href="#">{{$wish_course->course_name}}</a></h4>
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
                                    <span class="text-white">EG {{$wish_course->course_price}} </span>
                                  </div>
                                  <div class="clearfix"></div>
                                  <ul class="list-inline mt-15 mb-10 clearfix">


                                    <li class="pull-left sm-pull-none xs-pull-left sm-text-center flip pr-0 clearfix">Period: <span class="font-weight-700"> {{$wish_course->course_hours}} hours </span></li><br><br>

                                     <li class="text-theme-colored  sm-pull-none  sm-text-center flip pr-0"> Instructor : <span class="font-weight-700">{{$wish_course->name}} Acadamy</span></li>

                                  </ul>

                               <!--      <form  action="" method="post"  enctype="">
                                    </form>
                                     -->
                                   <a class="btn btn-info btn-theme-colored btn-sm text-uppercase mt-10" href="{{ url('/add_to_card_from_wish/'.$wish_course->course_id) }}">Add To Cart</a>
                                   <a href="{{ url('/delete_from_wishlist/'.$wish_course->course_id) }}" class="btn btn-danger pull-right" style="margin-top: 10px"><span> Delete</span></a>


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
@endsection
