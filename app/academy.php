<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class academy extends Model
{
    protected $table = "users";
    protected $fillable = ['officail_docs'];
    public function user()
    {
    	return $this->belongsTo('\App\User' , 'user_id');
    }
}
