<?php

use App\Http\Controllers\Frontend\TicketsController;
use Illuminate\Support\Facades\Route;
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
Route::get('/front', function () {
    return view('frontend.home');
});
// Route::get('/front/ticket', function () {
//     return view('frontend.ticket');
// });

Route::get('/front/ticket', [TicketsController::class,'index'])
    ->name('frontend.ticket');

// Route::get('/frontend/ticket', [
//     TicketsController::class,
//     'FrontEndTicketsIndex'])
// ->name('frontend.ticket')
// ->missing(function (Request $request) {
//     return Redirect::route('frontend.home');
// });


// if ($_SERVER['REQUEST_URI'] != '/nova') { Route::get('/{page}', function($page) { return view("pages.{$page}"); }); }