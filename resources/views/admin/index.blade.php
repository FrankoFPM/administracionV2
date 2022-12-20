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
            <div class="col-lg-3 col-6">
                <div class="small-box bg-warning">
                    <div class="inner">
                        <h3>{{ $count }}</h3>
                        <p>Total de usuarios</p>
                    </div>
                    <div class="icon">
                        <i class="fas fa-fw fa-user-plus"></i>
                    </div>
                    <a href="admin/usuarios" class="small-box-footer">Más Informacion<i class="fas fa-arrow-circle-right"
                            aria-hidden="true"></i></a>
                </div>
            </div>
            <div class="col-lg-3 col-6">
                <div class="small-box bg-success">
                    <div class="inner">
                        <h3>{{ $total ?? 0 }}<sup style="font-size: 20px">$</sup></h3>
                        <p>Deuda general</p>
                    </div>
                    <div class="icon">
                        <i class="fas fa-fw fa-chart-bar"></i>
                    </div>
                    <a href="admin/cobros" class="small-box-footer">Más
                        informacion<i class="fas fa-arrow-circle-right" aria-hidden="true"></i></a>
                </div>
            </div>
            <div class="col-lg-3 col-6">
                <div class="small-box bg-info">
                    <div class="inner">
                        <h3>{{ $usuarios ?? 0 }}</h3>
                        <p>Usuarios en deuda</p>
                    </div>
                    <div class="icon">
                        <i class="fas fa-fw fa-wallet"></i>
                    </div>
                    <a href="admin/cobros" class="small-box-footer">Más
                        Informacion<i class="fas fa-arrow-circle-right" aria-hidden="true"></i></a>
                </div>
            </div>
            <div class="col-lg-3 col-6">
                <div class="small-box bg-danger">
                    <div class="inner">
                        <h3>{{ $mora ?? 0 }}<sup style="font-size: 20px">$</sup></h3>
                        <p>Mora general</p>
                    </div>
                    <div class="icon">
                        <i class="fas fa-fw fa-chart-pie"></i>
                    </div>
                    <a href="admin/pagos" class="small-box-footer">Más
                        informacion<i class="fas fa-arrow-circle-right" aria-hidden="true"></i></a>
                </div>
            </div>
        </div>
        <!-- Wigets -->
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
                                <i class="fas fa-minus"></i>
                            </button>
                        </div>
                    </div>
                    <div class="card-body">
                        <canvas id="donutChart" style="min-height: 160px; height: 180px; max-height: 221px; max-width: 100%;"></canvas>
                    </div>
                    <!-- /.card-body -->
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

        const ctx = document.getElementById('donutChart').getContext('2d');

        var labels = [];
        var data = [];
        @if (count($chartU)>0)
        @foreach ($chartU as $client)
            labels.push('{{ $client->NOMBRE }}');
            data.push('{{ $client->TOTAL }}');
        @endforeach
        @else
        labels.push('Registre');
        data.push(100);
        @endif

        const myChart = new Chart(ctx, {
            type: 'doughnut',
            data: {
                labels: labels,
                datasets: [{
                    label: 'Deuda',
                    data: data,
                    backgroundColor: [
                        'rgba(255, 99, 132, 1)',
                        'rgba(54, 162, 235, 1)',
                        'rgba(255, 206, 86, 1)',
                        'rgba(75, 192, 192, 1)',
                        'rgba(153, 102, 255, 1)',
                        'rgba(255, 159, 64, 1)'
                    ],
                    borderColor: [
                        'rgba(255, 99, 132, 0.2)',
                        'rgba(54, 162, 235, 0.2)',
                        'rgba(255, 206, 86, 0.2)',
                        'rgba(75, 192, 192, 0.2)',
                        'rgba(153, 102, 255, 0.2)',
                        'rgba(255, 159, 64, 0.2)'
                    ],
                    borderWidth: 2,
                    hoverOffset: 10
                }]
            },
            options: {
                responsive: true
            }
        });
    </script>
@stop
