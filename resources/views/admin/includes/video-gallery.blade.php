<div class="col-lg-12">
    <h2 class="list-title">Galería de vídeos</h2>
</div>
<div class="col-lg-12">
    <label>Ingresa la URL del video (Youtube) y oprime el botón <strong>SUBIR</strong> para cargar tu video.</label>
    <div class="input-group">
        <input type="text" class="form-control video_url"/>
        <span class="input-group-btn">
             <button type="button" class="btn btn-outline-main upload_video">Subir</button>

        </span>
    </div>
</div>
<div class="col-lg-12">
    <ul class="sortable sortable-video" id="sortable_video">
        @if(isset($videos))
            @foreach($videos as $video)
                <li id="video_{{$video->id}}" data-id="{{$video->id}}">
                    <figure class="imghvr-fade"><img src="{{$video->image}}"
                                                     class="img-responsive" width="180" height="120">
                        <figcaption>
                            <a class="white-rounded" onclick="editVideo({{$video->id}})" data-toggle="modal"
                               data-target="#modal-gallery">
                                <i class="icon mdi-editor-mode-edit i-20"></i>
                            </a>
                            <a href="{{$video->url}}" class="white-rounded popup-files">
                                <i class="icon mdi-action-search i-20"></i>
                            </a>
                            <a onclick="deleteVideo({{$video->id}})" class="white-rounded">
                                <i class="icon mdi-action-delete i-20"></i>
                            </a>
                        </figcaption>
                    </figure>
                </li>
            @endforeach
        @endif
    </ul>
</div>