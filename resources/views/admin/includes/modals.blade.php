<!-- Slide -->
<div class="modal modal-primary fade scale" id="modal_slide" tabindex="-1" role="dialog" aria-labelledby="modal-slide"
     aria-hidden="true">
    <div class="modal-dialog modal-md" role="document">
        <div class="modal-content">
            <form action="" method="post" id="form_img" novalidate>
                @csrf
                <input type="hidden" name="info[slide_image_id]" id="image_id">
                <div class="modal-header header-main">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                    <h4 class="modal-title" id="modal-sm-info-label">Información de la imagen</h4>
                </div>
                <div class="modal-body">
                    <div class="row">
                        <div class="col-xs-12" id="div_name_slide">
                            <div class="form-group">
                                <label>Título</label>
                                <input type="text" name="info[name]" id="name_slide" class="form-control"/>
                            </div>
                        </div>
                        <div class="col-xs-12" id="div_description_slide">
                            <div class="form-group">
                                <label>Descripción</label>
                                <input type="text" name="info[description]" id="description_slide"
                                       class="form-control"/>
                            </div>
                        </div>
                        <div class="col-xs-12 ipt_slide" id="div_link_slide">
                            <div class="form-group">
                                <label>Link (Url absoluta)</label>
                                <input type="text" name="link" id="link" class="form-control"/>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-main" onclick="saveImg()"><i class="fa fa-check"
                                                                                      aria-hidden="true"></i>
                        Aceptar
                    </button>
                    <button type="button" class="btn btn-default" data-dismiss="modal" aria-label="Close">Cancelar
                    </button>
                </div>
            </form>
        </div>
    </div>
</div>

<!-- Gallery -->
<div class="modal modal-primary fade scale" id="modal_gallery" tabindex="-1" role="dialog"
     aria-labelledby="modal-gallery"
     aria-hidden="true">
    <div class="modal-dialog modal-md" role="document">
        <div class="modal-content">
            <form action="" method="post" id="form_img_gallery" novalidate>
                @csrf
                <input type="hidden" name="info[gallery_image_id]" id="image_id_gallery">
                <div class="modal-header header-main">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                    <h4 class="modal-title" id="modal-sm-info-label">Información de la imagen</h4>
                </div>
                <div class="modal-body">
                    <div class="row">
                        <div class="col-xs-12">
                            <div class="form-group">
                                <label>Descripción</label>
                                <input type="text" name="info[description]" id="description_gallery"
                                       class="form-control"/>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-main" onclick="saveImgGallery()"><i class="fa fa-check"
                                                                                             aria-hidden="true"></i>
                        Aceptar
                    </button>
                    <button type="button" class="btn btn-default" data-dismiss="modal" aria-label="Close">Cancelar
                    </button>
                </div>
            </form>
        </div>
    </div>
</div>

<!-- Video -->
<div class="modal modal-primary fade scale" id="modal_video" tabindex="-1" role="dialog" aria-labelledby="modal-gallery"
     aria-hidden="true">
    <div class="modal-dialog modal-md" role="document">
        <div class="modal-content">
            <form action="" method="post" id="form_video" novalidate>
                @csrf
                <input type="hidden" name="info[video_id]" id="video_id_gallery">
                <div class="modal-header header-main">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                    <h4 class="modal-title" id="modal-sm-info-label">Información del video</h4>
                </div>
                <div class="modal-body">
                    <div class="row">
                        <div class="col-xs-12">
                            <div class="form-group">
                                <label>Descripción</label>
                                <input type="text" name="info[description]" id="description_video"
                                       class="form-control"/>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-main" onclick="saveVideo()"><i class="fa fa-check"
                                                                                        aria-hidden="true"></i>
                        Aceptar
                    </button>
                    <button type="button" class="btn btn-default" data-dismiss="modal" aria-label="Close">Cancelar
                    </button>
                </div>
            </form>
        </div>
    </div>
</div>

