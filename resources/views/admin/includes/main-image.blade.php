<div class="col-lg-12">
    <h2 class="list-title">{{$title ?? ''}}
        <small>({{$size ?? ''}})</small>
    </h2>
</div>
<div class="col-lg-12">
    <input type="hidden" name="delimg" id="delimg" value="0">
    @if(isset($reg['reg']) and $reg['reg']['Imagen']!="")
        <a href="{{asset('upload/'.$reg['reg']['Imagen'])}}" class="popup-gallery">
        <img src="{{asset('upload/'.$reg['reg']['Imagen'])}}" data-load="true" class="img-thumbnail img_preview"
             width="200">
        </a>
    @else
        <img src="{{asset('upload/default/no-image-small.png')}}" data-load="false" class="img-thumbnail img_preview"
             width="200">
    @endif
</div>
<div class="col-lg-12">
    <br>
    <input id="image" type="file" class="hidden feature_image" accept="image/*" name="image">

    <label class="btn btn-outline-main btn_select {{(isset($reg['reg']) and $reg['reg']['Imagen']!="")?'hidden':''}}"
           for="image">
        Selecciona una imagen
    </label>
    <div>
        <label class="btn btn-outline-main btn_change {{(isset($reg['reg']) and $reg['reg']['Imagen']!="")?'':'hidden'}}"
               for="image">
            Cambiar
        </label>
        <label class="btn btn-outline-danger btn_delete {{(isset($reg['reg']) and $reg['reg']['Imagen']!="")?'':'hidden'}}">
            Eliminar
        </label>
    </div>
</div>
