<?php
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CartController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\RotiController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\SaranController;
use App\Http\Controllers\AlamatController;
use App\Http\Controllers\CategoryController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

// Route::get('/', function () {
//     return view('welcome');
// });





    Route::resource('roti',RotiController::class)->middleware(['admin']);
    Route::get('/admin',[AdminController::class,'index'])->middleware(['admin']);






Route::resource('/',HomeController::class);
Route::get('/detail/{id}',[AdminController::class,'detail']);




Route::get('/login',[LoginController::class,'index'])->name('login')->middleware(['user']);
Route::post('/login/login',[LoginController::class,'login']);
//register
Route::get('/login/register',[LoginController::class,'register'])->middleware(['user']);
Route::post('/login/create',[LoginController::class,'create']);
//logout
Route::post('/logout',[LoginController::class,'logout']);


//cart
Route::post('/addtocart',[CartController::class,'cart'])->name('addtocart')->middleware(['session']);


Route::get('cartlist',[CartController::class,'cartpage'])->name('cartlist')->middleware(['session']);
Route::get('/hapuscart/{id}',[CartController::class,'hapuscart']);


//order
Route::get('/checkout',[OrderController::class,'index'])->middleware(['session']);
Route::post('/checkout',[OrderController::class,'store']);

//order tampil admin
Route::get('/orderList',[OrderController::class,'admin'])->middleware(['admin']);
//order tampil userr
Route::get('/orderUser',[OrderController::class,'user']);


//order edit 
Route::get('/edit/{id}',[OrderController::class,'edit'])->middleware(['admin']);
Route::put('/edit/{id}',[OrderController::class,'update']);

//get data user
Route::get('/user',[UserController::class,'index'])->middleware(['admin']);
//create user n admin
Route::get('/user/create',[UserController::class,'create'])->middleware(['admin']);
Route::post('/user/create',[UserController::class,'store']);

Route::delete('/delete/{id}',[UserController::class,'destroy'])->middleware(['admin']);


Route::resource('/',HomeController::class);

Route::resource('/saran', SaranController::class);


Route::resource('category',CategoryController::class)->middleware(['admin']);

Route::get('/roti/create',[CategoryController::class,'tampil']);
// Route::get('/roti/{id}/edit',[CategoryController::class,'oke']);


Route::resource('alamat',AlamatController::class)->middleware(['session']);


Route::delete('/hapus/{id}',[OrderController::class,'destroy']);


// Route::get('/checkout',[AlamatController::class,'tampil']);


//send email
Route::get('sendEmail', function () {
    \Mail::raw('haloo pelanggan baru', function ($message) {
        $message->to('evanafajar12455@gmail.com', 'Evan');
        $message->subject('regist');
    });
});