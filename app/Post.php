<?php

namespace App;

use Cviebrock\EloquentSluggable\Sluggable;
use Illuminate\Database\Eloquent\Model;
use Carbon\Carbon;

use Illuminate\Database\Eloquent\SoftDeletes;
class Post extends Model
{

      use Sluggable,SoftDeletes;

 protected $dates = ['deleted_at'];
    //
       protected $fillable = [
    	'title',
    	'description',
    	'user_id',
    ];

         public function user()
    {
        //User::class == 'App\User'
        return $this->belongsTo(User::class);
    }

     public function getCreatDateAttribute()
    {
        $dt = new Carbon($this->created_at);
        return "{$dt->format('l jS \\of F Y h:i:s A')}";
        
    }

    /**
     * Return the sluggable configuration array for this model.
     *
     * @return array
     */
    public function sluggable()
    {
        return [
            'slug' => [
                'source' => 'title'
            ]
        ];
    }
}
