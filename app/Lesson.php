<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Lesson extends Model
{
    //
    public $timestamps = false;

    protected $fillable = ['title', 'body'];

    //protected $hidden = ['title'];
    
}
