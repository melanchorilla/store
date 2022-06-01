<?php

namespace App\Http\Controllers;

use App\Partnership;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\ProfileToko;



class PartnershipController extends Controller
{
    public function index()
    {
        $partnerships = Partnership::all();

        $namatoko = ProfileToko::findorfail('1');


        return view('web.pages.partnership', compact(
            'partnerships',
            'namatoko'
            )
        );
    }
}
