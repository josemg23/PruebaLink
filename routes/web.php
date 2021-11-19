<?php

use App\Http\Controllers\Api\RolController;
use App\Http\Controllers\Api\UserController;
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

    Route::get('/lista-rol',              [RolController::class, 'index'])->name('rol.index');
    Route::get('/crear-rol',              [RolController::class, 'CreateRol'])->name('rol.create');
    Route::POST('/store-rol',             [RolController::class, 'StoreRol'])->name('rol.store');
    Route::get('show-rol/{role}',         [RolController::class,'ShowRole'])->name('rol.show');
    Route::get('edit-rol/{role}',         [RolController::class,'EditRole'])->name('rol.edit');
    Route::put('update-rol/{role}',       [RolController::class,'UpdateRol'])->name('rol.update');
    Route::delete('eliminar-rol/{role}',  [RolController::class,'destroy'])->name('rol.destroy');
  
   

    Route::get('/lista-usuarios',         [UserController::class, 'index'])->name('user.index');
    Route::get('/crear-user',             [UserController::class, 'CreateUser'])->name('user.create');
    Route::POST('/store-user',            [UserController::class, 'StoreUser'])->name('user.store');
    Route::get('show-user/{user}',        [UserController::class,'ShowUser'])->name('user.show');
    Route::get('edit-user/{user}',        [UserController::class,'EditUser'])->name('user.edit');
    Route::put('update-user/{user}',      [UserController::class,'UpdateUser'])->name('user.update');
    Route::delete('eliminar-user/{user}', [UserController::class,'destroy'])->name('user.destroy');


});