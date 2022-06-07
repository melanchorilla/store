<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class BlogCat extends Model
{
  public $timestamps = false;
  protected $table = 'kategoriblog';
  protected $fillable = ['nama', 'slug', 'gambar', 'user'];
}
