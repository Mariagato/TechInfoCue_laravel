@extends('admin.layouts.app')

@section('title', ($option ?? 'Editar') . ' Prestamo')

@section('breadcrumb')
    <ol class="breadcrumb bread-main">
        <li class="breadcrumb-item"><a href="{{ route('dashboard') }}"><i class="mdi-action-home"></i></a></li>
        <li class="breadcrumb-item"><a href="{{ route('Sedes.list') }}">Prestamos</a></li>
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
                                        <label>Calificación</label>
                                        <input type="text" class="form-control" name="calificacion"
                                            value="{{ $reg['reg']['calificacion'] }}" required disabled/>
                                    </div>
                                    <div class="col-lg-6 form-group">
                                        <label>Estado</label>
                                        <select class="form-control" name="sede" disabled>
                                            <option value="En curso"
                                                        @if ($reg['reg']['estado'] == "En curso") selected @endif disabled>
                                                        En curso
                                                    </option>
                                                    <option value="Finalizado"
                                                        @if ($reg['reg']['estado'] == "Finalizado") selected @endif disabled>
                                                        FInalizado
                                                    </option>
                                        </select>
                                    </div>
                                    <div class="col-lg-6 form-group">
                                        <label>Fecha Devolución</label>
                                        <input type="text" class="form-control datetimepicker" name="fecha_devolucion" value="{{ $reg['reg']['fecha_devolucion'] }}" required disabled/>
                                    </div>
                                    <div class="col-lg-6 form-group">
                                        <label>Fecha Prestamo</label>
                                        <input type="text" class="form-control datetimepicker" name="fecha_prestamo" value="{{ $reg['reg']['fecha_prestamo'] }}" required disabled/>
                                    </div>
                                    <div class="col-lg-6 form-group">
                                        <label>Salon</label>
                                        <select class="form-control" name="sede" disabled>
                                            @foreach ($salones as $salonId => $salon)
                                                @if ($salon != null)
                                                    <option value="{{ $salonId }}"
                                                        @if ($salonId == $reg['reg']['id_salon']) selected @endif disabled>
                                                        {{ $salon['numero'] }}
                                                    </option>
                                                @endif
                                            @endforeach
                                        </select>
                                    </div>
                                    <div class="col-lg-6 form-group">
                                        <label>Usuario</label>
                                        <select class="form-control" name="sede" disabled>
                                            @foreach ($users as $salonId => $salon)
                                                @if ($salon != null)
                                                    <option value="{{ $salonId }}"
                                                        @if ($salonId == $reg['reg']['id_usuario']) selected @endif disabled>
                                                        {{ $salon['Nombre'] }}
                                                    </option>
                                                @endif
                                            @endforeach
                                        </select>
                                    </div>
                                    <div class="col-lg-6 form-group">
                                        <label>Items</label>
                                        <input type="text" class="form-control" name="items"
                                            value="{{ $reg['reg']['items'] }}" required disabled/>
                                    </div>
                                    <div class="col-lg-6 form-group">
                                        <label>Observaciones</label>
                                        <textarea class="form-control" name="observaciones" required disabled>{{ $reg['reg']['observaciones'] }}</textarea>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="panel-footer bg-white">
                        <a href="{{ route('Sedes.list') }}" class="btn btn-default">Atras</a>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection

@section('scripts')
<!-- jQuery -->

<script>
    $(document).ready(function() {
        $('.datetimepicker').datetimepicker({
            dateFormat: 'dd/mm/yy',
            timeFormat: 'HH:mm',
            controlType: 'select',
            oneLine: true
        });
    });
</script>
@endsection
