<?php

namespace App\Http\Controllers\Admin\Usuario;

use App\Http\Controllers\Controller;
use App\Models\inclino;
use Illuminate\Http\Request;

class UsuarioController extends Controller
{
    public function index(){
        $data = inclino::all();
        return view('admin.usuarios.index', compact('data'));
    }
    public function create(){
        return view('admin.usuarios.add');
    }
    public function edit(){
        return view('admin.usuarios.edit');
    }
}
