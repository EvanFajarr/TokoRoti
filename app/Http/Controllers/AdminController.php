<?php

namespace App\Http\Controllers;

use App\Models\roti;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    public function index(){
      return view('admin.index');
    }
    public function detail($id){
      $roti = roti::find($id);
      return view('detail/index',['roti'=>$roti]);
  }
}
