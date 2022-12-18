@extends('adminlte::page')

@section('title', 'Dashboard')

@section('content_header')
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">Menu Principal</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="admin/">Home</a></li>
                        <li class="breadcrumb-item active">Menu Principal</li>
                    </ol>
                </div>
            </div>
        </div>
    </div>
@stop

@section('content')
    <div class="container-fluid">
        <div class="row">
            <!--//*notas arrendatarios*//-->
            <div class="col-lg-3 col-6">
                <!-- small box -->
                <div class="small-box bg-warning">
                    <div class="inner">
                        <h3>5</h3>
                        <p>Total de usuarios</p>
                    </div>
                    <div class="icon">
                        <i class="fas fa-fw fa-user-plus"></i>
                    </div>
                    <a href="admin/usuarios"
                        class="small-box-footer">Mas Informacion<i class="fas fa-arrow-circle-right"
                            aria-hidden="true"></i></a>
                </div>
            </div>
            <!--//!notas cobrar*//-->
            <div class="col-lg-3 col-6">
                <div class="small-box bg-success">
                    <div class="inner">
                        <h3>3177.00<sup style="font-size: 20px">$</sup></h3>
                        <p>Deuda general</p>
                    </div>
                    <div class="icon">
                        <i class="fas fa-fw fa-chart-bar"></i>
                    </div>
                    <a href="admin/cobros" class="small-box-footer">Mas
                        informacion<i class="fas fa-arrow-circle-right" aria-hidden="true"></i></a>
                </div>
            </div>
            <!--//?notas deuda*//-->
            <div class="col-lg-3 col-6">
                <!-- small box -->
                <div class="small-box bg-info">
                    <div class="inner">
                        <h3>2</h3>

                        <p>Usuarios en deuda</p>
                    </div>
                    <div class="icon">
                        <i class="fas fa-fw fa-wallet"></i>
                    </div>
                    <a href="admin/cobros" class="small-box-footer">Mas
                        Informacion<i class="fas fa-arrow-circle-right" aria-hidden="true"></i></a>
                </div>
            </div>
            <!--//*notas mora*//-->
            <div class="col-lg-3 col-6">
                <!-- small box -->
                <div class="small-box bg-danger">
                    <div class="inner">
                        <h3>0.00<sup style="font-size: 20px">$</sup></h3>

                        <p>Mora general</p>
                    </div>
                    <div class="icon">
                        <i class="fas fa-fw fa-chart-pie"></i>
                    </div>
                    <a href="admin/pagos" class="small-box-footer">Mas
                        informacion<i class="fas fa-arrow-circle-right" aria-hidden="true"></i></a>
                </div>
            </div>
        </div>

        <!-- //TODO Wigets -->
        <div class="row">
            <div class="col-lg-6">
                <!-- Calendar -->
                <div class="card bg-gradient-success">
                    <div class="card-header border-0">
                        <h3 class="card-title">
                            <i class="far fa-calendar-alt"></i>
                            Calendario
                        </h3>
                        <!-- tools card -->
                        <div class="card-tools">
                            <!-- button with a dropdown -->
                            <div class="btn-group">
                            </div>
                            <button type="button" class="btn btn-success btn-sm" data-card-widget="collapse">
                                <i class="fas fa-minus"></i>
                            </button>
                        </div>
                        <!-- /. tools -->
                    </div>
                    <!-- /.card-header -->
                    <div class="card-body pt-0">
                        <!--The calendar -->
                        <div id="calendar" style="width: 100%"></div>
                    </div>
                    <!-- /.card-body -->
                </div>
            </div>

            <!-- //*DONUT CHART -->
            <div class="col-lg-6">
                <div class="card card-danger">
                    <div class="card-header">
                        <h3 class="card-title">Deudas</h3>

                        <div class="card-tools">
                            <button type="button" class="btn btn-tool" data-card-widget="collapse">
                                <i class="fas fa-minus" aria-hidden="true"></i>
                            </button>
                        </div>
                    </div>
                    <div class="card-body">
                        <canvas id="donutChart"
                            style="min-height: 221px; height: 220.87px; max-height: 221px; max-width: 100%; display: block; box-sizing: border-box; width: 219.13px;"
                            width="252" height="254"></canvas>
                    </div>
                    <!-- /.card-body -->
                </div>
            </div>
        </div>
    </div>
@stop

@section('css')

@stop

@section('js')
    <script>
        console.log('Hi!');
        // The Calender
        $(function() {
            $('#calendar').datetimepicker({
                locale: 'es',
                format: 'L',
                inline: true,
            });
        });
    </script>
@stop
