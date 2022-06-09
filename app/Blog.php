<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Blog extends Model
{
  //public $timestamps = false;
  protected $table = 'blog';
  protected $fillable = ['kategoriblog_id', 'nama', 'slug', 'konten', 'gambar1', 'meta_title', 'meta_description', 'meta_keyword', 'user'];

  public function kategoriblog()
  {
    return $this->belongsTo('App\BlogCat');
  }

  public function getGambar1()
  {
    if(!$this->gambar1){
      return asset('assets/blog/default.png');
    }

    return asset('assets/blog/'.$this->gambar1);
  }

  public function getRouteKeyName()
  {
      return 'slug';
  }

  public function scopeFilter($query, array $filters) {
    $query->when($filters['keyword'] ?? false, function ($query, $keyword) {
        return $query->where('nama', 'like', '%' . $keyword . '%')
            ->orWhere('konten', 'like', '%' . $keyword . '%');
    });


  }

}
