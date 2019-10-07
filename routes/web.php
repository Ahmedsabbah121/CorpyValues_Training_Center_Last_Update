<?php
use App\Http\Controllers\CenterController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/
Route::get('/about/{id}','HomeController@about')->name('about');
Route::get('/', function () {
    return view('pages.home_content');
});
 
Auth::routes();
//admin backend urls
Route::get('/admin_login' , 'AdminController@index');
Route::any('/logout' , 'AdminController@logout');
Route::post('/admin_dashboard' , 'AdminController@dashboard');

Route::group(['middleware' =>['admin']] , function(){

	//After login
	Route::get('/admin_dashboard', 'AdminController@dashboard_get');
	//Major Backend urls
	Route::get('/add_major' , 'MajorController@index');
	Route::post('/save_major' , 'MajorController@save_major');
	Route::get('/view_majors' , 'MajorController@view_majors');
	Route::get('/unactive_major/{major_id}' , 'MajorController@unactive_major');
	Route::get('/active_major/{major_id}' , 'MajorController@active_major');
	Route::get('/edit_major/{major_id}' , 'MajorController@edit_major');
	Route::post('/save_update_major/{major_id}' , 'MajorController@save_update_major');
	Route::get('/delete_major/{major_id}' , 'MajorController@delete_major');

	//Train_center Backend urls
	Route::get('/add_center_back' , 'CenterController@add_center_back');
	Route::post('/save_center' , 'CenterController@save_center');
	Route::get('/view_centers' , 'CenterController@view_centers');
	Route::get('/unactive_center/{id}','CenterController@unactive_center');
	Route::get('/active_center/{id}' , 'CenterController@active_center');
	Route::get('/edit_center/{id}' , 'CenterController@edit_center');
	Route::post('/save_update_center/{id}' , 'CenterController@save_update_center');
	Route::get('/delete_center/{id}' , 'CenterController@delete_center');

	//Courses Backend urls
	Route::get('/add_course' , 'CourseController@index_course');
	Route::post('/save_course' , 'CourseController@save_course');
	Route::get('/view_courses' , 'CourseController@view_courses');
	Route::get('/unactive_course/{id}','CourseController@unactive_course');
	Route::get('/active_course/{id}' , 'CourseController@active_course');
	Route::get('/edit_course/{id}' , 'CourseController@edit_course');
	Route::post('/save_update_course/{id}' , 'CourseController@save_update_course');
	Route::get('/delete_course/{id}' , 'CourseController@delete_course');

	//trainees Backend urls
	Route::get('/add_back_trainee' , 'TraineeController@add_back_trainee');
	//save trainee frontend/backend
	Route::get('/view_trainees' , 'TraineeController@view_trainees');
	Route::get('/unactive_trainee/{id}','TraineeController@unactive_trainee');
	Route::get('/active_trainee/{id}','TraineeController@active_trainee');
	Route::get('/edit_trainee/{id}' , 'TraineeController@edit_trainee');
	Route::post('/save_update_trianee/{id}' , 'TraineeController@save_update_trianee');
	Route::get('/delete_trainee/{id}' , 'TraineeController@delete_trainee');

	//sliders backend urls
	Route::get('/add_slider','SliderController@add_slider');
	Route::post('/save_slider','SliderController@save_slider');
	Route::get('/view_sliders' , 'SliderController@view_sliders');
	Route::get('/unactive_slider/{slider_id}' , 'SliderController@unactive_slider');
	Route::get('active_slider/{slider_id}','SliderController@active_slider');
	Route::get('/delete_slider/{slider_id}' , 'SliderController@delete_slider');

	//orders backend urls
	Route::get('/manage_orders','OrderController@fetch_orders');
	Route::get('/pind_order/{order_id}' , 'OrderController@pinding_order');
	Route::get('/accept_order/{order_id}' , 'OrderController@accept_order');
	Route::get('/view_order/{order_id}' , 'OrderController@view_order');
});
//login Center/Traniee  Frontend Urls
Route::group(['middleware' =>['web' , 'auth']] , function(){
	Route::get('/profile' , 'TraineeController@get_profile');
	Route::get('/center_profile','CenterController@view_profile');
});
//frontend routes
Route::get('/' , 'HomeController@HomeData');
Route::get('/center-{id}','CenterController@view_center')->name('view_center');
// register page for both
Route::get('/register_page','CenterController@register_page');
//center Frontend
Route::get('/add_center','CenterController@add_center');
Route::post('/save_center','CenterController@save_center');
//trainee frontend
Route::get('/add_trainee','TraineeController@index_trainee');
Route::post('/save_trianee','TraineeController@save_trianee');
//product_details
Route::get('/course_details/{course_id}','CourseController@course_details');
//card url
Route::get('/add_to_card/{id}','CardController@add_to_card');
Route::get('/card_content' , 'CardController@card_content')->name('card_content');
//delete item
Route::get('/delete_item/{id}', 'CardController@delete_item');
//checkout page
Route::get('/checkout',  'CheckoutController@home_checkout');
//plcae order
Route::post('/purchase' , 'CheckoutController@purchase_courses');
//post withlist with get
Route::get('/add_to_wishlist/{slug}' , 'WishlistController@add_wishlist')->name('add_to_wishlist');
Route::get('/delete_from_wishlist/{id}' , 'WishlistController@delete_from_wishlist')->name('delete_from_wishlist');
//get wishlist courses
Route::get('/wishlist_content' , 'WishlistController@get_wishlist');
// add card from wishlist items
Route::get('/add_to_card_from_wish/{course_id}' , 'WishlistController@add_card_table');

