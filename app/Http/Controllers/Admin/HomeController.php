<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\inclino;
use App\Models\vdeuda;
use App\Models\vdeudageneral;
use App\Models\vtotalmora;
use App\Models\vusuariosdeuda;

class HomeController extends Controller
{
    public function index(){
        $count = inclino::count();
        $usuarioChart = vdeuda::all();
        $totalD = vdeudageneral::first()->total;
        $usuariosD = vusuariosdeuda::count();
        $mora = vtotalmora::first()->total_mora;
        return view('admin.index')->with(['count'=> $count,'total'=> $totalD, 'usuarios'=> $usuariosD, 'mora'=> $mora, 'chartU' => $usuarioChart]);
    }
}
