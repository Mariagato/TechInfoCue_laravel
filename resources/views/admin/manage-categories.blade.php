@extends('admin.layouts.app')

@section('title', 'Administrar categorías')

@section('breadcrumb')
    <ol class="breadcrumb bread-main">
        <li class="breadcrumb-item"><a href="{{route('dashboard')}}"><i class="mdi-action-home"></i></a></li>
        <li class="breadcrumb-item"><a href="{{$route_parent}}">{{$title_parent}}</a></li>
    </ol>
@endsection

@section('body')
    @include('admin.includes.modals')
    <div class="panel panel-default">
        <div class="row">
            <div class="col-xs-12">
                <div id="Cat_levels">
                    <div class="area-main">
                        <section class="area_category line-right1" id="area_main">
                            @if(count($parents)>0)
                                <div class="head">
                                    <div class="row">
                                        <div class="col-sm-6">
                                            <div class="title">{{isset($title_type) ? ucfirst($title_type) : 'Categorías' }}
                                                <span class="line"></span></div>
                                        </div>
                                        <div class="col-sm-6 text-right">
                                            <div class="btn-add"><a onclick="newCategory(0,0)">Agregar </a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <ul id="sortable_0">
                                    @foreach($parents as $category)
                                        <li id="cat_{{$category->id}}" data-id="{{$category->id}}">
                                            <div class="options">
                                                <button class="btn-cate btn btn-primary" title="Editar"
                                                        onclick="openCategory({{$category->id}})">
                                                    <i class="fa fa-pencil" aria-hidden="true"></i>
                                                </button>
                                                @if($category->show_delete)
                                                    <button class="btn-cate btn btn-danger" title="Eliminar"
                                                            onclick="deleteCategory({{$category->id}},0,0)">
                                                        <i class="fa fa-trash" aria-hidden="true"></i>
                                                    </button>
                                                @endif
                                            </div>
                                            <div class="mask"
                                                 onclick="selectCategory('{{$category->id}}','{{$category->level}}')">
                                                <a>{{$category->info->name}}</a>
                                            </div>
                                        </li>
                                    @endforeach
                                </ul>
                            @else
                                <div class="empty-alert">
                                    <div class="info">
                                        <div class="area">
                                            No hay categorías almacenadas
                                            <a onclick="newCategory(0,0)" class="btn-add-cat">Agregar</a>
                                        </div>
                                    </div>
                                </div>
                            @endif
                        </section>
                    </div>
                    <div class="area-scroll">
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('js_vars')
    <script>
        var type_category = '{{$type}}',
            title_type = '{{$title_type ?? 'categoría'}}',
            title_parent = '{{$title_parent}}',
            title_table = '{{$type=='icon' ? 'Iconos' : 'categorías'}}',
            level_limit = '{{$level_limit}}',
            msj_tam_icon = '{{$msj_tam_icon ?? null}}',
            img_default = '{{asset('upload/default/no-image-small.png')}}',
            url_upload = '{{asset('upload/category')}}/',
            url_edit_category = '{{route('categories.edit')}}',
            url_delete_category = '{{route('categories.delete')}}',
            url_get_category = '{{route('categories.get')}}',
            url_order_category = '{{route('categories.order')}}',
            url_save_category_img = '{{route('categories.upload_image')}}',
            url_categories = '{{route('categories.list')}}';
    </script>
@endsection