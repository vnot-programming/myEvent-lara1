<?php

use App\Http\Controllers\Frontend\HomeController;
use App\Http\Controllers\Frontend\TicketsController;
use Illuminate\Support\Facades\Route;
// use Barryvdh\Debugbar;
use Barryvdh\Debugbar\Facades\Debugbar;
use PhpOffice\PhpSpreadsheet\Writer\Pdf\Tcpdf;
use PhpParser\Node\Stmt\TryCatch;

// use Illuminate\Http\Request;
// use Illuminate\Support\Facades\Redirect;
/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

// Route::get('/', function () {
//     return view('welcome');
// });
Route::get('/', function () {
    return view('welcome');
});
Route::get('/front', [HomeController::class,'index'])
    ->name('frontend.home');
Route::get('/front/ticket', [TicketsController::class,'index'])
    ->name('frontend.ticket');


// if ($_SERVER['REQUEST_URI'] != '/nova') { Route::get('/{page}', function($page) { return view("pages.{$page}"); }); }
