<?php

namespace App\Http\Controllers\Admin\Usuario;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class UsuarioController extends Controller
{
    public function index(){
        return view('admin.usuarios.index');
    }
    public function create(){
        return view('admin.usuarios.add');
    }
    public function edit(){
        return view('admin.usuarios.edit');
    }
}
