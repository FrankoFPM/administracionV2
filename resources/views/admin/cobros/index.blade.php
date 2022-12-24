@extends('adminlte::page')

@section('title', 'Dashboard')

@section('content_header')
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">Administrar cobros</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="{{route('admin.dashboard')}}">Home</a></li>
                        <li class="breadcrumb-item active">Administrar cobros</li>
                    </ol>
                </div>
            </div>
        </div>
    </div>
@stop

@section('content')
<div class="card-body">
    <table id="example1" class="table table-bordered table-striped">
        <thead>
            <tr>
                <th>ID</th>
                <th>Nombre</th>
                <th>N° de huespedes</th>
                <th>Fecha de ingreso</th>
                <th>Alquiler</th>
                <th>Deuda alquiler</th>
                <th>Serv. de luz</th>
                <th>Serv. de agua</th>
                <th>Serv. extra</th>
                <th>Total a pagar</th>
                <th>Acciones</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($data as $cobro)
            <tr>
                <td>{{$cobro->id}}</td>
                <td>{{$cobro->id_arrendatario}}</td>
                <td>{{$cobro->deuda_inmueble}}</td>
                <td>{{$cobro->serv_luz}}</td>
                <td>{{$cobro->serv_agua}}</td>
                <td>{{$cobro->serv_extra}}</td>
                <td>{{$cobro->total}}</td>
                        <a href="cobro.php" class="btn btn-primary btn-success"><i class="fa fa-sack-dollar"></i></i>&nbsp;Cobrar</a>
                        <a href="del.php" class="btn btn-danger btn-primary elimnarReg"><i class="fa fa-eraser"></i></i>&nbsp;Eliminar</a>
                </td>
            </tr>
            @endforeach
        </tbody>
        <tfoot>
            <tr>
                <th>ID</th>
                <th>Nombre</th>
                <th>N° de huespedes</th>
                <th>Fecha de ingreso</th>
                <th>Alquiler</th>
                <th>Deuda alquiler</th>
                <th>Serv. de luz</th>
                <th>Serv. de agua</th>
                <th>Serv. extra</th>
                <th>Total a pagar</th>
                <th>Acciones</th>
            </tr>
        </tfoot>
    </table>

</div>
<div class="col-md-12">
    <br>
    <div class="card card-primary">
        <div class="card-header">
            <h3 class="card-title">Acciones</h3>
        </div>
        <div class="card-body">
            <div class="col-md-7">
                <a href="cobros/add" class="btn btn-app bg-success">
                    <span class="badge bg-purple">{{$count}}</span>
                    <i class="fas fa-dollar-sign"></i>
                    <h6>Añadir nuevo cobro</h6>
                </a>
                <a href="#" class="btn btn-app bg-danger">
                    <span class="badge bg-purple">NEW</span>
                    <i class="fas fa-file-pdf"></i>
                    <h6>Generar reporte PDF</h6>
                </a>
            </div>
        </div>
    </div>
</div>
@stop

@section('footer')
    <div class="float-right d-none d-sm-inline">
        @php
            $user = auth()->user();
            $name = $user->name;
        @endphp
        {{ $name }}
    </div>
    <strong>Copyright &copy; 2022 <a href="#">Franco Pérez</a>.</strong> All rights reserved.
@stop
@section('css')

@stop

@section('js')
    <script src="https://cdn.jsdelivr.net/npm/axios/dist/axios.min.js"></script>
    <script src="{{ asset('js/datatables.js') }}"></script>
    <script>
        console.log('Hi!');
    </script>
@stop
