<?php

namespace App\Http\Controllers\Admin\Pagos;

use App\Http\Controllers\Controller;
use App\Models\cobro;
use App\Models\mora;
use App\Models\pago;
use Illuminate\Http\Request;

class PagosController extends Controller
{
    public function index()
    {
        $data = pago::all();
        $count = pago::count();
        return view('admin/pagos/index', compact('data', 'count'));
    }
    public function create()
    {
        $data = cobro::join('inclino', 'cobro.id_arrendatario', '=', 'inclino.id')->select('inclino.*', 'cobro.*')->get();
        return view('admin/pagos/add', compact('data'));
    }
    public function search(cobro $cobro)
    {
        $data = cobro::join('inclino', 'cobro.id_arrendatario', '=', 'inclino.id')->join('mora', 'mora.id_usuario', '=', 'cobro.id_arrendatario')->select('inclino.*', 'cobro.*', 'mora.id_usuario', 'mora.total_mora')->where('cobro.id', $cobro->id)->first();
        return $data;
    }
    public function register(Request $request){
        $pago = new pago;
        $pago -> nombre = $request->input('nombre');
        $pago -> total_personas = $request->input('familia');
        $pago -> fecha_ingreso = $request->input('fecha_ingreso');
        $pago -> valor_alq = $request->input('valor_alq');
        $pago -> deuda_inmueble = $request->input('deuda_inmueble');
        $pago -> serv_luz = $request->input('serv_luz');
        $pago -> serv_agua = $request->input('serv_agua');
        $pago -> serv_extra = $request->input('serv_extra');
        $pago -> total = $request->input('total');
        $pago -> inmueble = $request->input('alquiler_base');
        $pago -> luz = $request->input('pago_luz');
        $pago -> agua = $request->input('pago_agua');
        $pago -> extra = $request->input('pago_extra');
        $pago -> importe_pagado = $request->input('total_final');
        $pago -> mora = $request->input('final_mora');
        $pago -> pago_mora = $request->input('pagar_mora');
        $pago -> fecha_pago = $request->input('fecha_pago');
        $pago -> importe_final = $request->input('deuda_general');
        $pago -> pago_final = $request->input('importe_general');
        $pago -> deuda_actual = $request->input('deuda_actual');
        $pago -> save();

        $mora = mora::where('id_usuario', '=', $request->input('id'))->first();
        $mora -> total_mora = $request->input('mora_deuda');

        $cobro = cobro::find($request->input('id_cobro'));
        $cobro -> deuda_inmueble = $request->input('alquiler_final');
        $cobro -> serv_luz = $request->input('luz_final');
        $cobro -> serv_agua = $request->input('agua_final');
        $cobro -> serv_extra = $request->input('extra_final');
        $cobro -> total = $request->input('importe_final');

        $this -> update($mora, $cobro);

        return redirect('admin/pagos')->with('SUCCESS', true);
    }
    public function update($mora, $cobro){
        $mora->save();
        $cobro->save();
    }
}
