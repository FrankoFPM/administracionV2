@extends('adminlte::page')

@section('title', 'Dashboard')

@section('content_header')
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">Añadir cobros</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}">Home</a></li>
                        <li class="breadcrumb-item active">Añadir cobros</li>
                    </ol>
                </div>
            </div>
        </div>
    </div>
@stop

@section('content')
    <div class="col-sm-12">
        <div class="card card-primary">
            <div class="card-header">
                <h3 class="card-title">Añadir cobros</h3>
            </div>
            <!-- /.card-header -->
            <!-- form start -->
            <form method="POST" action="add/register">
                @csrf
                <div class="card-body">
                    <div class="row">
                        <!--//?Nombre-->
                        <div class="col-md-6">
                            <div class="form-group">
                                <label>Nombre</label>
                                <input type="hidden" class="form-control" id="id" placeholder="ID" name="id"
                                    readonly="readonly">
                                <input type="hidden" class="form-control" id="nombre" placeholder="Ingresar nombre"
                                    name="nombre" readonly="readonly">
                                <!---->
                                <select class="form-control select2" style="width: 100%;" id="listaname" required
                                    onchange='llenarInput(this.value)' name="arrendatario">
                                    <option selected="selected" disabled>[Seleccionar]</option>
                                    @foreach ($usuario as $inclino)
                                        <option value='{{ $inclino->id }}'>{{ $inclino->nombre }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <!--//?huespedes-->
                        <div class="col-md-6">
                            <div class="form-group">
                                <label>Número de huespedes</label>
                                <input type="text" class="form-control" id="totalpersonas" placeholder="Nº de compañeros"
                                    name="familia" readonly="readonly" onchange="calcularagua();">
                            </div>
                        </div>
                        <!--//?Fecha de ingreso-->
                        <div class="col-md-6">
                            <div class="form-group">
                                <label>Fecha de ingreso</label>
                                <div class="input-group">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text"><i class="far fa-calendar-alt"></i></span>
                                    </div>
                                    <input type="text" class="form-control" data-inputmask-alias="datetime"
                                        data-inputmask-inputformat="yyyy-mm-dd" data-mask="" inputmode="numeric"
                                        name="fecha_ingreso" readonly="readonly" id="fecha_ingreso">
                                </div>
                                <!-- /.input group -->
                            </div>
                        </div>
                        <!--//?Precio inicial-->
                        <div class="col-md-6">
                            <div class="form-group">
                                <label>Alquiler</label>
                                <div class="input-group">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text"><i class="fa fa-dollar-sign"></i></span>
                                    </div>
                                    <input type="text" class="form-control" name="precio" readonly="readonly"
                                        id="valor_alq">
                                    <div class="input-group-append">
                                        <span class="input-group-text">.00</span>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="card card-primary card-outline col-md-12">
                        </div>
                        <!--//?tarifa luz-->
                        <div class="col-md-2">
                            <div class="form-group">
                                <label>Consumo de luz</label>
                                <div class="input-group mb-3">
                                    <input type="text" class="form-control" id="tarifa_luz" placeholder="00.00"
                                        name="tarifa_luz" onchange="sumarluz();">
                                    <div class="input-group-append">
                                        <span class="input-group-text">kWh</span>
                                    </div>
                                </div>

                            </div>
                        </div>
                        <!--//?precio Kwh-->
                        <div class="col-md-2">
                            <div class="form-group">
                                <label>Precio por kWh</label>

                                <div class="input-group mb-3">
                                    <input type="text" class="form-control" id="kwh" placeholder="00.00"
                                        name="kwh" value="0.6517" onchange="sumarluz();">
                                    <div class="input-group-append">
                                        <span class="input-group-text"><i class="fa fa-dollar-sign"></i></span>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!--//?IGV-->
                        <div class="col-md-2">
                            <div class="form-group">
                                <label>IGV</label>

                                <div class="input-group mb-3">
                                    <input type="text" class="form-control" id="igv" placeholder="00.00"
                                        name="igv" value="18" onchange="sumarluz();">
                                    <div class="input-group-append">
                                        <span class="input-group-text">%</span>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!--//?tarifa de agua-->
                        <div class="col-md-2">
                            <div class="form-group">
                                <label>Tarifa de agua</label>
                                <div class="input-group mb-3">
                                    <input type="text" class="form-control" id="tarifa_agua" placeholder="00.00"
                                        name="tarifa_agua" value="10.00" onchange="calcularagua();">
                                    <div class="input-group-append">
                                        <span class="input-group-text"><i class="fa fa-dollar-sign"></i></span>
                                    </div>
                                </div>

                            </div>
                        </div>
                        <!--//?añadir costos extra-->
                        <div class="col-md-2">
                            <div class="form-group">
                                <label>Costos extra</label>
                                <div class="input-group mb-3">
                                    <input type="text" class="form-control" id="addExtra" placeholder="00.00"
                                        name="addExtra" value="10.00" onchange="calcularExtra();">
                                    <div class="input-group-append">
                                        <span class="input-group-text"><i class="fa fa-dollar-sign"></i></span>
                                    </div>
                                </div>

                            </div>
                        </div>
                        <!--//?añadir luz opcion 2-->
                        <div class="col-md-2">
                            <div class="form-group">
                                <label>Luz opcion 2</label>
                                <div class="input-group mb-3">
                                    <input type="text" class="form-control" id="addLuz" placeholder="00.00"
                                        name="addLuz" onchange="sumarluzVer2();">
                                    <div class="input-group-append">
                                        <span class="input-group-text"><i class="fa fa-dollar-sign"></i></span>
                                    </div>
                                </div>

                            </div>
                        </div>
                        <div class="card card-primary card-outline col-md-12">
                        </div>
                        <!--//?Precio deuda-->
                        <div class="col-md-6">
                            <div class="form-group">
                                <label>Deuda Alquiler</label>
                                <div class="input-group">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text"><i class="fa fa-dollar-sign"></i></span>
                                    </div>
                                    <input type="text" class="form-control" name="deuda" id="deuda"
                                        onchange="sumar();" id="deuda">
                                    <div class="input-group-append">
                                        <span class="input-group-text">.00</span>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!--//?Precio luz-->
                        <div class="col-md-6">
                            <div class="form-group">
                                <label>Servicio de luz</label>
                                <div class="input-group">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text"><i class="fa fa-dollar-sign"></i></span>
                                    </div>
                                    <input type="text" class="form-control" name="luz" onchange="sumar();"
                                        id="luz">
                                    <div class="input-group-append">
                                        <span class="input-group-text">.00</span>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!--//?Precio agua-->
                        <div class="col-md-6">
                            <div class="form-group">
                                <label>Servicio de agua</label>
                                <div class="input-group">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text"><i class="fa fa-dollar-sign"></i></span>
                                    </div>
                                    <input type="text" class="form-control" name="agua" onchange="sumar();"
                                        id="agua">
                                    <div class="input-group-append">
                                        <span class="input-group-text">.00</span>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!--//?Precio extra-->
                        <div class="col-md-6">
                            <div class="form-group">
                                <label>Servicios extra</label>
                                <div class="input-group">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text"><i class="fa fa-dollar-sign"></i></span>
                                    </div>
                                    <input type="text" class="form-control" name="extra" onchange="sumar();"
                                        id="extra">
                                    <div class="input-group-append">
                                        <span class="input-group-text">.00</span>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!--//?Precio total-->
                        <div class="col-md-6">
                            <div class="form-group">
                                <label>Total a pagar</label>
                                <div class="input-group">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text"><i class="fa fa-dollar-sign"></i></span>
                                    </div>
                                    <input type="text" class="form-control" name="total" id="total"
                                        readonly="readonly">
                                    <div class="input-group-append">
                                        <span class="input-group-text">.00</span>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- /.card-body -->
                <div class="card-footer">
                    <button type="submit" class="btn btn-primary float-right" name="enviar">Registrar</button>
                </div>
            </form>
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
    <script src="{{ asset('js/cobros.js') }}"></script>
    <script>
        console.log('Hi!');
    </script>
@stop
