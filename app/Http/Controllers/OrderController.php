<?php

namespace App\Http\Controllers;


use App\Models\cart;
use App\Models\roti;
use App\Models\order;
use App\Models\alamat;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;

class OrderController extends Controller
{

public function index(){
    // $userId= Auth::user()->id;
    // $roti = cart::where('user_id', $userId)->get();
    // return view('order.index')->with('roti', $roti);


    return view('order.index', [
        'alamat' => alamat::orderBy('id', 'desc')->get(),
        $userId= Auth::user()->id,
        'roti' => cart::where('user_id', $userId)->get(),
    ]);
}

public function store(Request $request)
    {
        if($request->isMethod('POST')){
            $validate = $request->validate([
                'nama' => 'required',
                'alamat' => 'required',
                'no' => 'required',
                'pembayaran' => 'required',
                'note' => 'nullable|max:255',
                'item' => 'required',
            ]);
            $order = new order;
            $order->user_id = Auth::user()->id;
            $order->nama = $request['nama'];
            $order->no = $request['no'];
            $order->note = $request['note'];
            $order->alamat = $request['alamat'];
            $order->pembayaran = $request['pembayaran'];
            $order->tanggal = date('Y-m-d');
            $order->status = 'terkirim';
            $order->item = $request['item'];
            if($order->save()){
                Session::forget('cart');
                return redirect('/')->with('success', 'Berhasil Transaksi');
            }

        }
        return view('checkout')->with('data', $data)->with('session', $session)->with('success', 'Berhasil Transaksi');
    }

    public function admin(Request $Request){
      
        $katakunci = $Request->katakunci;
        $baris = 10;
        if(strlen($katakunci)){
        $order = order::where('alamat','like',"%$katakunci%")
        ->orWhere('nama','like',"%$katakunci%")
        ->orWhere('item','like',"%$katakunci%")
        ->orWhere('status','like',"%$katakunci%")
        ->paginate($baris);
        }else {
            $order = order::orderBy ('id','desc')->paginate($baris);
        }
      
        return view('admin.order')->with('order',$order);

   
    }   

    public function user() {
        $userId= Auth::user()->id;
        $order = order::where('user_id', $userId)->get();
        return view('home.order')->with('order', $order);
    }
    public function edit($id)
    {
        $order = order::where('id', $id)->first();
        return view('admin.edit')->with('order', $order);
    }
    public function update(Request $request, $id)
    {
        $request->validate([
            'status' => 'required',
           
           

        ], [
            'status.required' => 'status wajib diisi',
         
        ]);
        $order = [
            'status' => $request->status,

        ];
        
        order::where('id', $id)->update($order);
        return redirect()->to('orderList')->with('success', 'Berhasil mengubah status');
    }
    
    public function destroy($id)
    {
        order::where('id', $id)->delete();
        return redirect('/')->with('success', 'Berhasil hapus order');
    }
}
