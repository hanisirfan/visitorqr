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
Route::get('/visitors/edit/{uuid}', [VisitorController::class, 'edit'])->name('visitors.edit');
Route::post('/visitors/edit/{uuid}', [VisitorController::class, 'edit']);
Route::get('/visitors/delete', [VisitorController::class, 'delete'])->name('visitors.delete');
Route::post('/visitors/delete', [VisitorController::class, 'delete']);
Route::get('/visitors/checkin/verify/{uuid}', [VisitorController::class, 'checkInVerify'])->name('visitors.check.in.verify');
Route::post('/visitors/checkin/verify/{uuid}', [VisitorController::class, 'checkInVerify']);
Route::get('/visitors/checkout/verify/{uuid}', [VisitorController::class, 'checkOutVerify'])->name('visitors.check.out.verify');
Route::post('/visitors/checkout/verify/{uuid}', [VisitorController::class, 'checkOutVerify']);

Route::get('/scanner', [ScannerController::class, 'index'])->name('scanner');
Route::get('/scanner/checkin', [ScannerController::class, 'checkin'])->name('scanner.check.in');
Route::get('/scanner/checkout', [ScannerController::class, 'checkout'])->name('scanner.check.out');
