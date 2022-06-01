<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Partnership extends Model
{
    protected $fillable = ['nama_perusahaan', 'deskripsi', 'gambar'];

    public function getImage()
    {
        if(!$this->gambar){
        return asset('assets/partnership/default.png');
        }

        return asset('assets/partnership/'.$this->gambar);
    }
}
