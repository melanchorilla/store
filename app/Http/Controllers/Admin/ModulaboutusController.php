<?php

namespace App\Http\Controllers\Admin;
error_reporting(0);
use App\Aboutus;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

use App\Http\Controllers\Controller;

class ModulaboutusController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
      $aboutus = Aboutus::findorfail('1');

      return view('admin.aboutus.index', [
        'folder' => 'aboutus',
        'menu' => 'aboutus',
        'aboutus' => $aboutus
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
        'gambar_visi' => 'image|mimes:jpg,png,jpeg,gif|max:2048',
        'gambar_misi' => 'image|mimes:jpg,png,jpeg,gif|max:2048',
      ]);

      $id = '1';
      $aboutus = Aboutus::findorfail($id);

      if($request->has('gambar')){
        $gambar = $request->gambar;
        $new_gambar = time().$gambar->getClientOriginalName();
        $gambar->move('assets/aboutus/', $new_gambar);
      }else{
        $new_gambar = $request->gambar_lama;
      }

      if($request->has('gambar_visi')){
        $gambar_visi = $request->gambar_visi;
        $new_gambar_visi = time().$gambar_visi->getClientOriginalName();
        $gambar_visi->move('assets/aboutus/', $new_gambar_visi);
      }else{
        $new_gambar_visi = $request->gambar_visi_lama;
      }

      if($request->has('gambar_misi')){
        $gambar_misi = $request->gambar_misi;
        $new_gambar_misi = time().$gambar_misi->getClientOriginalName();
        $gambar_misi->move('assets/aboutus/', $new_gambar_misi);
      }else{
        $new_gambar_misi = $request->gambar_misi_lama;
      }


      $aboutus_data = [
        'title' => $request->title,
        'subtitle' => $request->subtitle,
        'deskripsi' => $request->deskripsi,
        'visi' => $request->visi,
        'misi' => $request->misi,
        'konten' => $request->konten,
        'gambar' => $new_gambar,
        'gambar_visi' => $new_gambar_visi,
        'gambar_misi' => $new_gambar_misi,
      ];

      $aboutus->update($aboutus_data);
      return redirect()->route('modulaboutus.index')->with('success', 'Data berhasil diupdate');
    }

}
