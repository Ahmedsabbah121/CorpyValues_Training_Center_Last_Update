@extends('welcome')
@section('content')
                    @if (session('status'))
                            {{ session('status') }}
                    @endif
  <div class="main-content">
    <section>
      <div class="container">
        <div class="section-content">
          <div class="row">  
            <div class="product">
              <div class="col-md-4">
                      <div class="team-block bg-light pt-10 pb-15">
                        <div class="team-thumb text-center">
                        <img src="{{ url('/frontend/images/upload/center/'.$user->image) }}" width="250px" height="250px"> 
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
                            <td><p>{{$user->name}}</p></td>
                          </tr>
                          <tr>
                            <th>Email</th>
                            <td><p>{{$user->email}}</p></td>
                          </tr>
                          <tr>
                            <th>phone</th>
                            <td><p>{{$user->phone}}</p></td>
                          </tr>
                          <tr>
                            <th>City</th>
                            <td>{{ $user->city }}</td>
                          </tr>
                          <tr>
                            <th>Address</th>
                            <td>{{ $user->address }}</td>
                          </tr>
                            <tr>
                              <th>off_image</th>
                                <td>                                  
                                     <img src="{{url('/public/frontend/images/upload/center/'.$user->official_docs)}}" width="250px" height="250px"> 
                                </td>
                            </tr>
                        </tbody> 
                      </table>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </section>



<section>
    <div class="section-title text-center">
        <div class="col-xs-12 col-sm-12 col-md-8 col-md-offset-2">
            <h2 class="text-center line-height-1 mt-0">Popular <span class="text-theme-colored3">Courses</span> </h2>
          </div>
    </div>
    
        
<div class="container">
    <div class="section-content">
        <div class="row mtli-row-clearfix">
            <div class="col-md-12">
                <div class="horizontal-tab-centered">
                  <div class="panel-heading">
                      <div class="text-center">
                          @foreach($data as $count => $datum)
                          <ul class="nav nav-tabs nav-pills mb-10">
                              <li role="presentation" > 
                                <a href="#tab-{{ $datum['major_id'] }}" data-toggle="tab-{{ $datum['major_id'] }}"> 
                                    {{ $datum['major_id'] }}
                                </a>
                              </li>
                            </ul>
                        @endforeach
                      </div>
                  </div>
                  
                  <div class="panel-body p-0">
                      <div class="tab-content p-0">
                          <div class="tab-pane fade active in">
                            <div class="row">
                                @foreach($data as $count => $datum)
                                    <div class="col-sm-3 col-md-3 col-lg-3 wow fadeInUp" id="tab-{{ $datum['major_id'] }}" data-toggle="tab"   data-wow-duration="1s" data-wow-delay="0.3s">
                                        <div class="services mb-xs-30">
                                            <div class="thumb">
                                                <img class="img-fullwidth" alt="" src="http://placehold.it/260x170">
                                              </div>
                                          </div>
                                    </div>
                                   
                                @endforeach
                            </div>
                          </div>
                      </div>
                  </div>
                  {{-- end of panel body --}}
                </div>
            </div>
        </div>
    </div>
</section>
</div>
          
                                







                    
@endsection
