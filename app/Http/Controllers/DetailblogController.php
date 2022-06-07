<?php

namespace App\Http\Controllers;
error_reporting(0);
use Illuminate\Support\Facades\DB;
use App\Product;
use App\Blog;
use App\ProfileToko;
use App\Marketplace;
use Illuminate\Http\Request;

class DetailblogController extends Controller
{
    public function index($slug)
    {
      $blog = Blog::where('slug', $slug)->first();
      $profiletoko = ProfileToko::findorfail('1');
      $jumblog = Blog::where('slug', $slug)->count();
      //return view('front.detail', compact('product'));
      if($jumblog){
        return view('web.pages.blogdetail', compact('blog', 'profiletoko'));
      }else{
        return redirect('/home');
      }
    }
}
