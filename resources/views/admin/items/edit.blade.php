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
                    <!-- Agrega un campo oculto para el ID del ítem -->
                    <input type="hidden" name="id" value="{{ $reg['reg']['id'] }}">

                    <div class="panel-body">
                        <div class="tab-content">
                            <div role="tabpanel" class="tab-pane active" id="info">
                                <div class="row">
                                    <div class="col-lg-6 form-group">
                                        <label>Código</label>
                                        <input type="text" class="form-control" name="codigo"
                                            value="{{ $reg['reg']['codigo'] }}" required />
                                    </div>
                                    <div class="col-lg-6 form-group">
                                        <label>Nombre</label>
                                        <input type="text" class="form-control" name="nombre"
                                            value="{{ $reg['reg']['nombre'] }}" required />
                                    </div>
                                    <div class="col-lg-6 form-group">
                                        <label>Estado</label>
                                        <select class="form-control" name="estado" required>
                                            <option value="Disponible"
                                                {{ $reg['reg']['estado'] == 'Disponible' ? 'selected' : '' }}>Disponible
                                            </option>
                                            <option value="Prestado"
                                                {{ $reg['reg']['estado'] == 'Prestado' ? 'selected' : '' }}>Prestado
                                            </option>
                                            <option value="Perdido"
                                                {{ $reg['reg']['estado'] == 'Perdido' ? 'selected' : '' }}>Perdido</option>
                                            <option value="Robado"
                                                {{ $reg['reg']['estado'] == 'Robado' ? 'selected' : '' }}>Robado</option>
                                            <option value="Dañado"
                                                {{ $reg['reg']['estado'] == 'Dañado' ? 'selected' : '' }}>Dañado</option>
                                        </select>
                                    </div>
                                    <div class="col-lg-6 form-group">
                                        <label>Serial</label>
                                        <input type="text" class="form-control" name="serial"
                                            value="{{ $reg['reg']['serial'] ?? null }}" required />
                                    </div>
                                    <div class="col-lg-6 form-group">
                                        <label>Cantidad</label>
                                        <input type="number" class="form-control" name="cantidad"
                                            value="{{ $reg['reg']['info_item']['cantidad'] ?? null }}" required />
                                    </div>
                                    <div class="col-lg-6 form-group">
                                        <label>Provedor</label>
                                        <select class="form-control" name="provedor">
                                            @foreach ($proveedores as $proveedorId => $proveedor)
                                                @if ($proveedor != null)
                                                    <option value="{{ $proveedorId }}"
                                                        @if ($proveedorId == $reg['proveedor_id']) selected @endif>
                                                        {{ $proveedor['nombre'] }}
                                                    </option>
                                                @endif
                                            @endforeach
                                        </select>
                                    </div>

                                    <div class="col-lg-6 form-group">
                                        <label>Comentarios</label>
                                        <textarea class="form-control" name="comentarios" rows="3">{{ $reg['reg']['info_item']['comentarios'] }}</textarea>
                                    </div>
                                    <div class="col-lg-6 form-group">
                                        <labael>Descripción</labael>
                                        <textarea class="form-control" name="descripcion" rows="3">{{ $reg['reg']['info_item']['descripcion'] }}</textarea>
                                    </div>
                                    <div class="col-lg-6 form-group">
                                        <label>Número de Factura</label>
                                        <input type="text" class="form-control" name="numero_factura"
                                            value="{{ $reg['reg']['info_item']['numero_factura'] }}">
                                    </div>
                                    <div class="col-lg-6 form-group">
                                        <label>Responsable</label>
                                        <input type="text" class="form-control" name="responsable"
                                            value="{{ $reg['reg']['info_item']['responsable'] }}">
                                    </div>
                                    <div class="col-lg-6 form-group">
                                        <label>Tiempo de Uso</label>
                                        <input type="text" class="form-control" name="tiempo_uso"
                                            value="{{ $reg['reg']['info_item']['tiempo_uso'] }}">
                                    </div>
                                    <div class="col-lg-6 form-group">
                                        <label>URL</label>
                                        <input type="text" class="form-control" name="url"
                                            value="{{ $reg['reg']['info_item']['url'] }}">
                                    </div>
                                    <div class="col-lg-6 form-group">
                                        <label>Uso Sugerido</label>
                                        <input type="text" class="form-control" name="uso_sugerido"
                                            value="{{ $reg['reg']['info_item']['uso_sugerido'] }}">
                                    </div>
                                    <div class="col-lg-6 form-group">
                                        <label>Valor de Factura</label>
                                        <input type="number" class="form-control" name="valor_factura"
                                            value="{{ $reg['reg']['info_item']['valor_factura'] }}">
                                    </div>
                                    <div class="col-lg-6 form-group">
                                        <label>Valor de Mercado</label>
                                        <input type="number" class="form-control" name="valor_mercado"
                                            value="{{ $reg['reg']['info_item']['valor_mercado'] }}">
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
