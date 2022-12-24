<?php

namespace App\Http\Controllers\Admin\Usuario;

use App\Http\Controllers\Controller;
use App\Models\inclino;
use Illuminate\Http\Request;

class UsuarioController extends Controller
{
    public function index()
    {
        $data = inclino::all();
        $count = inclino::count();
        return view('admin.usuarios.index', compact('data'), compact('count'));
    }
    public function create()
    {
        return view('admin.usuarios.add');
    }
    public function edit(inclino $inclino)
    {
        return view('admin.usuarios.edit', compact('inclino'));
    }
    public function delete($id)
    {
        $record = inclino::find($id);
        abort_if($record === null, 404, 'Record not found');
        $record->delete();
    }
    public function register(Request $request)
    {
        $user = new inclino;
        $user->nombre = $request->input('nombre');
        $user->piso = $request->input('piso');
        $user->valor_alq = $request->input('precio');
        $user->total_personas = $request->input('familia');
        $user->fecha_ingreso = $request->input('fecha_ingreso');
        $user->save();

        return redirect('admin/usuarios')->with('SUCCESS', true);
    }
    public function update(Request $request,inclino $inclino){
        $inclino->nombre = $request->input('nombre');
        $inclino->piso = $request->input('piso');
        $inclino->valor_alq = $request->input('precio');
        $inclino->total_personas = $request->input('familia');
        $inclino->fecha_ingreso = $request->input('fecha_ingreso');

        $inclino->save();
        return redirect('admin/usuarios')->with('EDIT', true);
    }
}
