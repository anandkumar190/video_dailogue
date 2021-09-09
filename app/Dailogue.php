<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Dailogue extends Model
{
    //
    protected $fillable =['movie_id','start_time','end_time','character_name','dailogue'];
    public $timestamps = false;
}
