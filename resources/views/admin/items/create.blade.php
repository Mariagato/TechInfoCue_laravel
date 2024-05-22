@extends('admin.layouts.app')

@section('title', 'Agregar artículo')

@section('breadcrumb')
    <ol class="breadcrumb bread-main">
        <li class="breadcrumb-item"><a href="{{ route('dashboard') }}"><i class="mdi-action-home"></i></a></li>
        <li class="breadcrumb-item"><a href="{{ route('articles.list') }}">Blog</a></li>
        <li class="breadcrumb-item active">Agregar artículo</li>
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
                    action="{{ route('Items.store') }}">
                    @csrf

                    <div class="panel-body">
                        <div class="tab-content">
                            <div role="tabpanel" class="tab-pane active" id="info">
                                <div class="row">
                                    <div class="col-lg-6 form-group">
                                        <label>Código</label>
                                        <input type="text" class="form-control" name="codigo"
                                            value="{{ old('codigo') }}" required />
                                    </div>
                                    <div class="col-lg-6 form-group">
                                        <label>Nombre</label>
                                        <input type="text" class="form-control" name="nombre"
                                            value="{{ old('nombre') }}" required />
                                    </div>
                                    <div class="col-lg-6 form-group">
                                        <label>Estado</label>
                                        <select class="form-control" name="estado" required>
                                            <option value="Disponible"
                                                {{ old('estado') == 'Disponible' ? 'selected' : '' }}>Disponible</option>
                                            <option value="Prestado" {{ old('estado') == 'Prestado' ? 'selected' : '' }}>
                                                Prestado</option>
                                            <option value="Perdido" {{ old('estado') == 'Perdido' ? 'selected' : '' }}>
                                                Perdido</option>
                                            <option value="Robado" {{ old('estado') == 'Robado' ? 'selected' : '' }}>Robado
                                            </option>
                                            <option value="Dañado" {{ old('estado') == 'Dañado' ? 'selected' : '' }}>Dañado
                                            </option>
                                        </select>
                                    </div>
                                    <div class="col-lg-6 form-group">
                                        <label>Serial</label>
                                        <input type="text" class="form-control" name="serial"
                                            value="{{ old('serial') }}" required />
                                    </div>
                                    <div class="col-lg-6 form-group">
                                        <label>Cantidad</label>
                                        <input type="number" class="form-control" name="cantidad"
                                            value="{{ old('cantidad') }}" required />
                                    </div>
                                    <div class="col-lg-6 form-group">
                                        <label>Provedor</label>
                                        <input class="form-control" name="provedor" value="{{ old('provedor') }}">
                                    </div>
                                    <div class="col-lg-6 form-group">
                                        <label>Comentarios</label>
                                        <textarea class="form-control" name="comentarios" rows="3">{{ old('comentarios') }}</textarea>
                                    </div>
                                    <div class="col-lg-6 form-group">
                                        <label>Descripción</label>
                                        <textarea class="form-control" name="descripcion" rows="3">{{ old('descripcion') }}</textarea>
                                    </div>
                                    <div class="col-lg-6 form-group">
                                        <label>Número de Factura</label>
                                        <input type="text" class="form-control" name="numero_factura"
                                            value="{{ old('numero_factura') }}">
                                    </div>
                                    <div class="col-lg-6 form-group">
                                        <label>Responsable</label>
                                        <input type="text" class="form-control" name="responsable"
                                            value="{{ old('responsable') }}">
                                    </div>
                                    <div class="col-lg-6 form-group">
                                        <label>Tiempo de Uso</label>
                                        <input type="text" class="form-control" name="tiempo_uso"
                                            value="{{ old('tiempo_uso') }}">
                                    </div>
                                    <div class="col-lg-6 form-group">
                                        <label>URL</label>
                                        <input type="text" class="form-control" name="url"
                                            value="{{ old('url') }}">
                                    </div>
                                    <div class="col-lg-6 form-group">
                                        <label>Uso Sugerido</label>
                                        <input type="text" class="form-control" name="uso_sugerido"
                                            value="{{ old('uso_sugerido') }}">
                                    </div>
                                    <div class="col-lg-6 form-group">
                                        <label>Valor de Factura</label>
                                        <input type="number" class="form-control" name="valor_factura"
                                            value="{{ old('valor_factura') }}">
                                    </div>
                                    <div class="col-lg-6 form-group">
                                        <label>Valor de Mercado</label>
                                        <input type="number" class="form-control" name="valor_mercado"
                                            value="{{ old('valor_mercado') }}">
                                    </div>
                                    <!-- Agrega más campos según sea necesario -->
                                </div>
                            </div>
                            <!-- Añade más pestañas si es necesario -->
                        </div>
                    </div>
                    <div class="panel-footer bg-white">
                        <button type="submit" class="btn btn-main"><i class="fa fa-save"></i> Guardar</button>
                        <a href="{{ route('Items.list') }}" class="btn btn-default">Cancelar</a>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection

@section('scripts')
    <!-- Incluye los scripts necesarios aquí -->
@endsection
