<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Trainee extends Model
{
    protected $table ="trainees";

   	protected $fillable = ['status'];


    public function user()
    {
    	return $this->belongsTo('\App\User' , 'user_id');
    }
}
