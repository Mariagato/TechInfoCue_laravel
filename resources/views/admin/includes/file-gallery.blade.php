<div class="col-lg-12">
    <h2 class="list-title">Galería de archivos</h2>
</div>
<div class="col-lg-12">
    <div class="dropzone dropzone_file">
    </div>
</div>
<div class="col-lg-12">
    <ul class="sortable sortable-image" id="sortable_files">
        @if(isset($files))
            @foreach($files as $file)
                <li id="file_{{$file->id}}" data-id="{{$file->id}}">
                    <figure class="imghvr-fade"><img src="{{asset("upload/default/upload-pdf.png")}}"
                                                     class="img-responsive" width="180" height="120">
                        <figcaption>
                            <a class="white-rounded" onclick="editFile({{$file->id}})" title="editar">
                                <i class="icon mdi-editor-mode-edit i-20"></i>
                            </a>
                            <a href="{{asset("upload/file/$file->filename")}}" class="white-rounded popup-files" title="ver">
                                <i class="icon mdi-action-search i-20"></i>
                            </a>
                            <a onclick="deleteFile({{$file->id}})" class="white-rounded" title="eliminar">
                                <i class="icon mdi-action-delete i-20"></i>
                            </a>
                        </figcaption>
                    </figure>
                </li>
            @endforeach
        @endif
    </ul>
</div>