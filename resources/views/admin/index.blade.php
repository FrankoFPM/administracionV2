@extends('adminlte::page')

@section('title', 'Dashboard')

@section('content_header')
    <h1>Menu Principal</h1>
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
                        <i class="ion ion-person-add"></i>
                    </div>
                    <a href="http://192.168.1.234:8080/Administracion/admin/arrendatario/index.php"
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
                        <i class="ion ion-stats-bars"></i>
                    </div>
                    <a href="http://192.168.1.234:8080/Administracion/admin/cobros/index.php" class="small-box-footer">Mas
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
                        <i class="ion ion-bag"></i>
                    </div>
                    <a href="http://192.168.1.234:8080/Administracion/admin/cobros/index.php" class="small-box-footer">Mas
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
                        <i class="ion ion-pie-graph"></i>
                    </div>
                    <a href="http://192.168.1.234:8080/Administracion/admin/pagos/index.php" class="small-box-footer">Mas
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
                            <i class="far fa-calendar-alt" aria-hidden="true"></i>
                            Calendario
                        </h3>
                        <!-- tools card -->
                        <div class="card-tools">
                            <!-- button with a dropdown -->
                            <div class="btn-group">
                            </div>
                            <button type="button" class="btn btn-success btn-sm" data-card-widget="collapse">
                                <i class="fas fa-minus" aria-hidden="true"></i>
                            </button>
                        </div>
                        <!-- /. tools -->
                    </div>
                    <!-- /.card-header -->
                    <div class="card-body pt-0">
                        <!--The calendar -->
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
    </script>
@stop
