<?php

namespace App\Http\Controllers\Admin;
use App\Http\Controllers\Controller;
error_reporting(0);
use App\BlogCat;
use App\Blog;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class BlogController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
      $blog = Blog::all();

      return view('admin.blog.index', [
        'folder' => 'modulblog',
        'menu' => 'blog',
        'blog' => $blog
      ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $blogcat = BlogCat::all();

        return view('admin.blog.create', [
          'folder' => 'modulblog',
          'menu' => 'blog',
          'blogcat' => $blogcat,
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
        //$post = Post::create($request->all());
      //  $blog = Blog::all();
        $this->validate($request,[
          'nama' => 'required',
          //'kategori' => 'required',
          'konten' => 'required',
          'gambar1' => 'required|image|mimes:jpg,png,jpeg,gif|max:2048',
        ]);

        $gambar1 = $request->gambar1;
        if($gambar1){
          $new_gambar1 = time().str_replace(' ', '-', $gambar1->getClientOriginalName());
          $gambar1->move('public/assets/blog/', $new_gambar1);
        }else{
          $new_gambar1 = "";
        }

        $blog = Blog::create([
          'nama' => $request->nama,
          // 'kategoriblog_id' => $request->kategori,
          'konten' => $request->konten,
          'gambar1' => $new_gambar1,
          'meta_title' => $request->meta_title,
          'meta_description' => $request->meta_description,
          'meta_keyword' => $request->meta_keyword,
          'slug' => Str::slug($request->nama)
        ]);

        return redirect()->route('blog.index')->with('success','Data berhasil disimpan');
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
      $blogcat = BlogCat::all();
      $blog = Blog::findorfail($id);

      return view('admin.blog.edit', [
        'folder' => 'modulblog',
        'menu' => 'blog',
        'blog' => $blog,
        'blogcat' => $blogcat,
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
        //'kategori' => 'required',
        'konten' => 'required',
        'gambar1' => 'image|mimes:jpg,png,jpeg,gif|max:2048',
      ]);

      //$blog = Produk::findorfail($id);

      if($request->has('gambar1')){
        $gambar1 = $request->gambar1;
        $new_gambar1 = time().str_replace(' ', '-', $gambar1->getClientOriginalName());
        $gambar1->move('public/assets/blog/', $new_gambar1);
      }else{
        $new_gambar1 = $request->gambar_lama1;
      }

      $blog_data = [
        'nama' => $request->nama,
        // 'kategoriblog_id' => $request->kategori,
        'konten' => $request->konten,
        'gambar1' => $new_gambar1,
        'meta_title' => $request->meta_title,
        'meta_description' => $request->meta_description,
        'meta_keyword' => $request->meta_keyword,
        'slug' => Str::slug($request->nama)
      ];

      Blog::whereId($id)->update($blog_data);
      return redirect()->route('blog.index')->with('success', 'Data berhasil diupdate');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
      $blog = Blog::findorfail($id);
      $blog->delete();

      return redirect()->back()->with('success', 'Data berhasil dihapus');
    }
}
