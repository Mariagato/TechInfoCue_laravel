<div class="col-lg-12">
    <h2 class="list-title">Galería de imágenes</h2>
</div>
<div class="col-lg-12">
    <div class="dropzone dropzone_gallery">
    </div>
</div>
<div class="col-lg-12">
    <ul class="sortable sortable-image" id="sortable_image">
        @if(isset($images))
            @foreach($images as $image)
                <li id="image_{{$image->id}}" data-id="{{$image->id}}">
                    <figure class="imghvr-fade"><img src="{{asset("upload/gallery/s$image->filename")}}"
                                                     class="img-responsive" width="180" height="120">
                        <figcaption>
                            <a class="white-rounded" onclick="editImgGallery({{$image->id}})" title="editar">
                                <i class="icon mdi-editor-mode-edit i-20"></i>
                            </a>
                            <a href="{{asset("upload/gallery/b$image->filename")}}" class="white-rounded popup-gallery" title="ver">
                                <i class="icon mdi-action-search i-20"></i>
                            </a>
                            <a onclick="deleteImgGallery({{$image->id}})" class="white-rounded" title="eliminar">
                                <i class="icon mdi-action-delete i-20"></i>
                            </a>
                        </figcaption>
                    </figure>
                </li>
            @endforeach
        @endif
    </ul>
</div>