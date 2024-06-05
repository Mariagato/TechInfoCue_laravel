@extends('admin.layouts.app')

@section('title', ($option ?? 'Agregar') . ' artículo')

@section('breadcrumb')
    <ol class="breadcrumb bread-main">
        <li class="breadcrumb-item"><a href="{{ route('dashboard') }}"><i class="mdi-action-home"></i></a></li>
        <li class="breadcrumb-item"><a href="{{ route('articles.list') }}">Blog</a></li>
    </ol>
@endsection

@section('body')
    @include('admin.includes.modals')
    <div class="row">
        <div class="col-md-12">
            <div class="panel panel-default">
                <ul class="nav nav-tabs cnav-tabs" role="tablist">
                    <li role="presentation" class="active"><a href="#info" aria-controls="info" role="tab"
                            data-toggle="tab">INFORMACIÓN</a></li>
                    <!-- Agrega más pestañas si es necesario -->
                </ul>
                <form class="validate-form" method="POST" enctype="multipart/form-data"
                    action="{{ route('Items.update') }}">
                    @csrf
                    <input type="hidden" name="id" value="{{ $reg['id'] }}">

                    <div class="panel-body">
                        <div class="tab-content">
                            <div role="tabpanel" class="tab-pane active" id="info">
                                <div class="row">
                                    <div class="col-lg-6 form-group">
                                        <label>Código</label>
                                        <input type="text" class="form-control" name="codigo"
                                            value="{{ $reg['reg']['ID_INVENTARIO'] }}" required />
                                    </div>
                                    <div class="col-lg-6 form-group">
                                        <label>Nombre</label>
                                        <input type="text" class="form-control" name="nombre"
                                            value="{{ $reg['reg']['NOMBRE '] }}" required />
                                    </div>
                                    <div class="col-lg-6 form-group">
                                        <label>Estado</label>
                                        <select class="form-control" name="estado" required>
                                            <option value="1 Activo"
                                                {{ $reg['reg']['Activo'] == '1 Activo' ? 'selected' : '' }}>Activo</option>
                                            <option value="1 No Activo"
                                                {{ $reg['reg']['De baja'] == '1 No Activo' ? 'selected' : '' }}>No Activo</option>
                                            <option value="1 Inactivo"
                                                {{ $reg['reg']['Inactivo'] == '1 Inactivo' ? 'selected' : '' }}>Inactivo</option>
                                        </select>
                                    </div>
                                    <div class="col-lg-6 form-group">
                                        <label>Serial</label>
                                        <input type="text" class="form-control" name="serial"
                                            value="{{ $reg['reg']['SERIAL'] }}" required />
                                    </div>
                                    <div class="col-lg-6 form-group">
                                        <label>Cantidad</label>
                                        <input type="number" class="form-control" name="cantidad"
                                            value="{{ $reg['reg']['CANTIDAD'] }}" required />
                                    </div>
                                    <div class="col-lg-6 form-group">
                                        <label>Descripción General</label>
                                        <textarea class="form-control" name="descripcion_general" rows="3">{{ $reg['reg']['DESCRIPCIÓN GENERAL'] }}</textarea>
                                    </div>
                                    <div class="col-lg-6 form-group">
                                        <label>Fecha de Compra</label>
                                        <input type="date" class="form-control" name="fecha_de_compra"
                                            value="{{ $reg['reg']['FECHA DE COMPRA'] }}">
                                    </div>
                                    <div class="col-lg-6 form-group">
                                        <label>Ubicación</label>
                                        <input type="text" class="form-control" name="ubicacion"
                                            value="{{ $reg['reg']['UBICACIÓN'] }}">
                                    </div>
                                    <div class="col-lg-6 form-group">
                                        <label>Responsable</label>
                                        <input type="text" class="form-control" name="responsable"
                                            value="{{ $reg['reg']['RESPONSABLE'] }}">
                                    </div>
                                    <div class="col-lg-6 form-group">
                                        <label>Proveedor</label>
                                        <input type="text" class="form-control" name="proveedor"
                                            value="{{ $reg['reg']['PROVEEDOR'] }}">
                                    </div>
                                    <div class="col-lg-6 form-group">
                                        <label>Uso Sugerido</label>
                                        <input type="number" class="form-control" name="uso_sugerido"
                                            value="{{ $reg['reg']['USO_SUGERIDO'] }}">
                                    </div>
                                    <div class="col-lg-6 form-group">
                                        @include('admin.includes.main-image')
                                    </div>
                                    <!-- Agrega más campos según sea necesario -->
                                </div>
                            </div>
                            <!-- Añade más pestañas si es necesario -->
                        </div>
                    </div>
                    <div class="panel-footer bg-white">
                        <button type="submit" class="btn btn-main"><i class="fa fa-save"></i> Guardar</button>
                        <a href="{{ route('articles.list') }}" class="btn btn-default">Cancelar</a>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection

@section('scripts')
    <!-- Incluye los scripts necesarios aquí -->
@endsection
