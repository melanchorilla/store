<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Agenda extends Model
{
    // protected $table = 'fasilitas';
    protected $fillable = ['nama_kegiatan', 'deskripsi_kegiatan', 'gambar_kegiatan', 'mulai_kegiatan', 'akhir_kegiatan'];

    public function getImage()
    {
      if(!$this->gambar_kegiatan){
        return asset('assets/agenda/default.png');
      }
  
      return asset('assets/agenda/'.$this->gambar_kegiatan);
    }

}
