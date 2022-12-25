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
                                <label for="exampleInputPassword1">Número de huespedes</label>
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
                                <label for="exampleInputPassword1">Alquiler</label>
                                <div class="input-group">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text">$</span>
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
                                <label for="exampleInputPassword1">Consumo de luz</label>
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
                                <label for="exampleInputPassword1">Precio por kWh</label>

                                <div class="input-group mb-3">
                                    <input type="text" class="form-control" id="kwh" placeholder="00.00"
                                        name="kwh" value="0.6517" onchange="sumarluz();">
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
                                <label for="exampleInputPassword1">Tarifa de agua</label>
                                <div class="input-group mb-3">
                                    <input type="text" class="form-control" id="tarifa_agua" placeholder="00.00"
                                        name="tarifa_agua" value="10.00" onchange="calcularagua();">
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
                                        name="addExtra" value="10.00" onchange="calcularExtra();">
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
                                        name="addLuz" onchange="sumarluzVer2();">
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
                                <label for="exampleInputPassword1">Servicio de luz</label>
                                <div class="input-group">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text">$</span>
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
                                <label for="exampleInputPassword1">Servicio de agua</label>
                                <div class="input-group">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text">$</span>
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
                                <label for="exampleInputPassword1">Servicios extra</label>
                                <div class="input-group">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text">$</span>
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
        //select2
        $(function() {
            //Initialize Select2 Elements
            $('.select2').select2({
                theme: 'bootstrap4'
            })
        });

        //todo llenar inputs
        function llenarInput(valor) {
            $.ajax({
                type: "GET",
                url: "search/" + valor,
                dataType: "json",
                success: function(json) {
                    $("#id").val(json.id);
                    $("#nombre").val(json.nombre);
                    $("#totalpersonas").val(json.total_personas);
                    $("#fecha_ingreso").val(json.fecha_ingreso);
                    $("#valor_alq").val(json.valor_alq);
                    $("#deuda").val(json.valor_alq);
                    calcularagua();
                    calcularExtra();
                },
                error: function(xhr, status) {
                    Swal.fire({
                        title: 'Error',
                        text: 'Hubo un problema al procesar solicitud',
                        icon: 'error'
                    });
                }
            });
        };

        //*Calcular agua
        function calcularagua() {
            let companeros = document.getElementById('totalpersonas').value;
            let agua = document.getElementById('tarifa_agua').value;

            if (companeros !== '' && agua !== '') {
                let total = companeros * agua;
                document.getElementById('agua').value = total;
                sumar();
            }

        }
        //*Calcular luz version 2
        function calcularExtra() {
            let addExtra = document.getElementById('addExtra').value;
            if (addExtra == '') {
                addExtra = 0;
            }
            if (addExtra !== '') {
                let total = (addExtra * 1).toFixed(1);
                document.getElementById('extra').value = total;
                sumar();
            }
        }
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

        function sumarluz() {
            var tarifa_luz = document.getElementById('tarifa_luz').value;
            var hpreciokwh = document.getElementById('kwh').value;
            var igv = document.getElementById('igv').value;

            if (hpreciokwh !== '' && tarifa_luz !== '' && igv !== '') {
                var sumaluz = (tarifa_luz * hpreciokwh);
                var impuesto = sumaluz * (igv / 100);
                let total = (sumaluz + impuesto).toFixed(1);
                document.getElementById('luz').value = total;
                document.getElementById('addLuz').value = '';
                sumar();
            }
        }
        //*Calcular luz version 2
        function sumarluzVer2() {
            let addLuz = document.getElementById('addLuz').value;
            if (addLuz == '') {
                addLuz = 0;
            }
            if (addLuz !== '') {
                let total = (addLuz * 1).toFixed(1);
                document.getElementById('luz').value = total;
                document.getElementById('tarifa_luz').value = '';
                sumar();
            }
        }
    </script>
@stop
