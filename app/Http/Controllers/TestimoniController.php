<?php

namespace App\Http\Controllers;

use App\Testimoni;
use App\ProfileToko;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;

class TestimoniController extends Controller
{
  public function index()
  {
    $testimonial = Testimoni::all();
    $namatoko = ProfileToko::findorfail('1');

    return view('web.pages.testimoni', compact('testimonial', 'namatoko'));
  }
}
