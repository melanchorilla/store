<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Welcome extends Model
{
  //public $timestamps = false;
  protected $table = 'welcome';
  protected $fillable = ['title', 'deskripsi', 'gambar'];

  public function getImage()
  {
    if(!$this->gambar){
      return asset('assets/welcome/default.png');
    }

    return asset('assets/welcome/'.$this->gambar);
  }

}
