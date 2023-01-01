@extends('adminlte::page')

@section('title', 'Dashboard')

@section('content_header')
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">Registrar pago</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}">Home</a></li>
                        <li class="breadcrumb-item active">Registrar pago</li>
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
                <h3 class="card-title">Informacion</h3>
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
                                <input type="hidden" class="form-control" id="id" name="id"
                                    readonly="readonly">
                                <input type="hidden" class="form-control" id="id_cobro" name="id_cobro"
                                    readonly="readonly">
                                <input type="hidden" class="form-control" id="nombre" placeholder="Ingresar nombre"
                                    name="nombre" readonly="readonly">
                                <!---->
                                <select class="form-control select2" style="width: 100%;" id="listaname" required
                                    onchange='llenarInput2(this.value)' name="arrendatario">
                                    <option selected="selected" disabled>[Seleccionar]</option>
                                    @foreach ($data as $user)
                                        <option value='{{ $user->id }}'>{{ $user->nombre }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <!--//?huespedes-->
                        <div class="col-md-6">
                            <div class="form-group">
                                <label>Número de huespedes</label>
                                <input type="text" class="form-control" id="totalpersonas" placeholder="Nº de compañeros"
                                    name="familia" readonly="readonly">
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
                                        <span class="input-group-text">$</span>
                                    </div>
                                    <input type="text" class="form-control" name="valor_alq" readonly="readonly"
                                        id="valor_alq">
                                    <div class="input-group-append">
                                        <span class="input-group-text">.00</span>
                                    </div>
                                </div>
                            </div>
                        </div>


                    </div>
                </div>
                <!-- /.card-body -->

        </div>

        <!--//*Registrar pago-->
        <div class="card card-primary">
            <div class="card-header">
                <h3 class="card-title">Registrar pago</h3>
            </div>

            <div class="card-body">
                <div class="row">
                    <!--//?deuda alquiler-->
                    <div class="col-md-6">
                        <div class="form-group">
                            <label>Importe por Alquiler</label>
                            <div class="input-group mb-3">
                                <input type="text" class="form-control" id="deuda_inmueble" placeholder="00.00"
                                    name="deuda_inmueble" readonly="readonly">
                                <div class="input-group-append">
                                    <span class="input-group-text">$</span>
                                </div>
                            </div>

                        </div>
                    </div>
                    <!--//?alquiler-->
                    <div class="col-md-6">
                        <div class="form-group">
                            <label>Alquiler</label>
                            <div class="input-group mb-3">
                                <input type="text" class="form-control" id="alquiler_base" placeholder="00.00"
                                    name="alquiler_base" onchange="sumarPago();">
                                <div class="input-group-append">
                                    <span class="input-group-text">$</span>
                                </div>
                            </div>

                        </div>
                    </div>
                    <!--//?Costo luz-->
                    <div class="col-md-6">
                        <div class="form-group">
                            <label>Importe por Servicio de Luz</label>

                            <div class="input-group mb-3">
                                <input type="text" class="form-control" id="serv_luz" placeholder="00.00"
                                    name="serv_luz" readonly="readonly">
                                <div class="input-group-append">
                                    <span class="input-group-text">$</span>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!--//?luz-->
                    <div class="col-md-6">
                        <div class="form-group">
                            <label>Servicio de Luz</label>

                            <div class="input-group mb-3">
                                <input type="text" class="form-control" id="pago_luz" placeholder="00.00"
                                    name="pago_luz" onchange="sumarPago();">
                                <div class="input-group-append">
                                    <span class="input-group-text">$</span>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!--//?Costo agua-->
                    <div class="col-md-6">
                        <div class="form-group">
                            <label>Importe por Servicio de agua</label>
                            <div class="input-group mb-3">
                                <input type="text" class="form-control" id="serv_agua" placeholder="00.00"
                                    name="serv_agua" readonly="readonly">
                                <div class="input-group-append">
                                    <span class="input-group-text">$</span>
                                </div>
                            </div>

                        </div>
                    </div>
                    <!--//?agua-->
                    <div class="col-md-6">
                        <div class="form-group">
                            <label>Servicio de agua</label>
                            <div class="input-group mb-3">
                                <input type="text" class="form-control" id="pago_agua" placeholder="00.00"
                                    name="pago_agua" onchange="sumarPago();">
                                <div class="input-group-append">
                                    <span class="input-group-text">$</span>
                                </div>
                            </div>

                        </div>
                    </div>
                    <!--//?Costo extra-->
                    <div class="col-md-6">
                        <div class="form-group">
                            <label>Importe por Servicio extra</label>
                            <div class="input-group mb-3">
                                <input type="text" class="form-control" id="serv_extra" placeholder="00.00"
                                    name="serv_extra" readonly="readonly">
                                <div class="input-group-append">
                                    <span class="input-group-text">$</span>
                                </div>
                            </div>

                        </div>
                    </div>
                    <!--//?extra-->
                    <div class="col-md-6">
                        <div class="form-group">
                            <label>Servicio extra</label>
                            <div class="input-group mb-3">
                                <input type="text" class="form-control" id="pago_extra" placeholder="00.00"
                                    name="pago_extra" onchange="sumarPago();">
                                <div class="input-group-append">
                                    <span class="input-group-text">$</span>
                                </div>
                            </div>

                        </div>
                    </div>
                    <!--//?importe total-->
                    <div class="col-md-6">
                        <div class="form-group">
                            <label>Importe Total</label>
                            <div class="input-group mb-3">
                                <input type="text" class="form-control" id="total" placeholder="00.00"
                                    name="total" readonly="readonly">
                                <div class="input-group-append">
                                    <span class="input-group-text">$</span>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!--//?total-->
                    <div class="col-md-6">
                        <div class="form-group">
                            <label>Total pagado</label>
                            <div class="input-group mb-3">
                                <input type="text" class="form-control" id="total_final" placeholder="00.00"
                                    name="total_final" readonly="readonly">
                                <div class="input-group-append">
                                    <span class="input-group-text">$</span>
                                </div>
                            </div>
                        </div>
                        <!--//?fecha-->
                        <div class="form-group">
                            <label>Fecha</label>
                            <div class="input-group date" id="reservationdate" data-target-input="nearest">
                                <input type="text" class="form-control datetimepicker-input"
                                    data-target="#reservationdate" id="fecha_pago" name="fecha_pago">
                                <div class="input-group-append" data-target="#reservationdate"
                                    data-toggle="datetimepicker">
                                    <div class="input-group-text"><i class="fa fa-calendar"></i></div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

        </div>
        <!--//*Registrar mora-->
        <div class="card card-danger">
            <div class="card-header">
                <h3 class="card-title">Registrar mora</h3>
            </div>

            <div class="card-body">
                <div class="row">
                    <!--//?Dias retrasado-->
                    <div class="col-md-4">
                        <div class="form-group">
                            <label>Dias retrazados</label>
                            <div class="input-group mb-3">
                                <input type="number" class="form-control" id="dias_retrazado" placeholder="0"
                                    name="dias_retrazado" min="0" onchange="mora();">
                                <div class="input-group-append">
                                    <span class="input-group-text">#</span>
                                </div>
                            </div>
                            <label>Mora anterior</label>
                            <div class="input-group mb-3">
                                <input type="text" class="form-control" id="mora_anterior" placeholder="0"
                                    name="mora_anterior" readonly="readonly">
                                <div class="input-group-append">
                                    <span class="input-group-text">$</span>
                                </div>
                            </div>

                        </div>
                    </div>
                    <!--//?Tarifa de mora-->
                    <div class="col-md-4">
                        <div class="form-group">
                            <label>Tarifa de mora</label>
                            <div class="input-group mb-3">
                                <input type="number" class="form-control" id="tarifa_mora" placeholder="0"
                                    name="tarifa_mora" value="3" min="0" onchange="mora();">
                                <div class="input-group-append">
                                    <span class="input-group-text">$</span>
                                </div>
                            </div>
                            <label>Total final</label>
                            <div class="input-group mb-3">
                                <input type="text" class="form-control" id="final_mora" placeholder="0"
                                    name="final_mora" readonly="readonly">
                                <div class="input-group-append">
                                    <span class="input-group-text">$</span>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!--//?total de mora-->
                    <div class="col-md-4">
                        <div class="form-group">
                            <label>Total actual</label>
                            <div class="input-group mb-3">
                                <input type="text" class="form-control" id="total_mora" placeholder="0"
                                    name="total_mora" readonly="readonly">
                                <div class="input-group-append">
                                    <span class="input-group-text">$</span>
                                </div>
                            </div>
                            <label>Importe pagado</label>
                            <div class="input-group mb-3">
                                <input type="number" class="form-control" id="pagar_mora" placeholder="0"
                                    name="pagar_mora" min="0" onchange="pagoMora();">
                                <div class="input-group-append">
                                    <span class="input-group-text">$</span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>


        </div>

        <!--//*Resumen de pago-->
        <div class="card card-success">
            <div class="card-header">
                <h3 class="card-title">Resumen</h3>
            </div>

            <div class="card-body">
                <div class="row">
                    <!--//?deuda alquiler-->
                    <div class="col-md-6">
                        <div class="form-group">
                            <label>Alquiler</label>
                            <div class="input-group mb-3">
                                <input type="text" class="form-control" id="alquiler_final" placeholder="00.00"
                                    name="alquiler_final" readonly="readonly">
                                <div class="input-group-append">
                                    <span class="input-group-text">$</span>
                                </div>
                            </div>

                        </div>
                    </div>
                    <!--//?Costo luz-->
                    <div class="col-md-6">
                        <div class="form-group">
                            <label>Servicio de Luz</label>

                            <div class="input-group mb-3">
                                <input type="text" class="form-control" id="luz_final" placeholder="00.00"
                                    name="luz_final" readonly="readonly">
                                <div class="input-group-append">
                                    <span class="input-group-text">$</span>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!--//?Costo agua-->
                    <div class="col-md-6">
                        <div class="form-group">
                            <label>Servicio de agua</label>
                            <div class="input-group mb-3">
                                <input type="text" class="form-control" id="agua_final" placeholder="00.00"
                                    name="agua_final" readonly="readonly">
                                <div class="input-group-append">
                                    <span class="input-group-text">$</span>
                                </div>
                            </div>

                        </div>
                    </div>
                    <!--//?Costo extra-->
                    <div class="col-md-6">
                        <div class="form-group">
                            <label>Servicio extra</label>
                            <div class="input-group mb-3">
                                <input type="text" class="form-control" id="extra_final" placeholder="00.00"
                                    name="extra_final" readonly="readonly">
                                <div class="input-group-append">
                                    <span class="input-group-text">$</span>
                                </div>
                            </div>

                        </div>
                    </div>
                    <!--//?Costo total-->
                    <div class="col-md-6">
                        <div class="form-group">
                            <label>Total restante</label>
                            <div class="input-group mb-3">
                                <input type="text" class="form-control" id="importe_final" placeholder="00.00"
                                    name="importe_final" readonly="readonly">
                                <div class="input-group-append">
                                    <span class="input-group-text">$</span>
                                </div>
                            </div>

                        </div>
                    </div>
                    <!--//?total pagado-->
                    <div class="col-md-6">
                        <div class="form-group">
                            <label>Total pagado</label>
                            <div class="input-group mb-3">
                                <input type="text" class="form-control" id="total_pagado" name="total_pagado"
                                    placeholder="00.00" readonly="readonly">
                                <div class="input-group-append">
                                    <span class="input-group-text">$</span>
                                </div>
                            </div>

                        </div>
                    </div>
                    <div class="col-md-12">
                        <div class="card card-success card-outline">
                        </div>
                    </div>
                    <!--//?Mora-->
                    <div class="col-md-4">
                        <div class="form-group">
                            <label>Mora</label>
                            <div class="input-group mb-3">
                                <input type="   " class="form-control" id="mora_final" name="mora_final"
                                    placeholder="00.00" readonly="readonly">
                                <div class="input-group-append">
                                    <span class="input-group-text">$</span>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!--//?Mora pagada-->
                    <div class="col-md-4">
                        <div class="form-group">
                            <label>Mora pagada</label>
                            <div class="input-group mb-3">
                                <input type="   " class="form-control" id="mora_pagada" name="mora_pagada"
                                    placeholder="00.00" readonly="readonly">
                                <div class="input-group-append">
                                    <span class="input-group-text">$</span>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!--//?Importe final de Mora-->
                    <div class="col-md-4">
                        <div class="form-group">
                            <label>Total restante de mora</label>
                            <div class="input-group mb-3">
                                <input type="text" class="form-control" id="mora_deuda" name="mora_deuda"
                                    placeholder="00.00" readonly="readonly">
                                <div class="input-group-append">
                                    <span class="input-group-text">$</span>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-12">
                        <div class="card card-success card-outline">
                        </div>
                    </div>
                    <!--//?Mora pagada-->
                    <div class="col-md-4">
                        <div class="form-group">
                            <label>Deuda general</label>
                            <div class="input-group mb-3">
                                <input type="text" class="form-control" id="deuda_general" name="deuda_general"
                                    placeholder="00.00" readonly="readonly">
                                <div class="input-group-append">
                                    <span class="input-group-text"><i class="fa-solid fa-sack-dollar"></i></span>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!--//?Deuda restante-->
                    <div class="col-md-4">
                        <div class="form-group">
                            <label>Deuda Actual</label>
                            <div class="input-group mb-3">
                                <input type="text" class="form-control" id="deuda_actual" name="deuda_actual"
                                    placeholder="00.00" readonly="readonly">
                                <div class="input-group-append">
                                    <span class="input-group-text"><i class="fa-solid fa-file-invoice-dollar"></i></span>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!--//?Importe general pagado-->
                    <div class="col-md-4">
                        <div class="form-group">
                            <label>Importe general ingresado</label>
                            <div class="input-group mb-3">
                                <input type="text" class="form-control" id="importe_general" name="importe_general"
                                    placeholder="00.00" readonly="readonly">
                                <div class="input-group-append">
                                    <span class="input-group-text"><i class="fa-solid fa-money-bill-trend-up"></i></span>
                                </div>
                            </div>
                        </div>
                    </div>

                </div>
            </div>
            <div class="card-footer">
                <button type="submit" class="btn btn-success float-right" name="enviar">Registrar</button>
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
    <script src="{{ asset('js/datatables.js') }}"></script>
    <script src="{{ asset('js/pagos.js') }}"></script>
    <script>
        console.log('Hi!');
    </script>
@stop
