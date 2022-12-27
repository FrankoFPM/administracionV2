@extends('adminlte::page')

@section('title', 'Dashboard')

@section('content_header')
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">Administrar pagos</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}">Home</a></li>
                        <li class="breadcrumb-item active">Administrar pagos</li>
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
                    <th>Nº Huespedes</th>
                    <th>Fecha ingreso</th>
                    <th>Precio Alquiler</th>
                    <th>Importe alq.</th>
                    <th>Mora</th>
                    <th>Importe general</th>
                    <th>Fecha pago</th>
                    <th>Importe pagado</th>
                    <th>Deuda final</th>
                    <th>Acciones</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($data as $cobro)
                    <tr>
                        <td>{{ $cobro->id }}</td>
                        <td>{{ $cobro->nombre }}</td>
                        <td>{{ $cobro->total_personas }}</td>
                        <td>{{ $cobro->fecha_ingreso }}</td>
                        <td>{{ $cobro->valor_alq }}</td>
                        <td>{{ $cobro->total }}</td>
                        <td>{{ $cobro->mora }}</td>
                        <td>{{ $cobro->importe_final }}</td>
                        <td>{{ $cobro->fecha_pago }}</td>
                        <td>{{ $cobro->pago_final }}</td>
                        <td>{{ $cobro->deuda_actual }}</td>
                        <td>
                            <a href="pagos/{{ $cobro->id }}" class="btn btn-primary btn-success"><i
                                    class="fa fa-file-pdf"></i>&nbsp;Generar recibo</a>
                        </td>
                    </tr>
                @endforeach
            </tbody>
            <tfoot>
                <tr>
                    <th>ID</th>
                    <th>Nombre</th>
                    <th>Nº Huespedes</th>
                    <th>Fecha ingreso</th>
                    <th>Precio Alquiler</th>
                    <th>Importe alq.</th>
                    <th>Mora</th>
                    <th>Importe general</th>
                    <th>Fecha pago</th>
                    <th>Importe pagado</th>
                    <th>Deuda final</th>
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
                    <a href="pagos/add" class="btn btn-app bg-success">
                        <span class="badge bg-purple">{{ $count }}</span>
                        <i class="fas fa-dollar-sign"></i>
                        <h6>Registrar pago</h6>
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
        @if (session('SUCCESS'))
            Swal.fire({
                html: '<video width="70%"autoplay src="../video/hecho.mp4"></video><br><p>Pago registrado correctamente!</p>',
                icon: 'success',
                type: 'success',
                title: 'Registrado!',
                timer: 10000,
                timerProgressBar: true,
            })
        @endif
    </script>
@stop
