<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Visi extends Model
{
  //public $timestamps = false;
  protected $table = 'visi';
  protected $fillable = ['title', 'subtitle', 'konten', 'gambar', 'user'];

  public function getImage()
  {
    if(!$this->gambar){
      return asset('assets/visi/default.png');
    }

    return asset('assets/visi/'.$this->gambar);
  }

}
