<div class="col-lg-12">
    <h2 class="list-title">Meta tags</h2>
</div>
<div class="col-lg-12 form-group">
    <label>Título</label>
    <input type="text" class="form-control" name="info[title_meta]" value="{{$reg->info->title_meta ?? null}}"
           maxlength="200"/>
</div>
<div class="col-lg-12 form-group">
    <label class="tag-label">Palabras clave (separa con una 'coma' cada palabra)</label>
    <input type="text" class="form-control" name="info[keywords_meta]" data-role="tagsinput"
           value="{{$reg->info->keywords_meta ?? null}}"/>
</div>
<div class="col-lg-12 form-group">
    <label>Descripción (Máx. 300 carácteres)</label>
    <textarea class="form-control"
              name="info[description_meta]" maxlength="300">{{$reg->info->description_meta ?? null}}</textarea>
</div>
@include('admin.includes.image-seo',['title'=>'Imagen','size'=>'600px ancho x 315px alto'])
