<?php

use App\Http\Controllers\Admin\Cobros\CobrosController;
use App\Http\Controllers\Admin\HomeController;
use App\Http\Controllers\Admin\Usuario\UsuarioController;
use Illuminate\Support\Facades\Route;

Route::get('', [HomeController::class, 'index'])->name('admin.dashboard');

Route::controller(UsuarioController::class)->group(function(){
    Route::get('/usuarios','index')->name('usuarios.dashboard');
    Route::get('/usuarios/add','create');
    Route::post('/usuarios/add/register','register');
    Route::get('/usuarios/edit/{inclino}','edit')->name('edit');
    Route::put('/usuarios/update/{inclino}', 'update')->name('usuarios.update');
    Route::delete('/usuarios/delete/{id}','delete')->name('delete');
});

Route::controller(CobrosController::class)->group(function(){
    Route::get('/cobros', 'index')->name('cobros.dashboard');
    Route::get('/cobros/add', 'create')->name('cobros.add');
});