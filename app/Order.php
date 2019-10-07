<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    protected $table = "orders";

    protected $primaryKey = 'order_id';

    protected $fillable = [ 'order_id' ,'customer_name', 'customer_phone' ,'order_code', 'payment_id' , 'order_total' , 'order_stauts'];


   public function order_details ()
   {
   	  return $this->hasMany('\App\OrderDetails' , 'order_id');
   }  

}
