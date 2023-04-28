<?php

namespace App\Http\Controllers;

use App\Models\cart;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;;
class CartController extends Controller
{
   public function cart(Request $request){
        $cart =new cart;
        $cart->user_id= Auth::user()->id;
       $cart->roti_id=$request->roti_id;
        $cart->save();
        return redirect('/')->with('success', 'Berhasil memasukkan roti ke cart');
    }

    // static function cartItem(){
    //         $userId= Auth::user()->id;
    //         return cart::where('user_id', $userId)->count();
        
       
    // }
    public function cartpage(){
        $userId= Auth::user()->id;
        $roti = cart::where('user_id', $userId)->get();
        return view('cart.index')->with('roti', $roti);
    }
    function hapuscart($id) {
        cart::where('id', $id)->delete();;
        return redirect()->to('')->with('erorr', 'Berhasil menghapus data cart');
      }
         
}
