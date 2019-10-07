<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Course extends Model
{
	protected $table = "courses";

	protected $primaryKey = 'course_id';

	protected $fillable = [
        'major_id','user_id' ,'course_name', 'course_content', 'course_level','course_price','course_hours','course_image','publication_status'
    ];

    public function majors ()
    {
    	return $this->belongsTo('\App\Major' , 'major_id');
    }

    public function users()
    {
    	return $this->belongsTo('\App\User', 'user_id');
    }

    public function wishlists()
    {
    	return $this->hasMany('\App\wishlist' , 'course_id');
    }

}
