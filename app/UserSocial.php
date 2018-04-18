<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class UserSocial extends Model
{
	public $table = "user_social";
    //
      protected $fillable = [
    	'social_id',
    	'social_name',
    	'social_email',
    	'social_flag'
    ];
}
