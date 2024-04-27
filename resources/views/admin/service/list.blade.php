@extends('admin.layouts.app')

@section('title', 'Lista de servicios')

@section('breadcrumb')
    <ol class="breadcrumb bread-main">
        <li class="breadcrumb-item"><a href="{{route('dashboard')}}"><i class="mdi-action-home"></i></a></li>
        <li class="breadcrumb-item active">Servicios</li>
    </ol>
@endsection

@section('body')
    @include('admin.includes.modals')
    <div class="panel panel-default">
        <div class="panel-heading heading-actions">

            <a class="btn btn-outline-main btn-sm" href="javascript:openModalOrder('services')">
                <i class="fa fa-sort"></i> Ordenar servicios
            </a>

            <a class="btn btn-outline-main btn-sm" href="{{route('services.edit',['id'=>0])}}">
                <i class="fa fa-plus-circle"></i> Agregar servicio
            </a>
        </div>

        <div class="list_table">
            <table class="table table-striped b-t b-b" id="datatable" width="100%">
                <thead>
                <tr>
                    <th width="10">#</th>
                    <th>Título</th>
                    <th>Categoría</th>
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
        var del_message = '¿Deseas eliminar este servicio?',
            title_order_model = 'servicios',
            url_order_model = '{{route('services.order')}}',
            url_get_model = '{{route('services.get_all')}}',
            columns = [
                {"data": "id"},
                {"data": "info_services.title"},
                {"data": "info_categories.name"},
                {"data": "options"}
            ];
    </script>
@endsection