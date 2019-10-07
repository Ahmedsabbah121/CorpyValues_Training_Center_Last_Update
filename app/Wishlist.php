<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Wishlist extends Model
{
	protected  $primaryKey = "wish_id";
	
    protected $tabel = "wishlists";

    protected $fillable = ['customer_id' , 'course_id' , 'center_id'];

    public function courses ()
    {
    	return $this->belongsTo('\App\Course' , 'course_id');
    }
}
