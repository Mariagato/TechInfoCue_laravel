@extends('admin.layouts.app')

@section('title', 'Lista de sedes')

@section('breadcrumb')
    <ol class="breadcrumb bread-main">
        <li class="breadcrumb-item"><a href="{{ route('dashboard') }}"><i class="mdi-action-home"></i></a></li>
        <li class="breadcrumb-item active">Sedes</li>
    </ol>
@endsection

@section('body')
    <div class="panel panel-default">
        <div class="panel-heading heading-actions">
            <a class="btn btn-outline-main btn-sm" href="{{ route('Sedes.new') }}">
                <i class="fa fa-plus-circle"></i> Agregar Sede
            </a>
        </div>

        <div class="list_table">
            <table class="table table-striped b-t b-b" id="datatable" width="100%">
                <thead>
                    <tr>
                        <th width="10">#</th>
                        <th>Nombre</th>
                        <th>Dirección</th>
                        <th width="200">Opciones</th>
                    </tr>
                </thead>
                <tbody>
                </tbody>
            </table>
        </div>
    </div>
@endsection

@section('js_vars')
    <script>
        var del_message = '¿Deseas eliminar este sede?',
            columns = [{
                    "data": "id"
                },
                {
                    "data": "nombre"
                },
                {
                    "data": "direccion"
                },
                {
                    "data": "options"
                }
            ];

        var control = "{{ route('Sedes.json-list') }}"
    </script>
@endsection
