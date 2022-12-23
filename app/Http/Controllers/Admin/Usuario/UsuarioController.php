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
    public function edit()
    {
        return view('admin.usuarios.edit');
    }
    public function delete($id)
    {
        $record = inclino::find($id);
        abort_if($record === null, 404, 'Record not found');
        $record->delete();
        return response()->json([
            'success' => true,
            'message' => 'Record deleted'
        ]);
        //return redirect()->back();
    }
}
