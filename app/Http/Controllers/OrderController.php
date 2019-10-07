<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use DB;
use App\Http\Requests;
use Illuminate\Support\Facades\Redirect;
use App\Order;
use App\User;
use App\OrderDetails;
use Carbon\Carbon;
use Session;

class OrderController extends Controller
{
	public function fetch_orders (Request $request)
	{	
		$all_orders = Order::all();
		return view('admin.manage_orders')->with('all_orders' , $all_orders);
	}

	public function pinding_order ($order_id)
	{
		$pind_order = Order::where('order_id' , $order_id)
                      ->update(['order_stauts' => 'pinding']);

        return Redirect::to('/manage_orders')->with('flash_message_success' , 'Order Pinding');
	}

	public function accept_order ($order_id)
	{
		$done_order = Order::where('order_id' , $order_id)
					  ->update(['order_stauts' => 'accept']);

		return Redirect::to('/manage_orders')->with('flash_message_success' , 'Order Accept ');
	}

	public function view_order (Request $request , $order_id)
	{

		$info_details = OrderDetails::where('order_id' , $order_id)->with('order')->get();		
	    return view('admin.selected_order_info')->with('info_details' , $info_details);
	}



}
