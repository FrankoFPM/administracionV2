@extends('adminlte::page')

@section('title', 'Dashboard')

@section('content_header')
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">Editar arrendatario</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="{{route('admin.dashboard');}}">Home</a></li>
                        <li class="breadcrumb-item active">Editar arrendatario</li>
                    </ol>
                </div>
            </div>
        </div>
    </div>
@stop

@section('content')
    <div class="card card-primary">
        <div class="card-header">
            <h3 class="card-title">Registrar arrendatario</h3>
        </div>
        <form method="POST" action="{{ route('usuarios.update', $inclino) }}">
            @csrf
            @method('PUT')
            <div class="card-body">
                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="exampleInputEmail1">Nombre</label>
                            <input type="text" class="form-control" id="exampleInputEmail1" placeholder="Ingresar nombre"
                                name="nombre" value="{{$inclino->nombre}}">
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="exampleInputPassword1">Piso</label>
                            <input type="text" class="form-control" id="exampleInputPassword1"
                                placeholder="Piso de alojamiento" name="piso" value="{{$inclino->piso}}">
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="exampleInputPassword1">Valor del alquiler</label>
                            <div class="input-group">
                                <div class="input-group-prepend">
                                    <span class="input-group-text">$</span>
                                </div>
                                <input type="text" class="form-control" name="precio" value="{{$inclino->valor_alq}}">
                                <div class="input-group-append">
                                    <span class="input-group-text">.00</span>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="exampleInputPassword1">Número de huespedes</label>
                            <input type="text" class="form-control" id="exampleInputPassword1"
                                placeholder="Nº de huespedes" name="familia" value="{{$inclino->total_personas}}">
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label>Fecha de ingreso</label>
                            <div class="input-group">
                                <div class="input-group-prepend">
                                    <span class="input-group-text"><i class="far fa-calendar-alt"></i></span>
                                </div>
                                <input type="text" class="form-control" data-inputmask-alias="datetime"
                                    data-inputmask-inputformat="yyyy-mm-dd" data-mask="" inputmode="numeric"
                                    name="fecha_ingreso" value="{{$inclino->fecha_ingreso}}">
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="card-footer">
                <button type="submit" class="btn btn-primary float-right" name="enviar">Registrar</button>
            </div>
        </form>
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
    <script>
        console.log('Hi!');
        //Datemask dd/mm/yyyy
        $('#datemask').inputmask('dd/mm/yyyy', {
            'placeholder': 'dd/mm/yyyy'
        })
        $('[data-mask]').inputmask();
    </script>
@stop
