@extends('admin.layouts.app')

@section('title', 'Configuración')

@section('breadcrumb')
    <ol class="breadcrumb bread-main">
        <li class="breadcrumb-item"><a href="{{route('dashboard')}}"><i class="mdi-action-home"></i></a></li>
        <li class="breadcrumb-item active">Configuración</li>
    </ol>
@endsection

@section('body')
    <div class="row">
        <div class="col-md-12">
            <div class="panel panel-default">
                <ul class="nav nav-tabs cnav-tabs" role="tablist">
                    <li role="presentation" class="active"><a href="#info" aria-controls="info" role="tab"
                                                              data-toggle="tab">INFORMACIÓN DEL SITIO</a></li>
                    <li role="presentation"><a href="#banners" aria-controls="banners" role="tab"
                                               data-toggle="tab">BANNERS</a></li>
                </ul>
                <form class="validate-form" method="POST" enctype="multipart/form-data" action="">
                    @csrf
                    <div class="panel-body">
                        <div class="tab-content">
                            <div role="tabpanel" class="tab-pane active" id="info">
                                <div class="box-card">
                                    <h2>Meta tags del sitio</h2>
                                    <div class="row">
                                        <div class="col-lg-4 form-group">
                                            <label>Título del sitio</label>
                                            <input type="text" class="form-control" name="info[title_meta]"
                                                   value="{{$info['title_meta'] ?? ''}}"/>
                                        </div>
                                        <div class="col-lg-8 form-group">
                                            <label>Palabras clave (separa con una 'coma' cada palabra)</label>
                                            <input type="text" class="form-control" name="info[keywords_meta]"
                                                   data-role="tagsinput"
                                                   value="{{$info['keywords_meta'] ?? ''}}"/>
                                        </div>
                                        <div class="col-lg-12 form-group">
                                            <label>Corta descripción del sitio (Máx. 200 carácteres)</label>
                                            <textarea class="form-control"
                                                      name="info[description_meta]">{{$info['description_meta'] ?? ''}}</textarea>

                                        </div>
                                    </div>
                                </div>

                                <div class="box-card">
                                    <h2>Redes sociales</h2>
                                    <div class="row">
                                        <div class="col-lg-6 form-group">
                                            <label>Facebook</label>
                                            <input type="text" class="form-control" name="info[facebook]"
                                                   value="{{$info['facebook'] ?? ''}}"/>
                                        </div>
                                        <div class="col-lg-6 form-group">
                                            <label>Instagram</label>
                                            <input type="text" class="form-control" name="info[instagram]"
                                                   value="{{$info['instagram'] ?? ''}}"/>
                                        </div>
                                        <div class="col-lg-6 form-group">
                                            <label>Twitter</label>
                                            <input type="text" class="form-control" name="info[twitter]"
                                                   value="{{$info['twitter'] ?? ''}}"/>
                                        </div>
                                        <div class="col-lg-6 form-group">
                                            <label>Youtube</label>
                                            <input type="text" class="form-control" name="info[youtube]"
                                                   value="{{$info['youtube'] ?? ''}}"/>
                                        </div>
                                    </div>
                                </div>

                                <div class="box-card">
                                    <h2>Información de contacto</h2>
                                    <div class="row">
                                        <div class="col-lg-4 form-group">
                                            <label>Email (contáctenos)</label>
                                            <input type="text" class="form-control" name="info[email]"
                                                   value="{{$info['email'] ?? ''}}" required/>
                                        </div>
                                        <div class="col-lg-4 form-group">
                                            <label>Teléfono</label>
                                            <input type="text" class="form-control" name="info[phone]"
                                                   value="{{$info['phone'] ?? ''}}"/>
                                        </div>
                                        <div class="col-lg-4 form-group">
                                            <label>WhatsApp</label>
                                            <input type="text" class="form-control" name="info[whatsapp]"
                                                   value="{{$info['whatsapp'] ?? ''}}"/>
                                        </div>
                                        <div class="col-lg-4 form-group">
                                            <label>Ciudad</label>
                                            <input type="text" class="form-control" name="info[city]"
                                                   value="{{$info['city'] ?? ''}}"/>
                                        </div>
                                        <div class="col-lg-8 form-group">
                                            <label>Dirección</label>
                                            <input type="text" class="form-control" name="info[address]"
                                                   value="{{$info['address'] ?? ''}}"/>
                                        </div>
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-lg-6">
                                        <div class="box-card">
                                            <h2>Código estadísticas</h2>
                                            <div class="row">
                                                <div class="col-lg-12 form-group">
                                                    <label>Google Analytics (Código de Seguimiento: Ej.
                                                        UA-1234567-12)</label>
                                                    <input type="text" class="form-control" name="info[analytics]"
                                                           value="{{$info['analytics'] ?? ''}}"/>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-lg-6">
                                        <div class="box-card">
                                            <h2>Plantilla de correos</h2>
                                            <div class="row">
                                                <div class="col-lg-12 form-group">
                                                    <label>Color de la plantilla</label>
                                                    <input type="text" class="form-control jscolor {hash:true}"
                                                           id="template_color" name="info[template_color]"
                                                           value="{{$info['template_color'] ?? ''}}"/>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-lg-12">
                                        <div class="box-card">
                                            <h2>Ubicación en el mapa</h2>
                                            <div class="row">
                                                <div id="map_canvas" style="width:100%; height:350px"></div>
                                                <input type="hidden" name="info[latitude]" id="latitude_map"
                                                       value="{{$info['latitude'] ?? ''}}">
                                                <input type="hidden" name="info[longitude]" id="longitude_map"
                                                       value="{{$info['longitude'] ?? ''}}">
                                            </div>
                                        </div>

                                    </div>
                                </div>
                            </div>
                            <div role="tabpanel" class="tab-pane" id="banners">
                                <div class="col-lg-3">
                                    @include('admin.includes.config-image',['name'=>'banner','title'=>'Banner default','size'=>'450px ancho x 350px alto'])
                                </div>
                                <div class="col-lg-3">
                                    @include('admin.includes.config-image',['name'=>'icon','title'=>'Icono default','size'=>'50px ancho x 50px alto'])
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="panel-footer bg-white">
                        <button type="submit" class="btn btn-main"><i class="fa fa-save"></i> Guardar</button>
                        <a href="{{route('dashboard')}}" class="btn btn-default">Cancelar</a>
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
            latitude = '{{get_info('latitude')}}',
            longitude = '{{get_info('longitude')}}',
            icon_map_url = '{{asset('images/marker.png')}}';
    </script>
@endsection