<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\ScannerController;
use App\Http\Controllers\VisitorController;

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

Route::get('/visitors/view/{uuid}', [VisitorController::class, 'index'])->name('visitors.view');
Route::get('/visitors/add', [VisitorController::class, 'create'])->name('visitors.add');
Route::post('/visitors/add', [VisitorController::class, 'create']);

Route::get('/scanner', [ScannerController::class, 'index'])->name('scanner');
