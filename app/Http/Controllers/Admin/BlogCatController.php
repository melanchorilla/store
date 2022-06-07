<?php

namespace App\Http\Controllers\Admin;
use App\Http\Controllers\Controller;
error_reporting(0);
use App\BlogCat;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class BlogCatController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
      $blogcat = BlogCat::all();

      return view('admin.blogcat.index', [
        'folder' => 'modulblog',
        'menu' => 'blogcat',
        'blogcat' => $blogcat
      ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {

        return view('admin.blogcat.create', [
          'folder' => 'modulblog',
          'menu' => 'blogcat'
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
        //dd($request->all());
        $this->validate($request,[
          'nama' => 'required|min:3'
        ]);
        $blogcat = BlogCat::create([
          'nama' => $request->nama,
          'slug' => Str::slug($request->nama)
        ]);
        //return redirect()->back()->with('success','Data berhasil disimpan');
        return redirect()->route('blogcat.index')->with('success', 'Data berhasil disimpan');
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
      $blogcat = BlogCat::findorfail($id);

      return view('admin.blogcat.edit', [
        'folder' => 'modulblog',
        'menu' => 'blogcat',
        'blogcat' => $blogcat
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
      'nama' => 'required|min:3'
      ]);

      $blogcat_data = [
        'nama' => $request->nama,
        'slug' => Str::slug($request->nama)
      ];

      BlogCat::whereId($id)->update($blogcat_data);
      return redirect()->route('blogcat.index')->with('success', 'Data berhasil diupdate');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
      $blogcat = BlogCat::findorfail($id);
      $blogcat->delete();

      return redirect()->back()->with('success', 'Data berhasil dihapus');
    }
}
