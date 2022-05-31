<?php

namespace App\Http\Controllers\Admin;
error_reporting(0);
use App\Welcome;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

use App\Http\Controllers\Controller;

class ModulwelcomeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
      $welcome = Welcome::findorfail('1');

      return view('admin.welcome.index', compact('welcome'));
    }

    public function update(Request $request)
    {
        dd($request);
    }

}
