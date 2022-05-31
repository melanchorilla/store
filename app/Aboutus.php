<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Aboutus extends Model
{
  //public $timestamps = false;
  protected $table = 'aboutus';
  protected $fillable = ['title', 'subtitle', 'deskripsi', 'konten', 'gambar', 'user', 'visi', 'misi', 'gambar_visi', 'gambar_misi'];

  public function getImage()
  {
    if(!$this->gambar){
      return asset('assets/aboutus/default.png');
    }

    return asset('assets/aboutus/'.$this->gambar);
  }

  public function getImageVisi()
  {
    if(!$this->gambar_visi){
      return asset('assets/aboutus/default.png');
    }

    return asset('assets/aboutus/'.$this->gambar_visi);
  }

  public function getImageMisi()
  {
    if(!$this->gambar_misi){
      return asset('assets/aboutus/default.png');
    }

    return asset('assets/aboutus/'.$this->gambar_misi);
  }

}
