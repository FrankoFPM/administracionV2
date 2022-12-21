<?php

use App\Http\Controllers\Admin\HomeController;
use App\Http\Controllers\Admin\Usuario\UsuarioController;
use Illuminate\Support\Facades\Route;

Route::get('', [HomeController::class, 'index']);

Route::controller(UsuarioController::class)->group(function(){
    Route::get('/usuarios','index');
    Route::get('/usuarios/add','create');
    Route::get('/usuarios/edit','edit');
});