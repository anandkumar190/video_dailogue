<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Movie;
use App\Cast;
use App\Dailogue;
 

class MoveController extends Controller
{

   public function StoreMovieDialogue(Request $request) 
   {   
      $movie_result= Movie::Create([
        'movie_name'=>$request->movie_name,
        'movie_durstion'=>$request->movie_durstion
       ]);
       
          foreach ($request->cast_name as $key => $value) {
              Cast::Create([
                  'cast_name'=>$value,
                  'movie_id'=>$movie_result->id,
                  'cast_gender'=>$request->cast_gender[$key],
                  'cast_character'=>$request->cast_character[$key],
                ]);
          }
   
          foreach ($request->start_time as $key => $val) {
              Dailogue::Create([
              'start_time'=>$val,
              'movie_id'=>$movie_result->id,
              'end_time'=>$request->end_time[$key],
              'character_name'=>$request->character_name[$key],
              'dailogue'=>$this->str_transforms($request->dailogue[$key]),
              ]);
            }

      return "done";

   }
// ------------------------------------------------------------------------------------------------
   public function GetAllMoviesDialogue()
   {  
    $result = Movie::get();
    return view('welcome',compact('result'));
   }
// ---------------------------------------------------------------------------------------------
   public function GetAllMoviesDialoguebyid($id)
   {  
    $result = Movie::with('casts','dailogues')->find($id);
    return $result;
   }
// ------------------------------------------------------------------------------------------------
   private function str_transforms($string) // this function replace multiple Punctuation except this string "I just!!! can!!! not!!! believe!!! it!!!" 
   {
    $newstr=preg_replace('/\?[? ]+/', '?', $string);
    $newstr=preg_replace('/\![! ]+/', '!', $newstr);
    return $newstr;
   }
// --------------------------------------------------------------------------------------------------
   public function updateMovieDialogue(Request $request) // this function use for update
   {   

      $movie_result= Movie::updateOrCreate(['id'=>$request->movie_id],[
        'movie_name'=>$request->movie_name,
        'movie_durstion'=>$request->movie_durstion
       ]);
       
      foreach ($request->cast_name as $key => $value) {
          Cast::updateOrCreate(['id'=>$request->cast_id[$key]],[
              'cast_name'=>$value,
              'movie_id'=>$movie_result->id,
              'cast_gender'=>$request->cast_gender[$key],
              'cast_character'=>$request->cast_character[$key],
            ]);
      }
   
      foreach ($request->start_time as $key => $val) {
          Dailogue::updateOrCreate(['id'=>$request->dailogue_id[$key]],[
          'start_time'=>$val,
          'movie_id'=>$movie_result->id,
          'end_time'=>$request->end_time[$key],
          'character_name'=>$request->character_name[$key],
          'dailogue'=>$this->str_transforms($request->dailogue[$key]),
          ]);
        }
     return "done";
   }
// ----------------------------------------------------------------------------------------------------
   public function Delete($id){
       $obj=Movie::find($id);
       if (!empty($obj)) {
        $obj->delete();
        //return"deleted";
        return redirect('/');
       }else{
         //return"id not find";
         return redirect('/');
       }    
   }
//-------------------------------------------------------------------------------------------------- 
   public function CastDelete($id){
    $obj=Cast::find($id);
    if (!empty($obj)) {
     $obj->delete();
     return"deleted";   
    }else{
      return"id not find";
    }
   } 
//  ----------------------------------------------------------------------------------------------
  public function DailogueDelete($id){
   $obj=Dailogue::find($id);
    if (!empty($obj)) {
      $obj->delete();
      return"deleted";   
    }else{
      return"id not find";
    }
  }   


}
