@extends('welcome')

@section('content')
<!-- <div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Profile</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    You are logged in as trainee!
                </div>
            </div>
        </div>
    </div>
</div>
 -->

   <!-- Start main-content -->
  <div class="main-content">
    <!-- Section: inner-header -->
    <section>
      <div class="container">
        <div class="section-content">
          <div class="row">
            <div class="product">
              <div class="col-md-5">
                <div class="product-image">
                    <img src="{{url('/frontend/images/upload/trainee/'.$user->image)}}" width="250px" height="250px">
                </div>
              </div>
              <div class="col-md-7">
                <div class="product-summary">
                  <h2 class="product-title">Personal Info</h2>
             
                      <table class="table table-striped">
                        <tbody>
                          <tr>
                            <th>Name</th>
                            <td><p>{{$user->name}}</p></td>
                          </tr>
                          <tr>
                            <th>Email</th>
                            <td><p>{{$user->email}}</p></td>
                          </tr>
                          <tr>
                            <th>Phone</th>
                            <td><p>{{$user->phone}}</p></td>
                          </tr>
                          <tr>
                            <th>Address</th>
                            <td>{{$user->address}}</td>
                          </tr>
                          <tr>
                            <th>Type</th>
                            <td>{{$user->type}}</td>
                          </tr>
                            <tr>
                            <th>Status</th>
                            <td>{{$user->trainee->status}}</td>
                          </tr>
                        </tbody>
                      </table>
                </div>
              </div>
            </div>
            
            
            
            <div class="col-md-12 mt-30">
              <h4>Involved Courses </h4>
              <div class="products related owl-carousel-4col" data-nav="true">
                  @foreach($order_details as $order)
                <div class="item">
                    <div class="product">
                      <span class="tag-sale">Sale!</span>
                      <div class="product-thumb"> <img alt="" src="backend/courses/{{ $order->course_image }}" class="img-responsive img-fullwidth">
                        <div class="overlay"></div>
                      </div>
                      <div class="product-details text-center">
                        <a href="#"><h5 class="product-title">{{ $order->course_name }}</h5></a>
                        <div class="star-rating" title="Rated 4.50 out of 5"><span data-width="50%">3.50</span></div>
                        <div class="price"><del><span class="amount">{{ $order->course_price }}</span></del><ins><span class="amount">{{ $order->course_price }}</span></ins></div>
                        <div class="btn-add-to-cart-wrapper">
                          <a class="btn btn-default btn-xs btn-add-to-cart" href="#">Add To Cart</a>
                        </div>
                      </div>
                    </div>
                  </div>@endforeach
            </div>
          </div>
          
        </div>
      </div>
    </section>
  </div>


  

@endsection
