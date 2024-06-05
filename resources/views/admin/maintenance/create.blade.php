@extends('admin.layouts.app')

@section('title', 'Editar salon')

@section('breadcrumb')
    <ol class="breadcrumb bread-main">
        <li class="breadcrumb-item"><a href="{{ route('dashboard') }}"><i class="mdi-action-home"></i></a></li>
        <li class="breadcrumb-item"><a href="{{ route('Classrooms.list') }}">Salones</a></li>
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
                <form class="validate-form" method="POST" action="{{ route('Classrooms.update') }}">
                    @csrf
                    <div class="panel-body">
                        <div class="tab-content">
                            <div role="tabpanel" class="tab-pane active" id="info">
                                <div class="row">
                                    <div class="col-lg-6 form-group">
                                        <label>Sede</label>
                                        <select class="form-control" name="sede">
                                            <option value="">Seleccione una</option>
                                            @foreach ($sedes as $sedeId => $sede)
                                                @if ($sede != null)
                                                    <option value="{{ $sedeId }}">
                                                        {{ $sede['nombre'] }}
                                                    </option>
                                                @endif
                                            @endforeach
                                        </select>
                                    </div>
                                    <div class="col-lg-6 form-group">
                                        <label>Nombre</label>
                                        <input type="text" class="form-control" name="nombre" value="" required />
                                    </div>
                                    <div class="col-lg-6 form-group">
                                        <label>Numero</label>
                                        <input type="text" class="form-control" name="numero" value="" required />
                                    </div>
                                    <div class="col-lg-6 form-group">
                                        <label>Piso</label>
                                        <input type="text" class="form-control" name="piso" value="" required />
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-lg-6 form-group">
                                        <label>Capacidad</label>
                                        <input type="text" class="form-control" name="capacidad" value=""
                                            required />
                                    </div>
                                    <div class="col-lg-6 form-group">
                                        <label>Detalles</label>
                                        <input type="text" class="form-control" name="detalles" value=""
                                            required />
                                    </div>
                                    <div class="col-lg-6 form-group">
                                        <label>Estado</label>
                                        <select class="form-control" name="estado" required>
                                            <option value="">Seleccione una</option>
                                            <option value="Disponible">Disponible</option>
                                            <option value="Ocupado">Ocupado</option>
                                            <option value="No Disponible">No Disponible</option>
                                        </select>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="panel-footer bg-white">
                        <button type="submit" class="btn btn-main"><i class="fa fa-save"></i> Guardar</button>
                        <a href="{{ route('Classrooms.list') }}" class="btn btn-default">Cancelar</a>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection

@section('scripts')
    <!-- Incluye los scripts necesarios aquí -->
@endsection
