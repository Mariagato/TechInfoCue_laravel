@extends('admin.layouts.app')

@section('title', 'Escritorio')

@section('body')
    <div class="row">
        <div class="col-md-12">
            <div class="panel panel-default">
                <div class="panel-body">
                    @if($installed)
                        <div class="row">
                            <div class="col-lg-12">
                                <h2 class="list-title">Filtrar por fecha</h2>
                            </div>
                            <div class="col-lg-3">
                                <div class="form-group">
                                    <label>Fecha Inicio</label>
                                    <input type="text" id="date_start" class="form-control date_from"
                                           value="{{$date_start ?? null}}" readonly/>
                                </div>
                            </div>
                            <div class="col-lg-3">
                                <div class="form-group">
                                    <label>Fecha Final</label>
                                    <input type="text" id="date_end" class="form-control date_until"
                                           value="{{$date_end ?? null}}"
                                           readonly/>
                                </div>
                            </div>
                            <div class="col-lg-4">
                                <button class="btn btn-outline-main btn-mt-25 btn-load" onclick="loadChart()">
                                    Cargar Estadísticas
                                </button>
                            </div>
                        </div>


                        <div class="row">
                            <div class="col-lg-12">
                                <div id="stats">
                                </div>
                            </div>

                            <div class="col-lg-12 text-center">
                                <ul class="stats-overview list-group list-group-horizontal">
                                    <li class="list-group-item">
                                            <span class="text-main">
                                                <b># Visitas</b>
                                            </span>
                                        <span class="value" id="visits">...</span>
                                    </li>
                                    <li class="list-group-item">
                                            <span class="text-main">
                                                <b>Tiempo promedio en el sitio</b>
                                            </span>
                                        <span class="value" id="time">...</span>
                                    </li>
                                    <li class="list-group-item">
                                            <span class="text-main">
                                                  <b>Porcentaje rebote (%)</b>
                                            </span>
                                        <span class="value" id="rebound">...</span>
                                    </li>
                                </ul>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-lg-6">
                                <h2 class="list-title">Fuentes de tráfico</h2>
                                <div class="table-responsive" id="traffic_table">
                                    ...
                                </div>
                            </div>
                            <div class="col-lg-6">
                                <h2 class="list-title">Visitas por paises</h2>
                                <div class="table-responsive" id="country_table">
                                    ...
                                </div>
                            </div>
                        </div>
                    @else
                        <div class="row">
                            <div class="col-lg-12">
                                <h4 class="text-main">¡No se han instalado las estadísticas!</h4>
                                <p>Vaya a la configuración de sitio web e ingrese el código de seguimiento de google
                                    Analytics.</p>
                            </div>
                        </div>
                    @endif
                </div>
            </div>
        </div>
    </div>
@endsection

@section('scripts')
    <script src="{{asset('vendors/highcharts/code/js/highcharts.js')}}"></script>
@endsection