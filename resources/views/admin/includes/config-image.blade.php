@php
    $image = get_info($name);
    $parent = chstr($name);
@endphp

<h3 class="config-title">{{$title ?? ''}}
    <small>({{$size ?? ''}})</small>
</h3>

<div class="image-{{$parent}}">
    <input type="hidden" name="delimg_{{$name}}" id="del_image-{{$parent}}" value="0">
    @if(!empty($image))
        <a href="{{asset('upload/configsite/s'.$image)}}" class="popup-gallery">
            <img src="{{asset('upload/configsite/s'.$image)}}" data-load="true" class="img-thumbnail img_preview"
                 width="200">
        </a>
    @else
        <img src="{{asset('upload/default/no-image-small.png')}}" data-load="false" class="img-thumbnail img_preview"
             width="200">
    @endif
    <div class="col-lg-12">
        <br>
    <input id="image_{{$parent}}" data-parent="image-{{$parent}}" type="file" class="hidden config_image"
           accept="image/*" name="{{$name}}">

    <label class="btn btn-outline-main btn_select {{!empty($image)?'hidden':''}}"
           for="image_{{$parent}}">
        Selecciona una imagen
    </label>
    <div>
        <label class="btn btn-outline-main btn_change {{!empty($image)?'':'hidden'}}"
               for="image_{{$parent}}">
            Cambiar
        </label>
        <label class="btn btn-outline-danger btn_config_delete {{!empty($image)?'':'hidden'}}" data-parent="image-{{$parent}}">
            Eliminar
        </label>
    </div>
    </div>
</div>