<!-- File -->
<div class="modal modal-primary fade scale" id="modal_file" tabindex="-1" role="dialog" aria-labelledby="modal-gallery"
     aria-hidden="true">
    <div class="modal-dialog modal-md" role="document">
        <div class="modal-content">
            <form action="" method="post" id="form_file" novalidate>
                @csrf
                <input type="hidden" name="info[file_id]" id="file_id_gallery">
                <div class="modal-header header-main">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                    <h4 class="modal-title" id="modal-sm-info-label">Información del archivo</h4>
                </div>
                <div class="modal-body">
                    <div class="row">
                        <div class="col-xs-12">
                            <div class="form-group">
                                <label>Descripción</label>
                                <input type="text" name="info[description]" id="description_file"
                                       class="form-control"/>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-main" onclick="saveFile()"><i class="fa fa-check"
                                                                                       aria-hidden="true"></i>
                        Aceptar
                    </button>
                    <button type="button" class="btn btn-default" data-dismiss="modal" aria-label="Close">Cancelar
                    </button>
                </div>
            </form>
        </div>
    </div>
</div>

<!-- Category -->
<div class="modal modal-primary fade scale" id="category_modal" tabindex="-1" role="dialog"
     aria-labelledby="modal-sm-info"
     aria-hidden="true">
    <div class="modal-dialog modal-md" role="document">
        <div class="modal-content">
            <form action="" method="post" id="form-category" class="validate-form">
                @csrf
                <input type="hidden" name="dat[id]" id="category_id" value="0">
                <input type="hidden" name="dat[parent]" id="parent_id" value="0">
                <input type="hidden" name="dat[type]" id="type" value="content">
                <input type="hidden" name="dat[level]" id="level" value="0">
                <input name="dat[image]" type="hidden" id="image_category"/>
                <div class="modal-header header-main">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                    <h4 class="modal-title" id="title_modal">Nueva categoría</h4>
                </div>
                <div class="modal-body">
                    <div class="row">
                        <div class="col-xs-12">
                            <div class="form-group">
                                <label>Nombre de la categoría</label>
                                <input name="info[name]" id="name" class="form-control" required/>
                            </div>
                        </div>
                        <div class="col-xs-8 div-image hidden">
                            <div class="dropzone-category" style="padding: 0 40px; min-height: 100px;"></div>
                            <small class="help-block error max-size-error" style="display: none;">
                                El tamaño máximo admitido de la images es 3MB
                            </small>
                        </div>
                        <div class="col-xs-4 div-image hidden">
                            <div class="form-group">
                                <div>
                                    <img src="{{asset('upload/default/no-image-small.png')}}" data-load="false"
                                         class="img-thumbnail image-category" width="150">
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-main" onclick="saveCategory()"><i class="fa fa-check"
                                                                                           aria-hidden="true"></i>
                        Aceptar
                    </button>
                    <button type="button" class="btn btn-default" data-dismiss="modal" aria-label="Close">Cancelar
                    </button>
                </div>
            </form>
        </div>
    </div>
</div>

<!-- Order -->
<div id="order_modal" class="modal modal-primary">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header header-main"
                 style="padding: 15px; border-top-left-radius: 5px; border-top-right-radius: 5px;">
                <button type="button" class="close" data-dismiss="modal"><span
                            aria-hidden="true">×</span><span class="sr-only">Close</span></button>
                <h4 class="modal-title" id="title_order_modal">Ordenar</h4></div>
            <div class="modal-body">
                <div class="row">
                    <div class="col-lg-12">
                        <p><strong>-</strong> Para cambiar el orden debe arrastrar la fila a la posición
                            deseada (los cambios
                            se guardan automáticamente y el nuevo orden se puede ver al recargar la página).
                        </p>
                    </div>
                    <div class="col-lg-12">
                        <table class="table table-bordered list_item" width="100%">
                            <thead>
                            <tr>
                            </tr>
                            </thead>
                            <tbody id="tbody_modal">
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">Cerrar</button>
            </div>
        </div>
    </div>
</div>


<!-- Delete msj -->
<div id="delete_modal" class="modal fade">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header alert-danger"
                 style="padding: 15px; border-top-left-radius: 5px; border-top-right-radius: 5px;">
                <button type="button" class="close" data-dismiss="modal"><span
                            aria-hidden="true">×</span><span class="sr-only">Close</span></button>
                <h4 class="modal-title">Error eliminando</h4></div>
            <div class="modal-body">
                <div id="delete_modal_msj">
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">Cerrar</button>
            </div>
        </div>
    </div>
</div>
