<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Major extends Model
{

   protected $table = "majors";

    protected $fillable = [
        'major_name', 'major_desc', 'publication_status'
    ];

    public function courses()
    {
    	return $this->hasMany('\App\Course','major_id');
    }

}
