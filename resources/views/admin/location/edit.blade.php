@extends('admin.layouts.app')

@section('title', ($option ?? 'Agregar') . ' oficina')

@section('breadcrumb')
    <ol class="breadcrumb bread-main">
        <li class="breadcrumb-item"><a href="{{route('dashboard')}}"><i class="mdi-action-home"></i></a></li>
        <li class="breadcrumb-item"><a href="{{route('locations.list')}}">Oficinas</a></li>
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
                    <li role="presentation"><a href="#images" aria-controls="images" role="tab"
                                               data-toggle="tab">IMÁGENES</a></li>
                    <li role="presentation"><a href="#meta" aria-controls="meta" role="tab"
                                               data-toggle="tab">SEO</a></li>
                </ul>
                <form class="validate-form" method="POST" enctype="multipart/form-data" action="">
                    @csrf
                    <div class="panel-body">
                        <div class="tab-content">
                            <div role="tabpanel" class="tab-pane active" id="info">
                                <div class="row">
                                    <div class="col-lg-4 form-group">
                                        <label>Nombre</label>
                                        <input type="text" class="form-control" name="dat[name]"
                                               value="{{$reg->name ?? null}}" required
                                               maxlength="200"/>
                                    </div>
                                    <div class="col-lg-4 form-group">
                                        <label>Ciudad</label>
                                        <input type="text" class="form-control" name="dat[city]"
                                               value="{{$reg->city ?? null}}" required
                                               maxlength="200"/>
                                    </div>
                                    <div class="col-lg-4 form-group">
                                        <label>Dirección</label>
                                        <input type="text" class="form-control" name="dat[address]"
                                               value="{{$reg->address ?? null}}" required
                                               maxlength="300"/>
                                    </div>

                                    <div class="col-lg-4 form-group">
                                        <label>Teléfono</label>
                                        <input type="text" class="form-control" name="dat[phone]"
                                               value="{{$reg->phone ?? null}}" required
                                               maxlength="200"/>
                                    </div>
                                    <div class="col-lg-4 form-group">
                                        <label>Celular</label>
                                        <input type="text" class="form-control" name="dat[cellphone]"
                                               value="{{$reg->cellphone ?? null}}"
                                               maxlength="200"/>
                                    </div>
                                    <div class="col-lg-4 form-group">
                                        <label>Email</label>
                                        <input type="text" class="form-control" name="dat[email]"
                                               value="{{$reg->email ?? null}}"
                                               maxlength="200"/>
                                    </div>
                                    <div class="col-lg-12 form-group">
                                        <label>Horarios</label>
                                        <input type="text" class="form-control" name="dat[schedule]"
                                               value="{{$reg->schedule ?? null}}"
                                               maxlength="300"/>
                                    </div>

                                    <div class="col-lg-12">
                                        <h2 class="list-title">Ubicación en el mapa</h2>
                                    </div>
                                    <div class="col-lg-12">
                                    <div id="map_canvas" style="width:100%; height:450px"></div>
                                    <input type="hidden" name="dat[latitude]" id="latitude_map"
                                           value="{{$reg->latitude ?? ''}}">
                                    <input type="hidden" name="dat[longitude]" id="longitude_map"
                                           value="{{$reg->longitude ?? ''}}">
                                    </div>
                                </div>
                            </div>
                            <div role="tabpanel" class="tab-pane" id="images">
                                <div class="row">
                                    @include('admin.includes.main-image',['title'=>'Fotografía oficina','size'=>'450px ancho x 350px alto'])
                                </div>
                            </div>
                            <div role="tabpanel" class="tab-pane" id="meta">
                                <div class="row">
                                    @include('admin.includes.seo')
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="panel-footer bg-white">
                        <button type="submit" class="btn btn-main"><i class="fa fa-save"></i> Guardar</button>
                        <a href="{{route('locations.list')}}" class="btn btn-default">Cancelar</a>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection

@section('js_vars')
    <script>
        var map,
            marker,
            infowindow,
            contentString = '',
            icon = '{{asset('upload/default/marker.png')}}',
            img_default = '{{asset('upload/default/no-image-small.png')}}',
            latitude = '{{$reg->latitude ?? ''}}',
            longitude = '{{$reg->longitude ?? ''}}',
            icon_map_url = '{{asset('images/marker.png')}}';
    </script>
@endsection
