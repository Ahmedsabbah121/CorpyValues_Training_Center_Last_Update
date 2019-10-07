@extends('welcome')
@section('content')
  
 <div class="main-content">
    <!-- Section: inner-header -->
    <section class="inner-header divider parallax layer-overlay overlay-white-8" data-bg-img="http://placehold.it/1920x855">
      <div class="container pt-60 pb-60">
        <!-- Section Content -->
        <div class="section-content">
          <div class="row">
            <div class="col-md-12 text-center">
              <h2 class="title">Training Checkout</h2>
              <ol class="breadcrumb text-center text-black mt-10">
                <li><a href="#">Home</a></li>
                <li><a href="#">Pages</a></li>
                <li class="active text-theme-colored">Checkout</li>
              </ol>
            </div>
          </div>
        </div>
      </div>
    </section>

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

    <section>
      <div class="container">
        <div class="section-content">
          <div class="row mt-30">

              <div class="col-md-12">
                <div class="billing-details">

                  <h2 class="mb-30 text-center">Billing Details</h2>
                  <div class="row">
                    <div class="form-group col-md-12">
                      <label for="checkuot-form-name">User Name</label>
                      <input id="checkuot_name" type="text" class="form-control" value="{{Auth::user()->name}}" disabled>
                    </div>
                    <div class="col-md-12">
                      
                      <div class="form-group">
                        <label for="checkuot-form-email">Email Address</label>
                        <input id="checkuot_email" type="text" class="form-control" value="{{Auth::user()->email}}" disabled>
                      </div>
                      <div class="form-group">
                        <label for="checkuot-form-address">Phone</label>
                        <input id="checkuot_phone" type="text" class="form-control" value="{{Auth::user()->phone}}" disabled>
                      </div>


                      <div class="form-group">
                      	<label for="checkuot-form-address">Address</label>

                        <input id="checkuot_address" type="text" class="form-control" value="{{Auth::user()->address}}" disabled>
                      </div>
                    </div>
                    <div class="form-group col-md-12">
                      <label for="checkuot-form-city">City</label>
                      <input id="checkuot_city" type="text" class="form-control" value="{{Auth::user()->city}}" disabled>
                    </div>

<!--                     <div class="form-group col-md-12">
                      <label for="checkuot-form-city">Bill Date</label>
                      <input id="checkuot_date" type="text" class="form-control" value="{{ date('d-m-Y') }}
" disabled>
                    </div>
 -->
                  </div>
                </div>
              </div>

            
              <div class="col-md-12">
                <h3>Your order</h3>
                <table class="table table-striped table-bordered tbl-shopping-cart">
                  <thead>
                    <tr>
                      <th>Photo</th>
                      <th>Course Name</th>
                      <th>Acadamy Name</th>
                      <th>Course Level</th>
                      <th>Course Price</th>
                    </tr>
                  </thead>
                  <tbody>

     
                    @foreach($card_courses as $ch_course)
	                    <tr>

	                      <td class="product-thumbnail">
	                      	<a href="#">
	                      		<img alt="member" src="{{ url('backend/courses/'.$ch_course->course_image) }}">

	                      </a></td>

	                      <td><a href="#">{{$ch_course->course_name}}</a></td>

	                      <td><a href="#">{{$ch_course->Academy_name}}</a></td>
	                      <td>{{$ch_course->course_level}}</td>
	                      <td><span class="amount">{{$ch_course->course_price}} EG</span></td>
	                    </tr>
             	    @endforeach
               
         				
             	    <table class="table table-bordered">
             	    	<tr>

	                      <td>Cart Subtotal</td>
	                      <td>{{$total_ch}} EG</td>
	                    </tr>

	                    <tr>
	                      <td>admin fees</td>
	                      <td>Free</td>
	                    </tr>
	                    <tr>
	                      <td>Order Total</td>
	                      <td>{{$total_ch}} EG</td>
	                    </tr>
             	    
             	    </table>
                  </tbody>
                </table>
              </div>

                 	<form  action="{{ url('/purchase') }}"  method="post"> 

						{{ csrf_field() }}

						<div class="col-md-12" style="margin-top: 50px">
			                <h3>Payment Information (Select One)</h3>
			                <div class="payment-method">
			                  <div class="radio">
			                    <label>
			                      <input type="checkbox" name="payment_method" value="cash deliver" required>
			                      CashOnDeliver </label>
			                 
			                  </div>
			                </div>
		                </div>

		                <div class="row" id="checkout-shipping-address">
		                	
		                    <div class="col-md-6">
		                    	<div class="text-center" > 
			                		<img src="http://bootstrap-ecommerce.com/main/images/icons/pay-visa.png"> 
									<img src="http://bootstrap-ecommerce.com/main/images/icons/pay-mastercard.png"> 
								   <img src="http://bootstrap-ecommerce.com/main/images/icons/pay-american-ex.png">
							   </div>


		                      <div class="form-group col-md-12">
		                        <label for="checkuot-form-fname2">Full name (on the card)</label>
		                        <input id="checkuot-form-fname2" type="email" class="form-control" placeholder="Full Name">
		                      </div>

		                      <div class="form-group col-md-12">
		                        <label for="checkuot-form-fname2">Card number</label>
		                        <input id="checkuot-form-fname2" type="email" class="form-control" placeholder="card number">
		                      </div>

		            
							    <div class="col-sm-8">
							        <div class="form-group">
							            <label><span class="hidden-xs">Expiration</span> </label>
							        	<div class="form-inline">
							        		<select class="form-control" style="width:45%">
											  <option>MM</option>
											  <option>01 - Janiary</option>
											  <option>02 - February</option>
											  <option>03 - February</option>
											</select>
								            <span style="width:10%; text-align: center"> / </span>
								            <select class="form-control" style="width:45%">
											  <option>YY</option>
											  <option>2018</option>
											  <option>2019</option>
											</select>
							        	</div>
							        </div>
							    </div>
							    <div class="col-sm-4">
							        <div class="form-group">
							            <label data-toggle="tooltip" title="" data-original-title="3 digits code on back side of the card">CVV <i class="fa fa-question-circle"></i></label>
							            <input class="form-control" type="text">
							        </div> <!-- form-group.// -->
							    </div>
		                    </div>
                        </div>

		               <div class="text-right">  <input type="submit" name="submit" value="Purchase Order" class="btn btn-info"> </div>

					</form>
          </div>
        </div>
      </div>
    </section>
  </div>


 		<style type="text/css">
  	
		  	#support img
		  	{
		  		padding: 20px;
		  		width: 250px;
		  		height: 150px;
		  	}

 		</style>



@endsection