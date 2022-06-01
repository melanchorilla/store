<?php

namespace App\Http\Controllers\Admin;

use App\Partnership;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use Illuminate\Support\Facades\Storage;

class ModulpartnershipController extends Controller
{
    public function index()
    {
        $partnerships = Partnership::all();
        return view('admin.partnership.index', [
            'folder' => 'modulpartnership',
            'menu' => 'modulpartnership',
            'partnerships' => $partnerships
        ]);
    }

    public function create()
    {
        return view('admin.partnership.create', [
            'folder' => 'modulpartnership',
            'menu' => 'modulpartnership',
        ]);
    }

    public function store(Request $request)
    {
        $this->validate($request, [
            'nama_perusahaan' => 'required',
            'deskripsi' => 'required',
            'gambar' => 'required|image|mimes:jpg,png,jpeg,gif|max:2048',
        ]);

        $gambar = $request->gambar;
        $new_gambar = time().str_replace(' ', '-', $gambar->getClientOriginalName());

        $partnership = Partnership::create([
          'nama_perusahaan' => $request->nama_perusahaan,
          'deskripsi' => $request->deskripsi,
          'gambar' => $new_gambar
        ]);

        $gambar->move('assets/partnership/', $new_gambar);

        return redirect()->route('modulpartnership.index')->with('success','Data Partnership berhasil disimpan');
    }


    public function edit($id)
    {
        $partnership = Partnership::findOrfail($id);

        return view('admin.partnership.edit', [
            'folder' => 'modulpartnership',
            'menu' => 'modulpartnership',
            'partnership' => $partnership
        ]);
    }


    public function update(Request $request, $id)
    {
        $this->validate($request,[
            'nama_perusahaan' => 'required',
            'deskripsi' => 'required',
            'gambar' => 'image|mimes:jpg,png,jpeg,gif|max:2048',
        ]);

        $partnership = Partnership::findorfail($id);

        if($request->has('gambar')){
            $gambar = $request->gambar;
            $new_gambar = time().str_replace(' ', '-', $gambar->getClientOriginalName());
            $gambar->move('assets/partnership/', $new_gambar);
        }else{
            $new_gambar = $request->gambar_lama;
        }

        $partnership_data = [
            'nama_perusahaan' => $request->nama_perusahaan,
            'gambar' => $new_gambar,
            'deskripsi' => $request->deskripsi
        ];

        $partnership->update($partnership_data);

        return redirect()->route('modulpartnership.index')->with('success', 'Data berhasil diupdate');
    }


    public function destroy($id)
    {
        $partnership = Partnership::findorfail($id);
        
        if($partnership->gambar) {
            unlink(public_path('assets/partnership/' . $partnership->gambar));
        }

        $partnership->delete();


        return redirect()->back()->with('success', 'Data berhasil dihapus');
    }


}
