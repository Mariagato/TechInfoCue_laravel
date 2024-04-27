@extends('admin.layouts.app')

@section('title', ($option ?? 'Agregar') . ' servicio')

@section('breadcrumb')
    <ol class="breadcrumb bread-main">
        <li class="breadcrumb-item"><a href="{{route('dashboard')}}"><i class="mdi-action-home"></i></a></li>
        <li class="breadcrumb-item"><a href="{{route('services.list')}}">Servicios</a></li>
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
                    <li role="presentation"><a href="#videos" aria-controls="videos" role="tab"
                                               data-toggle="tab">VÍDEOS</a></li>
                    <li role="presentation"><a href="#meta" aria-controls="meta" role="tab"
                                               data-toggle="tab">SEO</a></li>
                </ul>
                <form class="validate-form" method="POST" enctype="multipart/form-data" action="">
                    @csrf
                    <input type="hidden" name="dat[gallery_id]" id="gallery_id"
                           value="{{$reg->gallery_id ?? NULL}}">
                    <input type="hidden" name="dat[video_gallery_id]" id="video_id"
                           value="{{$reg->video_gallery_id ?? NULL}}">
                    <div class="panel-body">
                        <div class="tab-content">
                            <div role="tabpanel" class="tab-pane active" id="info">
                                <div class="row">
                                    <div class="col-lg-8 form-group">
                                        <label>Título</label>
                                        <input type="text" class="form-control" name="info[title]"
                                               value="{{$reg->info->title ?? null}}" required
                                               maxlength="200"/>
                                    </div>
                                    <div class="col-lg-4 form-group">
                                        <label>Categoría</label>
                                        {!! generate_select('dat[category_id]',$categories,$reg->category_id ?? 0) !!}
                                    </div>
                                    <div class="col-lg-12 form-group">
                                        <label>Descripción (Máx. 300 Carácteres)</label>
                                        <textarea rows="2" maxlength="300" class="form-control"
                                                  name="info[description]">{{$reg->info->description ?? null}}</textarea>
                                    </div>
                                    <div class="col-lg-12 form-group">
                                        <label>Contenido</label>
                                        <textarea class="form-control" name="info[content]"
                                                  id="ckeditor">{{$reg->info->content ?? null}}</textarea>
                                    </div>
                                </div>
                            </div>
                            <div role="tabpanel" class="tab-pane" id="images">
                                <div class="row">
                                    @include('admin.includes.main-image',['title'=>'Miniatura','size'=>'450px ancho x 350px alto'])
                                    <div class="col-lg-12">
                                        <br>
                                    </div>
                                    @include('admin.includes.gallery')
                                </div>
                            </div>

                            <div role="tabpanel" class="tab-pane" id="videos">
                                <div class="row">
                                    @include('admin.includes.video-gallery')
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
                        <a href="{{route('services.list')}}" class="btn btn-default">Cancelar</a>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection

@section('js_vars')
    @include('admin.includes.gallery-vars')
    @include('admin.includes.video-gallery-vars')
@endsection

@section('scripts')
    <script src="{{asset('vendors/ckeditor/ckeditor.js')}}"></script>
    <script src="{{asset('vendors/ckeditor/config.js')}}"></script>
@endsection