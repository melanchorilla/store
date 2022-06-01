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

      return view('admin.welcome.index', [
        'folder' => 'welcome',
        'menu' => 'welcome',
        'welcome' => $welcome
      ]);
    }

    public function update(Request $request)
    {
          $this->validate($request, [
              'judul' => 'required',
              'deskripsi' => 'required',
              'gambar' => 'image|mimes:jpg,png,jpeg,gif|max:2048',

          ]);

          $id = '1';
          $welcome = Welcome::findorfail($id);

          // dd($request->all());

          if($request->has('gambar')){
            $gambar = $request->gambar;
            $new_gambar = time().$gambar->getClientOriginalName();
            $gambar->move('assets/welcome/', $new_gambar);
          }
          else{
            $new_gambar = $request->gambar_lama;
          }
          
          
          $welcome_data = [
            'judul' => $request->judul,
            'deskripsi' => $request->deskripsi,
            'gambar' => $request->new_gambar
          ];

        $welcome->update($welcome_data);
        return redirect()->route('modulwelcome.index')->with('success', 'Data berhasil diupdate');


    }

}
