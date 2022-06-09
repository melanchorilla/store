<?php

namespace App\Http\Controllers;

use App\Agenda;
use App\ProfileToko;
use Illuminate\Http\Request;

class AgendaController extends Controller
{
    public function index()
    {
        $agendas = Agenda::all();
        $namatoko = ProfileToko::findorfail('1');
    
        return view('web.pages.agenda', compact('agendas', 'namatoko'));
    }

    public function show($id)
    {
        $agenda = Agenda::findOrFail($id);

        return view('web.pages.agendadetail', compact('agenda'));
    }
}
