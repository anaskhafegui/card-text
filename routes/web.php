<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\TestImage;

use App\Http\Controllers\DesignController;
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

Route::get('/', [TestImage::class, 'allCards']);


Route::get('/design/{design}',[TestImage::class,'card'])->name('addtext');

Route::post('/testimage/{design}', [TestImage::class, 'addText']);

Route::resource('designs', DesignController::class);

