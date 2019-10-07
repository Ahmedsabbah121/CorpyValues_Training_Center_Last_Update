<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Card extends Model
{
    protected $table = "cards";

    protected $fillable = ['customer_id' , 'course_id' , 'course_name' , 'course_price' , 'center_id'];
    
}
