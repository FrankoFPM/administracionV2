<?php

namespace App\Http\Controllers\Admin\Cobros;

use App\Http\Controllers\Controller;
use App\Models\cobro;
use Illuminate\Http\Request;

class CobrosController extends Controller
{
    public function index(){
        $data = cobro::all();
        $count = cobro::count();
        return view('admin.cobros.index', compact('data', 'count'));
    }
}
