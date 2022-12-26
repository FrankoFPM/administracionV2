<?php

namespace App\Http\Controllers\Admin\Cobros;

use App\Http\Controllers\Controller;
use App\Models\cobro;
use App\Models\inclino;
use App\Models\mora;
use App\Models\vinclinosincobro;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class CobrosController extends Controller
{
    public function index()
    {
        $data = cobro::join('inclino', 'cobro.id_arrendatario', '=', 'inclino.id')->select('inclino.*', 'cobro.*')->get();
        $count = cobro::count();
        return view('admin.cobros.index', compact('data', 'count'));
    }
    public function create()
    {
        $usuario = vinclinosincobro::all();
        return view('admin.cobros.add', compact('usuario'));
    }
    public function search(inclino $inclino)
    {
        return $inclino;
    }
    public function register(Request $request)
    {
        $cobro = new cobro;
        $cobro->deuda_inmueble = $request->input('deuda');
        $cobro->serv_luz = $request->input('luz');
        $cobro->serv_agua = $request->input('agua');
        $cobro->serv_extra = $request->input('extra');
        $cobro->total = $request->input('total');
        $cobro->id_arrendatario = $request->input('arrendatario');
        $cobro->save();

        $mora = new mora;
        $mora->total_mora = 0;
        $mora->id_usuario  = $request->input('arrendatario');
        $mora->save();

        return redirect('admin/cobros')->with('SUCCESS', true);
    }
    public function edit(cobro $cobro)
    {
        $data = cobro::join('inclino', 'cobro.id_arrendatario', '=', 'inclino.id')->select('inclino.*', 'cobro.*')->where('cobro.id', $cobro->id)->first();
        return view('admin/cobros/edit', compact('data'));
        //return $data;
    }
    public function delete(cobro $cobro)
    {
        $cobro->delete();
    }
    public function update(Request $request, cobro $cobro)
    {
        $cobro->deuda_inmueble = $request->input('deuda');
        $cobro->serv_luz = $request->input('luz');
        $cobro->serv_agua = $request->input('agua');
        $cobro->serv_extra = $request->input('extra');
        $cobro->total = $request->input('total');
        $cobro->id_arrendatario = $request->input('id');
        $cobro->save();

        return redirect('admin/cobros')->with('EXITO', true);
    }
}
