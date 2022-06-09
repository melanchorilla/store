<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Why extends Model
{
  //public $timestamps = false;
  protected $table = 'why';
  protected $fillable = ['title', 'detail', 'user', 'image'];


  public function getImage()
  {
    if(!$this->image){
      return asset('assets/whychooseus/default.png');
    }

    return asset('assets/whychooseus/'.$this->image);
  }

}
