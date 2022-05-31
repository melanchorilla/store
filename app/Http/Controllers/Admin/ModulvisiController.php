<?php

namespace App\Http\Controllers\Admin;
error_reporting(0);
use App\Visi;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

use App\Http\Controllers\Controller;

class ModulvisiController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
      $visi = Visi::findorfail('1');

      return view('admin.visi.index', [
        'folder' => 'modulvisi',
        'menu' => 'modulvisi',
        'visi' => $visi
      ]);
    } 

    public function update(Request $request)
    {

      $this->validate($request,[
        'title' => 'required',
        // 'subtitle' => 'required',
        // 'deskripsi' => 'required',
        'konten' => 'required',
        'gambar' => 'image|mimes:jpg,png,jpeg,gif|max:2048',
      ]);

      $id = '1';
      $visi = Visi::findorfail($id);

      if($request->has('gambar')){
        $gambar = $request->gambar;
        $new_gambar = time().$gambar->getClientOriginalName();
        $gambar->move('public/assets/visi/', $new_gambar);
      }else{
        $new_gambar = $request->gambar_lama;
      }

      $visi_data = [
        'title' => $request->title,
        'subtitle' => $request->subtitle,
        'konten' => $request->konten,
        'gambar' => $new_gambar
      ];

      $visi->update($visi_data);
      return redirect()->route('modulvisi.index')->with('success', 'Data berhasil diupdate');
    }

}
