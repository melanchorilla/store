<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\ProfileToko;
use App\Fasilitas;


class FacilityController extends Controller
{
    public function index()
    {
        $facilities = Fasilitas::all();
        $namatoko = ProfileToko::findorfail('1');

        return view('web.pages.facility', compact(
            'namatoko',
            'facilities'
        ));
    }
}
