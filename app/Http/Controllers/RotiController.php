<?php

namespace App\Http\Controllers;

use App\Models\roti;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Storage;
class RotiController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $Request)
    {
        $katakunci = $Request->katakunci;
        $baris = 5;
        if(strlen($katakunci)){
        $data = roti::where('id','like',"%$katakunci%")
        ->orWhere('nama','like',"%$katakunci%")
        ->orWhere('harga','like',"%$katakunci%")
        ->orWhere('desc','like',"%$katakunci%")
        ->paginate($baris);
        }else {
            $data = roti::orderBy ('id','desc')->paginate($baris);
        }
      
        return view('roti.index')->with('data',$data);

   
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('roti.create', [
            'title' => 'Tambah Barang',
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
      
        Session::flash('harga', $request->harga);
        Session::flash('nama', $request->nama);
        Session::flash('desc', $request->desc);
        Session::flash('category', $request->category);
        $request->validate([
            'harga' => 'required|numeric',
            'nama' => 'required|unique:roti',
            'desc' => 'required',
            'category' => 'required',
            'foto' => 'required|image|file|max:10000'
        ], [
            'harga.required' => 'Nomor induk wajib diisi',
            'harga.numeric' => 'Nomor induk wajib diisi dalam angka',
            'nama.required' => 'Nama wajib diisi',
            'nama.unique' => 'Nama sudah ada',
            'desc.required' => 'Descripsi wajib diisi',
            'foto.required' => 'Silakan masukkan foto',
            'foto.image' => 'Foto hanya diperbolehkan berekstensi JPEG, JPG, PNG, dan GIF'
        ]);

        $foto_file = $request->file('foto');
        $foto_ekstensi = $foto_file->extension();
        $foto_nama = date('ymdhis') . "." . $foto_ekstensi;
        $foto_file->move(public_path('foto'), $foto_nama);

        $data = [
            'harga' => $request->input('harga'),
            'nama' => $request->input('nama'),
            'category' => $request->input('category'),
            'desc' => $request->input('desc'),
            'foto' => $foto_nama
        ];
        roti::create($data);
        return redirect('/roti')->with('success', 'Berhasil memasukkan data');

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
        $data = roti::where('id', $id)->first();
        return view('roti/edit')->with('data', $data);
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


        Session::flash('desc', $request->desc);
        Session::flash('nama', $request->nama);
        Session::flash('harga', $request->harga);
        // Session::flash('category', $request->category);

        $request->validate([
            'nama' => 'required',
            'desc' => 'required',
            'harga' => 'required',
            // 'category' => 'required'
        ], [
            'harga.numeric' => 'harga wajib diisi dalam angka',
            'nama.required' => 'Nama wajib diisi',
            'desc.required' => 'desc wajib diisi',
        ]);

        $data = [
            'nama' => $request->input('nama'),
            'desc' => $request->input('desc'),
            'harga' => $request->input('harga'),
            // 'category' => $request->input('category'),
        ];

        if ($request->hasFile('foto')) {
            $request->validate([
                'foto' => 'image|file|max:10000'
            ], [
                'foto.image' => 'Foto hanya diperbolehkan berekstensi JPEG, JPG, PNG, dan GIF'
            ]);
            $foto_file = $request->file('foto');
            $foto_ekstensi = $foto_file->extension();
            $foto_nama = date('ymdhis') . "." . $foto_ekstensi;
            $foto_file->move(public_path('foto'), $foto_nama); //sudah terupload ke direktori

            $data_foto = roti::where('id', $id)->first();
            File::delete(public_path('foto') . '/' . $data_foto->foto);

           
            $data['foto'] = $foto_nama;
        }

        roti::where('id', $id)->update($data);
        return redirect('/roti')->with('success', 'Berhasil melakukan update data');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $data = roti::where('id', $id)->first();
        File::delete(public_path('foto') . '/' . $data->foto);

        roti::where('id', $id)->delete();
        return redirect('/roti')->with('success', 'Berhasil hapus data');
    }
}
