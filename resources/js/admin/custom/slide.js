'use strict';

var sortable;
Dropzone.autoDiscover = false;

$(function () {
    if ($('.dropzone_slide').length) {
        if (typeof Dropzone === 'function') {
            var myDropzone = new Dropzone('.dropzone_slide',
                {
                    url: url_gallery + '/' + slide_id,
                    dictDefaultMessage: 'Arrastra las imágenes a la zona punteada o presiona clic para cargarlas<br/><strong>Tamaño recomendado de ' + tam_slide + ' de alto y un formato .jpg, .png o .gif.</strong><br>Puedes ordenar las imagenes cargadas haciendo clic sostenido sobre una de ellas y desplazándola hacía los lados.',
                    parallelUploads: true,
                    maxFilesize: 3,
                    autoProcessQueue: true,
                    sending: function (file, xhr, formData) {
                        formData.append("_token", token_src);
                    }
                });

            myDropzone.on("success", function (file, response) {
                var item = response.data;
                var html = '<li id="image_' + item.id + '" data-id="' + item.id + '">' +
                    '                    <figure class="imghvr-fade"><img src="' + upload_url + '/slide/s' + item.filename + '"' +
                    '                                                     class="img-responsive" width="180" height="120">' +
                    '                        <figcaption>' +
                    '                            <a class="white-rounded" onclick="editImg(' + item.id + ')" title="editar">' +
                    '                                <i class="icon mdi-editor-mode-edit i-20"></i>' +
                    '                            </a>' +
                    '                            <a class="white-rounded popup-gallery"  href="' + upload_url + '/slide/b' + item.filename + '" title="ver">' +
                    '                                <i class="icon mdi-action-search i-20"></i>' +
                    '                            </a>' +
                    '                            <a onclick="deleteImg(' + item.id + ')" class="white-rounded" title="eliminar">' +
                    '                                <i class="icon mdi-action-delete i-20"></i>' +
                    '                            </a>' +
                    '                        </figcaption>' +
                    '                    </figure>' +
                    '                </li>';

                $(".sortable-image").append(html);
                loadPopup();
                myDropzone.removeFile(file);
            });

            loadPopup();

            var el = document.getElementById('sortable_slide');
            sortable = Sortable.create(el, {
                onSort: function () {
                    $.post(order_url, {data: sortable.toArray(), _token: token_src}, function () {
                    })
                }
            });
        }
    }
});

function editImg(id) {
    var names = ['name_slide', 'description_slide', 'link','image_id'];
    clearValues(names);

    $.get(get_img_url + '/' + id, {}, function (data) {
        $("#image_id").val(id);
        $("#name_slide").val(data.info.name);
        $("#description_slide").val(data.info.description);
        $("#link").val(data.link);
        $('#modal_slide').modal('show');
    });
}

function saveImg() {
    var data = $("#form_img").serialize();
    $.post(edit_img_url, data, function (response) {
        $.post(order_url, {data: sortable.toArray(), _token: token_src}, function () {
            $('#modal_slide').modal('hide');
        });
        showMessage( 'success',response.msj);
    });
}

function deleteImg(id) {
  confirmModal({
        messageText: '¿Deseas eliminar esta imagen?',
        alertType: "danger"
    }).done(function (e) {
      if(e) {
          $.ajax({
              url: delete_img_url + "/" + id,
              method: 'DELETE',
              data: {_token: token_src}
          }).done(function () {
              $("#image_" + id).remove();
              showMessage('success', 'Imagen eliminada');
          });
      }
    });
}