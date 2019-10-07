@extends('welcome')
@section('content')


  <!-- Start main-content -->
  <div class="main-content">
    <!-- Section: inner-header -->
    <section class="inner-header divider parallax layer-overlay overlay-white-8" data-bg-img="http://placehold.it/1920x855">
      <div class="container pt-60 pb-60">
        <!-- Section Content -->
        <div class="section-content">
          <div class="row">
            <div class="col-md-12 text-center">
              <h2 class="title">Course Details</h2>

            </div>
          </div>
        </div>
      </div>
    </section>

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

    <section>
      <div class="container">
        <div class="section-content">
          <div class="row">

                 


            <div class="product">
              <div class="col-md-5">
                <div class="product-image">
	                  <ul class="owl-carousel-1col" data-nav="true">
	                  <li data-thumb="https://placehold.it/750x750"><img src="{{url('backend/courses/'.$course_info->course_image)}}" width="400px" height="400px" alt=""></li>
	             


	                </ul>
                </div>
              </div>
              <div class="col-md-7">
                <div class="product-summary">
                  <h2 class="product-title">{{$course_info->course_name }}</h2>
                  <div class="product_review">
                    <ul class="review_text list-inline">
                      <li>
                        <div title="Rated 4.50 out of 5" class="star-rating"><span data-width="90%">4.50</span></div>
                      </li>
                      <li><a href="#"><span>2</span>Reviews</a></li>
                      <li><a href="#">Add reviews</a></li>
                    </ul>
                  </div> 

                  <div class="price"> <label>Instructor : </label> {{$center_name}} Acadamy</div><hr>
               
                  <div class="tags"><strong>Major : </strong> {{$major_name}}</div><hr>

                  <div class="tags"><strong>duration : </strong> {{$course_info->course_hours}} hour</div><hr>

                  <div class="tags"><strong>price : </strong> {{$course_info->course_price}} EG</div><hr>

                  <div class="tags"><strong>Level : </strong> {{$course_info->course_level}}</div><hr>

                  <div class="cart-form-wrapper mt-30">

                    <form  action="{{ url('/add_to_card') }}"  enctype="multipart/form-data" method="post" class="cart">
                        {{csrf_field()}}

                        <input type="hidden" value="{{$course_info->course_id}}" name="course_id">
                        <button  id="enroll"  class="single_add_to_cart_button btn btn-default" type="submit" >Enroll</button>
                    </form>

                  </div>
                  
                </div>
              </div>
              <div class="col-md-12">
                <div class="horizontal-tab product-tab">
                  <ul class="nav nav-tabs">
                    <li class="active"><a href="#tab1" data-toggle="tab">Course Content</a></li>
                    <li><a href="#tab2" data-toggle="tab">Additional Information</a></li>
                    <li><a href="#tab3" data-toggle="tab">Reviews</a></li>
                  </ul>
                  <div class="tab-content">
                    <div class="tab-pane fade in active" id="tab1">
                      
                      {!! $course_info->course_content !!}
                      	
                    </div>

                    <!-- <div class="tab-pane fade" id="tab2">
                      <table class="table table-striped">
                        <tbody>
                          <tr>
                            <th>Brand</th>
                            <td><p>Envato</p></td>
                          </tr>
                          <tr>
                            <th>Color</th>
                            <td><p>Black</p></td>
                          </tr>
                          <tr>
                            <th>Size</th>
                            <td><p>Large, Medium</p></td>
                          </tr>
                          <tr>
                            <th>Weight</th>
                            <td>27 kg</td>
                          </tr>
                          <tr>
                            <th>Dimensions</th>
                            <td>16 x 22 x 123 cm</td>
                          </tr>
                        </tbody>
                      </table>
                    </div>
                    <div class="tab-pane fade" id="tab3">
                      <div class="reviews">
                        <ol class="commentlist">
                          <li class="comment">
                            <div class="media"> <a href="#" class="media-left"><img class="thumb img-circle media-object" alt="" src="https://placehold.it/75x75" width="75"></a>
                              <div class="media-body">
                                <ul class="review_text list-inline mt-5">
                                  <li>
                                    <div title="Rated 5.00 out of 5" class="star-rating"><span  data-width="100%">5.00</span></div>
                                  </li>
                                  <li>
                                    <h5 class="media-heading meta"><span class="author">Tom Joe</span> – Mar 15, 2015:</h5>
                                  </li>
                                </ul>
                                Lorem ipsum dolor sit amet, consectetur adipiscing elit. Donec volutpat purus tempor sem molestie, sed blandit lacus posuere. Lorem ipsum dolor sit amet.</div>
                            </div>
                          </li>
                          <li class="comment">
                            <div class="media"> <a href="#" class="media-left"><img class="thumb img-circle media-object" alt="" src="https://placehold.it/75x75" width="75"></a>
                              <div class="media-body">
                                <ul class="review_text list-inline mt-5">
                                  <li>
                                    <div title="Rated 4.00 out of 5" class="star-rating"><span  data-width="80%">4.00</span></div>
                                  </li>
                                  <li>
                                    <h5 class="media-heading meta"><span class="author">Mark Doe</span> – Jan 23, 2015:</h5>
                                  </li>
                                </ul>
                                Lorem ipsum dolor sit amet, consectetur adipiscing elit. Donec volutpat purus tempor sem molestie, sed blandit lacus posuere. Lorem ipsum dolor sit amet.</div>
                            </div>
                          </li>
                        </ol>
                      </div>
                    </div> -->
                  </div>
                </div>
              </div>
            </div>


            <div class="col-md-12 mt-30">
              <h4>Related courses</h4>

              <div class="products related owl-carousel-3col" data-nav="true">

                @foreach($related_courses as $rel_courses)
                  <div class="item">
                    <div class="product">
                      <span class="tag-sale">Sale!</span>
                      <div class="product-thumb"> <img class="img-fullwidth" alt="" width="480px" height="180px"  src="{{url('backend/courses/'.$rel_courses->course_image)}}">

                        <div class="overlay"></div>

                      </div>
                      <div class="product-details text-center">
                        <a href="#"><h5 class="product-title">{{$rel_courses->course_name}}</h5></a>
                        <div class="star-rating" title="Rated 4.50 out of 5"><span data-width="90%">3.50</span></div>
                        <div class="price"><ins><span class="amount">{{$rel_courses->course_price}} EG</span></ins></div>
                        <div class="btn-add-to-cart-wrapper">
                           <a class="btn btn-dark btn-theme-colored btn-sm text-uppercase mt-10" href="{{url('/course_details/'.$rel_courses->course_id)}}">More Details</a>
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
    </section>
  </div>

<!-- 
  <script type="text/javascript">
    
      var itemCount = 0;
      $('#enroll').click(function() {
          itemCount++;
          $('#itemCount').html(itemCount).css('display' , 'block');

      });
      console.write(itemCount);
  </script>
 -->
@endsection