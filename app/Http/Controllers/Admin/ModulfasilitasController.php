<?php

namespace App\Http\Controllers\Admin;
error_reporting(0);
use App\Fasilitas;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

use App\Http\Controllers\Controller;

class ModulfasilitasController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
      $fasilitas = Fasilitas::all();

      return view('admin.fasilitas.index', [
        'folder' => 'modulfasilitas',
        'menu' => 'modulfasilitas',
        'fasilitas' => $fasilitas
      ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $fasilitas = Fasilitas::all();

        return view('admin.fasilitas.create', [
          'folder' => 'modulfasilitas',
          'menu' => 'modulfasilitas',
          'fasilitas' => $fasilitas
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
          'judul' => 'required',
          'gambar' => 'required|image|mimes:jpg,png,jpeg,gif|max:2048',
          'deskripsi' => 'required',
        ]);

        $gambar = $request->gambar;
        $new_gambar = time().str_replace(' ', '-', $gambar->getClientOriginalName());

        $fasilitas = Fasilitas::create([
          'judul' => $request->judul,
          'gambar' => $new_gambar,
          'deskripsi' => $request->deskripsi
        ]);

        $gambar->move('assets/fasilitas/', $new_gambar);

        return redirect()->route('modulfasilitas.index')->with('success','Fasilitas berhasil disimpan');
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
      $fasilitas = Fasilitas::findorfail($id);

      return view('admin.fasilitas.edit', [
        'folder' => 'modulfasilitas',
        'menu' => 'modulfasilitas',
        'fasilitas' => $fasilitas
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
        'nama' => 'required',
        'gambar' => 'image|mimes:jpg,png,jpeg,gif|max:2048',
        'deskripsi' => 'required',
      ]);

      $fasilitas = Fasilitas::findorfail($id);

      if($request->has('gambar')){
        $gambar = $request->gambar;
        $new_gambar = time().str_replace(' ', '-', $gambar->getClientOriginalName());
        $gambar->move('assets/fasilitas/', $new_gambar);
      }else{
        $new_gambar = $request->gambar_lama;
      }

      $fasilitas_data = [
        'nama' => $request->nama,
        'gambar' => $new_gambar,
        'deskripsi' => $request->fasilitas
      ];

      $fasilitas->update($fasilitas_data);

      return redirect()->route('modulfasilitas.index')->with('success', 'Data berhasil diupdate');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
      $fasilitas = fasilitas::findorfail($id);
      $fasilitas->delete();

      return redirect()->back()->with('success', 'Data berhasil dihapus');
    }
}
