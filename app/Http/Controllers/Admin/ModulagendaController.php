<?php

namespace App\Http\Controllers\Admin;

use App\Agenda;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class ModulagendaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $agenda = Agenda::all();

        return view('admin.agenda.index', [
        'folder' => 'modulagenda',
        'menu' => 'modulagenda',
        'agenda' => $agenda
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.agenda.create', [
            'folder' => 'modulfasilitas',
            'menu' => 'modulfasilitas',
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request,[
            'nama_kegiatan' => 'required',
            'gambar_kegiatan' => 'image|mimes:jpg,png,jpeg,gif|max:2048',
            'mulai_kegiatan' => 'required',
            'akhir_kegiatan' => 'required',
        ]);

        $new_gambar = '';

        if($request->has('gambar_kegiatan')){
            $gambar = $request->gambar_kegiatan;
            $new_gambar = time().str_replace(' ', '-', $gambar->getClientOriginalName());
            $gambar->move('assets/agenda', $new_gambar);
        }

        $agenda = Agenda::create([
            'nama_kegiatan' => $request->nama_kegiatan,
            'deskripsi_kegiatan' => $request->deskripsi_kegiatan,
            'gambar_kegiatan' => $new_gambar,
            'mulai_kegiatan' => $request->mulai_kegiatan,
            'akhir_kegiatan' => $request->akhir_kegiatan,
        ]);


        return redirect()->route('modulagenda.index')->with('success','Agenda berhasil disimpan');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $agenda = Agenda::findorfail($id);

        return view('admin.agenda.edit', [
            'folder' => 'modulagenda',
            'menu' => 'modulagenda',
            'agenda' => $agenda
        ]);
        
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $this->validate($request,[
            'nama_kegiatan' => 'required',
            'gambar_kegiatan' => 'image|mimes:jpg,png,jpeg,gif|max:2048',
            'mulai_kegiatan' => 'required',
            'akhir_kegiatan' => 'required',
        ]);

        $agenda = Agenda::findorfail($id);

        if($request->has('gambar_kegiatan')){
            $gambar = $request->gambar_kegiatan;
            $new_gambar = time().str_replace(' ', '-', $gambar->getClientOriginalName());
            $gambar->move('assets/agenda/', $new_gambar);
            // hapus gambar sebelumnya
            unlink(public_path('assets/agenda/' . $agenda->gambar_kegiatan));
        }else{
            $new_gambar = $request->gambar_lama;
        }


        $agenda_data = [
            'nama_kegiatan' => $request->nama_kegiatan,
            'deskripsi_kegiatan' => $request->deskripsi_kegiatan,
            'gambar_kegiatan' => $new_gambar,
            'mulai_kegiatan' => $request->mulai_kegiatan,
            'akhir_kegiatan' => $request->akhir_kegiatan,
        ];

        $agenda->update($agenda_data);

        return redirect()->route('modulagenda.index')->with('success', 'Data berhasil diupdate');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $agenda = Agenda::findorfail($id);

        if($agenda->gambar_kegiatan) {
            unlink(public_path('assets/agenda/' . $agenda->gambar_kegiatan));
        }
        $agenda->delete();

        return redirect()->back()->with('success', 'Data berhasil dihapus');
    }
}
