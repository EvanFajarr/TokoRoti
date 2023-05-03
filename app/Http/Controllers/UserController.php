<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;

class UserController extends Controller
{
    public function index(Request $Request){
      
        $katakunci = $Request->katakunci;
        $baris = 15;
        if(strlen($katakunci)){
        $user = User::where('alamat','like',"%$katakunci%")
        ->orWhere('name','like',"%$katakunci%")
        ->orWhere('no','like',"%$katakunci%")
        ->orWhere('role','like',"%$katakunci%")
        ->orWhere('email','like',"%$katakunci%")
        ->paginate($baris);
        }else {
            $user = User::orderBy ('id','desc')->paginate($baris);
        }
      
        return view('user.index')->with('user',$user);

   
    } 

    public function create()
    {
        return view('user.create');
    }

    public function store(Request $request)
    {
        Session::flash('alamat', $request->alamat);
        Session::flash('name', $request->name);
        Session::flash('email', $request->email);
        Session::flash('no', $request->no);
        Session::flash('role', $request->role);
        Session::flash('password', $request->password);

        $request->validate([
            'alamat' => 'required',
            'name' => 'required',
            'email' => 'required|email|unique:users',
            'no' => 'required',
            'role' => 'required',
            'password' => 'required|min:8',
        ], [
            'name' => 'Name wajib diisi',
            'alamat' => 'alamat harus diisi',
            'no' => 'nomor handphone harus diisi',
            'no.min' => 'nomor handphone  harus lebih dari 10',
            'email' => 'Email wajib diisi',
            'email.email' => 'Silahkan masukan email dengan benar',
            'email.unique' => 'Email sudah digunakan, silakan masukkan email yang lain',
            'password' => 'Pasword wajib diisi',
            'password.min' => 'Pasword harus lebih dari 8',
        ]);



        $User = [
            'name' => $request->name,
            'alamat' => $request->alamat,
            'no' => $request->no,
            'email' => $request->email,
            'role' => $request->role,
            'password' => Hash::make($request->password)
        ];


        User::create($User);
        return redirect()->to('user')->with('success', 'Berhasil menambahkan Data User ');
    }
    public function destroy($id)
    {
        User::where('id', $id)->delete();
        return redirect()->to('user')->with('success', 'Berhasil menghapus  data');
    }
}
