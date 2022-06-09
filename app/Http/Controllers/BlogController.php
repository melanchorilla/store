<?php

namespace App\Http\Controllers;
error_reporting(0);
use App\Mail\mailregister;
use App\Mail\reset;
use App\Blog;
use App\BlogCat;
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
    $time = Time::all();
    $segmen = request()->segment(1);
    if($segmen=='about'){
      $menuabout = "active";
    }else{
      $menuabout = "";
    }

    // $datablog = Blog::latest()->paginate(6);
    $datablogcat = BlogCat::all();

    return view('web.pages.blog', [
      'profiletoko' => $profiletoko,
      'time' => $time,
      'menuabout' => $menuabout,
      'datablog' => Blog::latest()->filter(request(['keyword']))->paginate(6)->withQueryString(),
      'datablogcat' => $datablogcat
    ]);
  }

  public function show(Blog $blog) {
    return view('web.pages.blogdetail', [
      'blog' => $blog
    ]);
  }



}
