<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\DataPasienController;
use App\Http\Controllers\InputPasienController;
use App\Http\Controllers\TiketController;
use App\Http\Controllers\CetakController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\indexController;


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

Route::get('/', [indexController::class, 'index'])->name('login.index');

// Route::get('/profil', function () {
//     return view('profil');
// });

Route::get('/profil', [App\Http\Controllers\ProfileController::class, 'index'])->name('profile','admin');

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::resource('/data_pasien',DataPasienController::class)->middleware('auth','admin');

Route::get('/pasien-show/{id}',[App\Http\Controllers\DataPasienController::class, 'show_'])->name('show_')->middleware('auth');
Route::get('/pasien-edit/{id}',[App\Http\Controllers\DataPasienController::class, 'edit_'])->name('edit_')->middleware('auth');

Route::get('/tiket-show/{id}',[App\Http\Controllers\TiketController::class, 'show_'])->name('show_')->middleware('auth');
Route::get('/tiket-edit/{id}',[App\Http\Controllers\TiketController::class, 'edit_'])->name('edit_')->middleware('auth');

Route::resource('/input_data',InputPasienController::class);

Route::resource('/tiket',TiketController::class)->middleware('auth','admin');

// Route::get('/action',[TiketController::class,'action'])->name('tiket.action');

//ROUTE DATA PASIEN

// Route::resource(DataPasienController::class)->group(function () {
//     Route::get('/data_pasien/index', 'index');
//     Route::get('/data_pasien/create', 'create');
//     Route::get('/data_pasien/edit/{id}', 'edit');
//     Route::post('/data_pasien/store', 'store');
//     Route::post('/data_pasien/update', 'update');
//     Route::get('/data_pasien/delete/{id}', 'destroy');
// });


Route::resource('/pesan',CetakController::class);

Route::get('cetak_pdf/{id}', [App\Http\Controllers\CetakController::class,'cetak_pdf'])->name('cetak_pdf');

// // // login
// Route::get('login',LoginController::class, 'login');

//LOGIN & LOGOUT
Route::get('/login', [LoginController::class, 'index'])->name('login')->middleware('guest');
Route::post('/login',[LoginController::class,'authenticate']);
Route::post('/logout',[LoginController::class,'logout']);

//REGISTER
Route::get('/register',[RegisterController::class,'index'])->middleware('guest');
Route::post('/register',[RegisterController::class,'store']);

Route::get('/export/data_pasien',[App\Http\Controllers\DataPasienController::class, 'dataExport'])->name('dataExport');

Route::get('/export/Kunjungan&Tiket',[App\Http\Controllers\TiketController::class, 'tiketExport'])->name('tiketExport');


// Route::get('online-user', 'App\Http\Controllers\UserController@index');
Route::resource('/online-user',UserController::class);



// Route::resource('/admin/data_pasien',AdminCategoryController::class)->except('show');
