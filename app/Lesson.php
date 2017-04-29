<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

use App\Tag;

class Lesson extends Model
{
    //
    public $timestamps = false;

    /**
     *
     *
     * @var array
     **/

    protected $fillable = ['title', 'body', 'some_bool'];

    //protected $hidden = ['title'];

    /**
     *
     *
     * @return mixed
     **/

    public function tags()
    {
    	return $this->belongsToMany('App\Tag');	
    }
    
}
