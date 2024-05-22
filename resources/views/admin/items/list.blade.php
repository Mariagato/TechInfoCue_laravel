@extends('admin.layouts.app')

@section('title', 'Lista de items')

@section('breadcrumb')
    <ol class="breadcrumb bread-main">
        <li class="breadcrumb-item"><a href="{{ route('dashboard') }}"><i class="mdi-action-home"></i></a></li>
        <li class="breadcrumb-item active">Blog</li>
    </ol>
@endsection

@section('body')
    <div class="panel panel-default">
        <div class="panel-heading heading-actions">
            <a class="btn btn-outline-main btn-sm" href="{{ route('Items.new') }}">
                <i class="fa fa-plus-circle"></i> Agregar Item
            </a>
        </div>

        <div class="list_table">
            <table class="table table-striped b-t b-b" id="datatable" width="100%">
                <thead>
                    <tr>
                        <th width="10">#</th>
                        <th>Nombre</th>
                        <th>Código</th>
                        <th>Estado</th>
                        <th>Cantidad</th>
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
        var del_message = '¿Deseas eliminar este artículo?',
            columns = [{
                    "data": "id"
                },
                {
                    "data": "nombre"
                },
                {
                    "data": "codigo"
                },
                {
                    "data": "estado"
                },
                {
                    "data": "cantidad"
                },
                {
                    "data": "options"
                }
            ];

        var control = "{{ route('Items.json-list') }}"
    </script>
@endsection
