@extends('adminlte::page')

@section('title', 'Dashboard')

@section('content_header')
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">Realizar cobro</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}">Home</a></li>
                        <li class="breadcrumb-item active">Realizar cobro</li>
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
            <form method="POST" action="{{ route('cobros.update', $data) }}">
                @csrf
                @method('PUT')
                <div class="card-body">
                    <div class="row">
                        <!--//?Nombre-->
                        <div class="col-md-6">
                            <div class="form-group">
                                <label>Nombre</label>
                                <input type="hidden" class="form-control" id="id" placeholder="ID" name="id"
                                    readonly="readonly" value="{{ $data->id_arrendatario }}">
                                <input type="text" class="form-control" id="nombre" placeholder="Ingresar nombre"
                                    name="nombre" readonly="readonly" value="{{ $data->nombre }}">
                            </div>
                        </div>
                        <!--//?huespedes-->
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="exampleInputPassword1">Número de huespedes</label>
                                <input type="text" class="form-control" id="totalpersonas" placeholder="Nº de compañeros"
                                    name="familia" readonly="readonly" value="{{ $data->total_personas }}">
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
                                        name="fecha_ingreso" readonly="readonly" id="fecha_ingreso"
                                        value="{{ $data->fecha_ingreso }}">
                                </div>
                                <!-- /.input group -->
                            </div>
                        </div>
                        <!--//?Precio inicial-->
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="exampleInputPassword1">Alquiler</label>
                                <div class="input-group">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text">$</span>
                                    </div>
                                    <input type="text" class="form-control" name="precio" readonly="readonly"
                                        id="valor_alq" value="{{ $data->valor_alq }}">
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
                                <label for="exampleInputPassword1">Consumo de luz</label>
                                <div class="input-group mb-3">
                                    <input type="text" class="form-control" id="tarifa_luz" placeholder="00.00"
                                        name="tarifa_luz" onchange="sumarluces();">
                                    <div class="input-group-append">
                                        <span class="input-group-text">kWh</span>
                                    </div>
                                </div>

                            </div>
                        </div>
                        <!--//?precio Kwh-->
                        <div class="col-md-2">
                            <div class="form-group">
                                <label for="exampleInputPassword1">Precio por kWh</label>

                                <div class="input-group mb-3">
                                    <input type="text" class="form-control" id="kwh" placeholder="00.00"
                                        name="kwh" value="0.6517" onchange="sumarluces();">
                                    <div class="input-group-append">
                                        <span class="input-group-text">$</span>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!--//?IGV-->
                        <div class="col-md-2">
                            <div class="form-group">
                                <label for="exampleInputPassword1">IGV</label>

                                <div class="input-group mb-3">
                                    <input type="text" class="form-control" id="igv" placeholder="00.00"
                                        name="igv" value="18" onchange="sumarluces();">
                                    <div class="input-group-append">
                                        <span class="input-group-text">%</span>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!--//?tarifa de agua-->
                        <div class="col-md-2">
                            <div class="form-group">
                                <label for="exampleInputPassword1">Tarifa de agua</label>
                                <div class="input-group mb-3">
                                    <input type="text" class="form-control" id="tarifa_agua" placeholder="00.00"
                                        name="tarifa_agua" value="10.00" onchange="calcularagua();sumarAguaMes();">
                                    <div class="input-group-append">
                                        <span class="input-group-text">$</span>
                                    </div>
                                </div>

                            </div>
                        </div>
                        <!--//?añadir costos extra-->
                        <div class="col-md-2">
                            <div class="form-group">
                                <label for="exampleInputPassword1">Costos extra</label>
                                <div class="input-group mb-3">
                                    <input type="text" class="form-control" id="addExtra" placeholder="00.00"
                                        name="addExtra" value="10.00" onchange="sumarServiciosExtra();">
                                    <div class="input-group-append">
                                        <span class="input-group-text">$</span>
                                    </div>
                                </div>

                            </div>
                        </div>
                        <!--//?añadir luz opcion 2-->
                        <div class="col-md-2">
                            <div class="form-group">
                                <label for="exampleInputPassword1">Luz opcion 2</label>
                                <div class="input-group mb-3">
                                    <input type="text" class="form-control" id="addLuz" placeholder="00.00"
                                        name="addLuz" onchange="sumarlucesVer2();">
                                    <div class="input-group-append">
                                        <span class="input-group-text">$</span>
                                    </div>
                                </div>

                            </div>
                        </div>

                        <div class="card card-primary card-outline col-md-12">
                        </div>
                        <!--//?Precio deuda-->
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="exampleInputPassword1">Deuda Alquiler</label>
                                <div class="input-group">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text">$</span>
                                    </div>
                                    <input type="text" class="form-control is-valid" name="deuda" id="deuda"
                                        onchange="sumar();" value="{{ $data->deuda_inmueble }}" readonly="readonly">
                                    <input type="hidden" class="form-control" name="deuda2" id="deuda2"
                                        value="{{ $data->deuda_inmueble }}">
                                    <div class="input-group-append">
                                        <span class="input-group-text">.00</span>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!--//?Precio luz-->
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="exampleInputPassword1">Servicio de luz</label>
                                <div class="input-group">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text">$</span>
                                    </div>
                                    <input type="text" class="form-control" name="luz"
                                        onchange="sumar(); sumarluces();" id="luz" value="{{ $data->serv_luz }}"
                                        readonly="readonly">
                                    <input type="hidden" class="form-control" name="luz2" id="luz2"
                                        value="{{ $data->serv_luz }}">
                                    <div class="input-group-append">
                                        <span class="input-group-text">.00</span>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!--//?Precio agua-->
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="exampleInputPassword1">Servicio de agua</label>
                                <div class="input-group">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text">$</span>
                                    </div>
                                    <input type="text" class="form-control is-valid" name="agua"
                                        onchange="sumar();" id="agua" value="{{ $data->serv_agua }}"
                                        readonly="readonly">
                                    <input type="hidden" class="form-control" name="agua2" id="agua2"
                                        value="{{ $data->serv_agua }}">
                                    <div class="input-group-append">
                                        <span class="input-group-text">.00</span>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!--//?Precio extra-->
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="exampleInputPassword1">Servicios extra</label>
                                <div class="input-group">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text">$</span>
                                    </div>
                                    <input type="text" class="form-control is-valid" name="extra"
                                        onchange="sumar();" id="extra" value="{{ $data->serv_extra }}"
                                        readonly="readonly">
                                    <input type="hidden" class="form-control" name="extra2" id="extra2"
                                        value="{{ $data->serv_extra }}">
                                    <div class="input-group-append">
                                        <span class="input-group-text">.00</span>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!--//?Precio total-->
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="exampleInputPassword1">Total a pagar</label>
                                <div class="input-group">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text">$</span>
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
    <script>
        console.log('Hi!');
        //*Suma de cobros
        function sumar() {
            var deuda = document.getElementById('deuda').value;
            var luz = document.getElementById('luz').value;
            var agua = document.getElementById('agua').value;
            var extra = document.getElementById('extra').value;

            if (deuda !== '' && luz !== '' && agua !== '' && extra !== '') {
                var suma = parseFloat(deuda) + parseFloat(luz) + parseFloat(agua) + parseFloat(extra);
                document.getElementById('total').value = suma;
            }
        }
        //*Calcular luz sumando lo anterior
        function sumarluces() {
            let tarifa_luz = document.getElementById('tarifa_luz').value;
            let hpreciokwh = document.getElementById('kwh').value;
            let igv = document.getElementById('igv').value;
            let luzdeuda = document.getElementById('luz2').value;
            if (tarifa_luz == '') {
                tarifa_luz = 0;
            }
            if (hpreciokwh !== '' && tarifa_luz !== '' && igv !== '' && luz !== '') {
                let sumaluz = (parseFloat(tarifa_luz) * parseFloat(hpreciokwh));
                let impuesto = parseFloat(sumaluz) * (parseFloat(igv) / 100);
                let total = (parseFloat(sumaluz) + parseFloat(impuesto) + parseFloat(luzdeuda)).toFixed(1);
                document.getElementById('luz').value = total;
                document.getElementById('addLuz').value = '';
                sumar();
            }
        }
        //*Calcular agua sumando lo anterior
        function sumarAguaMes() {
            let companeros = document.getElementById('totalpersonas').value;
            let agua = document.getElementById('tarifa_agua').value;
            let aguaInicial = document.getElementById('agua2').value;

            if (companeros !== '' && agua !== '') {
                let total = ((parseFloat(companeros) * parseFloat(agua)) + parseFloat(aguaInicial)).toFixed(1);
                document.getElementById('agua').value = total;
                sumar();
            }
        }
        //*Calcular servicios extra sumando lo anterior
        function sumarServiciosExtra() {
            let extra = document.getElementById('extra2').value;
            let extraAnterior = document.getElementById('addExtra').value;

            if (extra !== '' && extraAnterior !== '') {
                let total = (parseFloat(extra) + parseFloat(extraAnterior)).toFixed(1);
                document.getElementById('extra').value = total;
                sumar();
            }
        }
        //*Calcular deuda del alquiler sumando lo anterior
        function sumarAlquiler() {
            let alquiler = document.getElementById('valor_alq').value;
            let alquilerAnterior = document.getElementById('deuda2').value;

            if (alquiler !== '' && alquilerAnterior !== '') {
                let total = (parseFloat(alquiler) + parseFloat(alquilerAnterior)).toFixed(1);
                document.getElementById('deuda').value = total;
            }
        }
        //*Calcular luces sumando lo anterior version 2
        function sumarlucesVer2() {
            let addLuz = document.getElementById('addLuz').value;
            let luzdeuda = document.getElementById('luz2').value;
            if (addLuz == '') {
                addLuz = 0;
            }
            if (addLuz !== '' && luzdeuda !== '') {
                let sumaLuzV2 = (parseFloat(addLuz) + parseFloat(luzdeuda)).toFixed(1);
                document.getElementById('luz').value = sumaLuzV2;
                document.getElementById('tarifa_luz').value = '';
                sumar();
            }
        }

        function calcularagua() {
            let companeros = document.getElementById('totalpersonas').value;
            let agua = document.getElementById('tarifa_agua').value;

            if (companeros !== '' && agua !== '') {
                let total = companeros * agua;
                document.getElementById('agua').value = total;
                sumar();
            }

        }
        window.onload = function arrancar() {
            sumarAguaMes();
            sumarServiciosExtra();
            sumarAlquiler();
            sumar();
        }
    </script>
@stop
