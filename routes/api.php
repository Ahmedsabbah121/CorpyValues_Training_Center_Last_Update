<?php

use Illuminate\Http\Request;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});
Route::fallback(function(){
    return view('/errors/404');
});
Route ::post('/register' ,'Api\AuthController@register');
Route::post('/login','Api\AuthController@login');
Route::post('/logout','Api\AuthController@logout');
Route::post('/profile','Api\AuthController@profile');
/*-----------------------------Auth links done-------------------------------*/
Route::get('/home','Api\CoursesController@home');
route::post('/add_course','Api\CoursesController@Add_Course');
route::post('/courses','Api\CoursesController@courses');
route::post('/course_details','Api\CoursesController@course_details');
/*-----------------------------Courses links done-------------------------------*/
Route::post('/wishlist','Api\WishlistsController@wishlist');
Route::post('/add_to_wishlist','Api\WishlistsController@add_to_wishlist');  
Route::post('/remove_from_wishlist','Api\WishlistsController@remove_from_wishlist');
/*-----------------------------WishList links done-------------------------------*/
route::post('/orders','Api\OrdersController@showOrders');
route::post('/view_cart','Api\CardsController@view_cart');
route::post('/add_to_cart','Api\CardsController@add_to_cart');
route::post('/remove_from_cart','Api\CardsController@remove_from_cart');