<?php

namespace App\Http\Controllers;
error_reporting(0);
use App\Mail\mailregister;
use App\Mail\reset;
use App\Blog;
use App\Time;
use App\ProfileToko;
use App\Aboutus;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class BlogController extends Controller
{
  public function index()
  {
    $profiletoko = ProfileToko::findorfail('1');
    $aboutus = Aboutus::findorfail('1');
    $time = Time::all();
    $segmen = request()->segment(1);
    if($segmen=='about'){
      $menuabout = "active";
    }else{
      $menuabout = "";
    }

    $datablog = Blog::all();

    return view('web.pages.blog', compact(
      'profiletoko',
      'aboutus',
      'time',
      'menuabout',
      'datablog'
    ));
  }

  public function show(Blog $blog) {
    return view('web.pages.blogdetail', [
      'blog' => $blog
    ]);
  }



}
