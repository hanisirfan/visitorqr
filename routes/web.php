<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\QRFormsController;
use App\Http\Controllers\ScannerController;

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

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', [HomeController::class, 'index'])->name('home');

Route::get('/qrforms', [QRFormsController::class, 'index'])->name('qrforms');
Route::get('/qrforms/add', [QRFormsController::class, 'create'])->name('qrforms.add');

Route::get('/scanner', [ScannerController::class, 'index'])->name('scanner');
