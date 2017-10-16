<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Question extends Model
{
   protected $fillable = ['updated_by'];
   
   
   public function subject(){
       return $this->belongsTo(Subject::class);
   }
   /*
    * 
    */
 public function section(){
       return $this->belongsTo(Sections::class);
   }
   
   public function answers(){
       return $this->hasMany(Answer::class);
   }
}
