@extends('adminlte::page')

@section('title', 'Dashboard')

@section('content_header')
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">Administrar arrendatario</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="../admin">Home</a></li>
                        <li class="breadcrumb-item active">Administrar arrendatario</li>
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
                    <th>Piso</th>
                    <th>Valor Alq.</th>
                    <th>Nº Compañeros</th>
                    <th>Fecha de Ingreso</th>
                    <th>Acciones</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($data as $item)
                    <tr>
                        <td>{{ $item->id }}</td>
                        <td>{{ $item->nombre }}</td>
                        <td>{{ $item->piso }}</td>
                        <td>{{ $item->valor_alq }}</td>
                        <td>{{ $item->total_personas }}</td>
                        <td>{{ $item->fecha_ingreso }}</td>
                        <td>
                            <a href="usuarios/edit/{{ $item->id }}" class="btn btn-primary btn-warning"><i
                                    class="fa fa-pencil-alt"></i>&nbsp;Editar</a>
                            <a href="#" class="btn btn-primary btn-danger elimnarReg"
                                onclick="eliminar({{ $item->id }});"><i class="fa fa-eraser"></i></i>&nbsp;Eliminar</a>
                        </td>
                    </tr>
                @endforeach
            </tbody>
            <tfoot>
                <tr>
                    <th>ID</th>
                    <th>Nombre</th>
                    <th>Piso</th>
                    <th>Valor Alq.</th>
                    <th>Nº Compañeros</th>
                    <th>Fecha de Ingreso</th>
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
                    <a href="usuarios/add" class="btn btn-app bg-success">
                        <span class="badge bg-purple">{{ $count }}</span>
                        <i class="fas fa-users"></i>
                        <h6>Añadir usuarios</h6>
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
        function eliminar(id) {
            Swal.fire({
                title: 'Estas seguro?',
                html: '<video width="70%"autoplay src="../video/duda.mp4"></video><br><p>No podras revertir esto!</p>',
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Si, eliminalo!',
                cancelButtonText: 'Cancelar',
                timer: 10000,
                timerProgressBar: true,
            }).then((result) => {
                if (result.value) {
                    // Si el usuario confirma, envía una solicitud DELETE al controlador
                    axios.delete(`usuarios/delete/` + id)
                        .then(response => {
                            // Si la eliminación es exitosa, muestra una alerta de éxito y recarga la página
                            Swal.fire({
                                title: '¡Eliminado!',
                                text: 'El registro ha sido eliminado',
                                icon: 'success'
                            }).then(() => {
                                location.reload();
                            });
                        })
                        .catch(error => {
                            // Si hay un error, muestra una alerta de error
                            Swal.fire({
                                title: 'Error',
                                text: 'Hubo un problema al eliminar el registro',
                                icon: 'error'
                            });
                        });
                }
            });
        }
        @if (session('SUCCESS'))
        Swal.fire({
            html: '<video width="70%"autoplay src="../video/hecho.mp4"></video><br><p>Nuevo usuario en linea</p>',
            icon: 'success',
            type: 'success',
            title: 'Añadido!',
            timer: 10000,
            timerProgressBar: true,
        })
        @endif
        @if (session('EDIT'))
        Swal.fire({
            html: '<video width="70%"autoplay src="../video/hecho.mp4"></video><br><p>Usuario editado</p>',
            icon: 'success',
            type: 'success',
            title: 'Modificado!',
            timer: 10000,
            timerProgressBar: true,
        })
        @endif
    </script>
@stop
