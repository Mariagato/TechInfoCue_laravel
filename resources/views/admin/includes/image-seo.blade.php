<div class="col-lg-12">
    <h2 class="list-title">{{$title ?? ''}}
        <small>({{$size ?? ''}})</small>
    </h2>
</div>
<div class="col-lg-12">
    <input type="hidden" name="delimg_seo" id="delimg_seo" value="0">
    @if(isset($reg) and $reg->image_seo!="")
        <a href="{{asset('upload/'.$path.'/s'.$reg->image_seo)}}" class="popup-gallery">
        <img src="{{asset('upload/'.$path.'/s'.$reg->image_seo)}}" data-load="true" class="img-thumbnail img_seo_preview"
             width="200">
        </a>
    @else
        <img src="{{asset('upload/default/no-image-small.png')}}" data-load="false" class="img-thumbnail img_seo_preview"
             width="200">
    @endif
</div>
<div class="col-lg-12">
    <br>
    <input id="image_seo" type="file" class="hidden seo_image" accept="image/*" name="image_seo">

    <label class="btn btn-outline-main btn_seo_select {{(isset($reg) and $reg->image_seo!="")?'hidden':''}}"
           for="image_seo">
        Selecciona una imagen
    </label>
    <div>
        <label class="btn btn-outline-main btn_seo_change {{(isset($reg) and $reg->image_seo!="")?'':'hidden'}}"
               for="image">
            Cambiar
        </label>
        <label class="btn btn-outline-danger btn_seo_delete {{(isset($reg) and $reg->image_seo!="")?'':'hidden'}}">
            Eliminar
        </label>
    </div>
</div>
