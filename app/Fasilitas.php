<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Fasilitas extends Model
{
  //public $timestamps = false;
  protected $table = 'fasilitas';
  protected $fillable = ['judul', 'deskripsi', 'gambar'];

  public function getImage()
  {
    if(!$this->gambar){
      return asset('assets/fasilitas/default.png');
    }

    return asset('assets/fasilitas/'.$this->gambar);
  }

}
