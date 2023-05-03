<?php

namespace App\Http\Controllers;

use App\Models\category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $category = category::orderBy('id', 'desc')->get();
        return view('category.index')->with('category', $category);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('category.create', [
            'title' => 'Tambah category',
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
        Session::flash('category', $request->category);
     



        $request->validate([
            'category' => 'required',

        ], [
            'category.required' => 'category  wajib diisi',

        ]);



        $category = [
            'category' => $request->input('category'),

        ];


        category::create($category);
        return redirect()->to('/category')->with('success', 'Berhasil menambahkan category ');
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

    public function tampil()
    {
        $category = category::orderBy('id', 'desc')->get();
        return view('roti.create')->with('category', $category);
    }

    // public function oke($id)
    // {
    //     $category = category::orderBy('id', 'desc')->get();
    //     return view('roti.edit')->with('category', $category);
    // }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $category = category::where('id', $id)->first();
        return view('category.edit')->with('category', $category);
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
      

        $request->validate([
            'category' => 'required',
            
        ],);

        $category = [
            'category' => $request->input('category'),
           
        ];
        category::where('id', $id)->update($category);
        return redirect('/category')->with('success', 'Berhasil melakukan update data');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        category::where('id', $id)->delete();
        return redirect('/category')->with('success', 'Berhasil hapus data');
    }
}
