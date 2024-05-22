@extends('admin.layouts.app')

@section('title', ($option ?? 'Editar') . ' Sede')

@section('breadcrumb')
    <ol class="breadcrumb bread-main">
        <li class="breadcrumb-item"><a href="{{ route('dashboard') }}"><i class="mdi-action-home"></i></a></li>
        <li class="breadcrumb-item"><a href="{{ route('Sedes.list') }}">Sedes</a></li>
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
                </ul>
                <form class="validate-form" method="POST" action="{{ route('Sedes.update') }}">
                    @csrf
                    <!-- Campo oculto para el ID de la sede -->
                    <input type="hidden" name="id" value="{{ $reg['reg']['id'] }}">

                    <div class="panel-body">
                        <div class="tab-content">
                            <div role="tabpanel" class="tab-pane active" id="info">
                                <div class="row">
                                    <div class="col-lg-6 form-group">
                                        <label>Nombre</label>
                                        <input type="text" class="form-control" name="nombre"
                                            value="{{ $reg['reg']['nombre'] }}" required />
                                    </div>
                                    <div class="col-lg-6 form-group">
                                        <label>Dirección</label>
                                        <input type="text" class="form-control" name="direccion"
                                            value="{{ $reg['reg']['direccion'] }}" required />
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="panel-footer bg-white">
                        <button type="submit" class="btn btn-main"><i class="fa fa-save"></i> Guardar</button>
                        <a href="{{ route('Sedes.list') }}" class="btn btn-default">Cancelar</a>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection

@section('scripts')
    <!-- Incluye los scripts necesarios aquí -->
@endsection
