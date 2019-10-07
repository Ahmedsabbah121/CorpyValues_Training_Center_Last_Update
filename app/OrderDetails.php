<?php

namespace App;

use Illuminate\Database\Eloquent\Model;


class OrderDetails extends Model
{
	// protected $primaryKey = 'order_details_id';

    protected $table = "order_details";

    protected  $fillable = ['order_id' , 'course_id', 'course_name','center_name' ,'course_level' ,'course_price' ,'course_image'];


   public function order ()
   {

        return $this->belongsTo('\App\Order' , 'order_id');

   }
   

}
