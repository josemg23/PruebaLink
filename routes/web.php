<?php

use App\Http\Controllers\Api\RolController;
use Illuminate\Support\Facades\Route;

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

Route::get('/home', 'HomeController@index')->name('home');


Route::prefix('admin')->middleware('auth')->group(function(){

    Route::get('/lista-rol',[RolController::class, 'index'])->name('rol.index');
    Route::get('/crear-rol',[RolController::class, 'CreateRol'])->name('rol.create');
   

   


});