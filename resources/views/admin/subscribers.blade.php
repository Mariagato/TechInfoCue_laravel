@extends('admin.layouts.app')

@section('title', 'Lista de suscriptores')

@section('breadcrumb')
    <ol class="breadcrumb bread-main">
        <li class="breadcrumb-item"><a href="{{route('dashboard')}}"><i class="mdi-action-home"></i></a></li>
        <li class="breadcrumb-item active">Newsletter</li>
    </ol>
@endsection


@section('body')
    <div class="panel panel-default">
        <div class="panel-heading heading-actions">
            <a href="{{route('subscribers.export')}}" class="btn btn-outline-main btn-sm"><i class="fa fa-download" aria-hidden="true"></i>
                Exportar a excel</a>
        </div>
        <div class="list_table">
            <table class="table table-striped b-t b-b" id="datatable" width="100%">
                <thead>
                <tr>
                    <th width="10">#</th>
                    <th>Nombre</th>
                    <th>Email</th>
                    <th>Fecha</th>
                    <th width="100">Opciones</th>
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
        var del_message = '¿Deseas eliminar este suscriptor?',
            columns = [
                {"data": "id"},
                {"data": "name"},
                {"data": "email"},
                {"data": "created_at"},
                {"data": "options"}
            ];
    </script>
@endsection