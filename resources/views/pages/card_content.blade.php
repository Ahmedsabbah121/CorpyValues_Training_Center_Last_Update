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
	              <h2 class="title">Training Cart</h2>
	             
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
	          <div class="row">
	            <div class="col-md-12">
	              <div class="table-responsive">
	                <table class="table table-striped table-bordered tbl-shopping-cart">
	                  <thead>
	                    <tr>
	                      <th class="text-center"><span class="label label-success">Delete Course </span></th>
	                      <th class="text-center" >Course Image</th>
	                      <th class="text-center">Course Name</th>
	                      <th class="text-center">Acadamy Name</th>
	                      <th class="text-center">Course Level</th>
                    	  <th class="text-center">Course Price</th>
	                    </tr>
	                  </thead>
	                  <tbody>


 						@foreach($card_items as $item)

	                    <tr class="cart_item">

	                      <td class="product-remove"><a href="{{ url('/delete_item/'.$item->card_id) }}">x</a></td>

	                      <td class="product-thumbnail text-center"><img alt="member" src="{{ url('backend/courses/'.$item->course_image)}}" width="300px" height="300px"></td>
	                      <td class="product-name text-center"><h4>{{ $item->course_name }}<h4></td>
	                      <td class="product-price text-center"><span class="amount"><h4>{{ $item->academy_name }}</h4></span></td>

	                      <td class="product-subtotal text-center"><span class="level"><h4>{{ $item->course_level }}  </h4></span></td>

	                      <td class="product-subtotal text-center"><span class="amount"><h4>{{ $item->course_price }} EG </h4></span></td>

	                    </tr>

	                    @endforeach
	           
	                  <!--   <tr class="cart_item">
	                      <td colspan="3"><div class="coupon">
	                          <label for="cart-coupon">Coupon: </label>
	                          <input id="cart-coupon" type="text" placeholder="Coupon code" value="" name="coupon_code">
	                          <button type="button" class="btn">Apply Coupon</button>
	                        </div></td>
	                      <td colspan="2">&nbsp;</td>
	                      <td><button type="button" class="btn">Update Cart</button></td>
	                    </tr> -->
	                  </tbody>
	                </table>
	              </div>
	            </div>
	            <div class="col-md-12 mt-30">
	              <div class="row">
	              <!--   <div class="col-md-6">
	                  <h4>Calculate Shipping</h4>
	                  <form class="form" action="#">
	                    <table class="table no-border">
	                      <tbody>
	                        <tr>
	                          <td><select class="form-control">
	                              <option>Select Country</option>
	                              <option>Australia</option>
	                              <option>UK</option>
	                              <option>USA</option>
	                            </select></td>
	                        </tr>
	                        <tr>
	                          <td><input type="text" class="form-control" placeholder="State/country" value=""></td>
	                        </tr>
	                        <tr>
	                          <td><input type="text" class="form-control" placeholder="Postcod/zip" value=""></td>
	                        </tr>
	                        <tr>
	                          <td><button type="button" class="btn btn-default">Update Totals</button></td>
	                        </tr>
	                      </tbody>
	                    </table>
	                  </form>
	                </div> -->
	                <div class="col-md-8">
	                  <h4>Cart Totals</h4>
	                  <table class="table table-bordered">
	                    <tbody>
	                      <tr>
	                        <td>Cart Subtotal</td>
	                       		
	                       	<?php

	                       		$total = 0;
	                       		$i = 0;
	                       		// $admin_fees = 0;

	                       		foreach ($card_items as $item) {
	                       			$total += $item->course_price;
	                       			$i++;
	                       		}

	                       	?>

	                        <td id="total">{{ $total }} </td>
	                        

	                      </tr>
	                      <tr>
	                        <td>admin_fees</td>
	                        <td>Free</td>
	                      </tr>
	                      <tr>
	                        <td>Order Total</td>
	                        <td>{{ $total }} EG</td>
	                      </tr>
	                    </tbody>
	                  </table>

      				  <span><a href="{{ url('/') }} " class="btn btn-default">Choose anthor From Categories</a> 
	                  <a class="btn btn-default" href="{{ url('/checkout')}}">Proceed to Checkout</a> </span>

	              </div>
	              </div>
	            </div>
	          </div>
	        </div>
	      </div>
	    </section>
    </div>
  <!-- end main-content




@endsection