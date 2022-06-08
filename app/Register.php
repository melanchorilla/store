<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Register extends Model
{
  //public $timestamps = false;
  protected $table = 'member';
  protected $fillable = ['kode_member', 'name', 'email', 'telepon', 'alamat', 'password', 'remember_token', 'value'];

}
