<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use DB;

class Movie extends Model
{
    protected $fillable =['movie_name','movie_durstion'];
 
    
    public function casts()
    {
        return $this->hasMany('App\Cast');
    } 

    public function dailogues()
    {
        return $this->hasMany('App\Dailogue');
    } 


    public static function boot() {
        parent::boot();

        static::deleting(function($movie) { // before delete() method call this
             $movie->casts()->delete();
             // do the rest of the cleanup...
        });

        static::deleting(function($movie) { // before delete() method call this
            $movie->dailogues()->delete();
            // do the rest of the cleanup...
       });
    }

}
