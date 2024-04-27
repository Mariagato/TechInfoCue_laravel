@extends('admin.layouts.app')

@section('title', 'Imágenes '. mb_strtolower($title))

@section('breadcrumb')
    <ol class="breadcrumb bread-main">
        <li class="breadcrumb-item"><a href="{{route('dashboard')}}"><i class="mdi-action-home"></i></a></li>
        <li class="breadcrumb-item active">{{$title}}</li>
    </ol>
@endsection

@section('body')
    @include('admin.includes.modals')
    <div class="panel panel-default">
        <form class="validate-form" method="POST" enctype="multipart/form-data" action="">
            @csrf
            <div class="panel-body">
                <div class="row">
                    <div class="col-lg-12">
                        <div class="dropzone dropzone_slide">
                        </div>
                    </div>
                    <div class="col-lg-12">
                        <ul class="sortable sortable-image" id="sortable_slide">
                            @if(isset($images))
                                @foreach($images as $image)
                                    <li id="image_{{$image->id}}" data-id="{{$image->id}}">
                                        <figure class="imghvr-fade"><img
                                                    src="{{asset("upload/slide/s$image->filename")}}"
                                                    class="img-responsive" width="180" height="120">
                                            <figcaption>
                                                <a class="white-rounded" onclick="editImg({{$image->id}})"
                                                   title="editar">
                                                    <i class="icon mdi-editor-mode-edit i-20"></i>
                                                </a>
                                                <a href="{{asset("upload/slide/b$image->filename")}}"
                                                   class="white-rounded popup-gallery" title="ver">
                                                    <i class="icon mdi-action-search i-20"></i>
                                                </a>
                                                <a onclick="deleteImg({{$image->id}})" class="white-rounded"
                                                   title="eliminar">
                                                    <i class="icon mdi-action-delete i-20"></i>
                                                </a>
                                            </figcaption>
                                        </figure>
                                    </li>
                                @endforeach
                            @endif
                        </ul>
                    </div>
                </div>
            </div>
            <div class="panel-footer bg-white">
                <button type="submit" class="btn btn-main"><i class="fa fa-save"></i> Guardar</button>
                <a href="{{route('contents.list')}}" class="btn btn-default">Cancelar</a>
            </div>
        </form>
    </div>
@endsection
@section('js_vars')
    <script>
        var upload_url = '{{asset('upload/')}}',
            url_gallery = '{{route('slides.upload')}}',
            tam_slide = '{{$tam_gallery ?? ''}}',
            slide_id = '{{$slide_id ?? 0}}',
            edit_img_url = '{{route('slides.edit')}}',
            delete_img_url = '{{route('slides.delete')}}',
            get_img_url = '{{route('slides.get')}}',
            order_url = '{{route('slides.order')}}',
            img_default = '{{asset('upload/default/no-image-small.png')}}';
    </script>
@endsection