<?php

namespace App\Http\Controllers;
use App\Models\alamat;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;

class AlamatController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $alamat = alamat::orderBy('id', 'desc')->get();
        return view('alamat.index')->with('alamat', $alamat);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('alamat.create', [
            'title' => 'Tambah alamat',
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
        Session::flash('desa', $request->desa);
        Session::flash('kecamatan', $request->kecamatan);
        Session::flash('kabupaten', $request->kabupaten);
        Session::flash('patokan', $request->patokan);



        $request->validate([
            'desa' => 'required',
            'kecamatan' => 'required',
            'kabupaten' => 'required',
            'patokan' => 'nullable|max:255',

        ]);



        $alamat = [
            'desa' => $request->input('desa'),
            'kecamatan' => $request->input('kecamatan'),
            'kabupaten' => $request->input('kabupaten'),
            'patokan' => $request->input('patokan'),



        ];


        alamat::create($alamat);
        return redirect()->to('/alamat')->with('success', 'Berhasil menambahkan alamat ');
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


    //  public function tampil()
    //  {
    //      $alamat = alamat::orderBy('id', 'desc')->get();
    //      return view('order.index')->with('alamat', $alamat);
    //  }

    public function edit($id)
    {
        $alamat = alamat::where('id', $id)->first();
        return view('alamat.edit')->with('alamat', $alamat);
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
        Session::flash('desa', $request->desa);
        Session::flash('kecamatan', $request->kecamatan);
        Session::flash('kabupaten', $request->kabupaten);
        Session::flash('patokan', $request->patokan);
        $request->validate([
            'desa' => 'required',
            'kecamatan' => 'required',
            'kabupaten' => 'required',
            'patokan' => 'nullable|max:255',
        ],);

        $alamat = [
            'desa' => $request->input('desa'),
            'kecamatan' => $request->input('kecamatan'),
            'kabupaten' => $request->input('kabupaten'),
            'patokan' => $request->input('patokan'),
        ];
        alamat::where('id', $id)->update($alamat);
        return redirect('/alamat')->with('success', 'Berhasil melakukan update data');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        alamat::where('id', $id)->delete();
        return redirect('/alamat')->with('success', 'Berhasil hapus data');
    }
}
