<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Cast extends Model
{
    
    protected $fillable =['movie_id','cast_name','cast_gender','cast_character'];
    public $timestamps = false;
}
