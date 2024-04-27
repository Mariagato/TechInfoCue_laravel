'use strict';
var sortablef;
Dropzone.autoDiscover = false;

$(function () {
    if ($('.dropzone_file').length) {
        if (typeof Dropzone === 'function') {
            var myDropzone = new Dropzone('.dropzone_file',
                {
                    url: url_upload_file + '/' + file_gallery_id,
                    dictDefaultMessage: 'Arrastra los archivos PDF a la zona punteada o presiona clic para cargarlos<br/><strong>Tamaño Máximo 10MB</strong><br>Puedes ordenar los archivos cargados haciendo clic sostenido sobre uno de ellos y desplazándolo hacía los lados.',
                    parallelUploads: true,
                    maxFilesize: 10,
                    acceptedFiles: '.pdf',
                    autoProcessQueue: true,
                    sending: function (file, xhr, formData) {
                        formData.append("_token", token_src);
                    },
                });

            myDropzone.on("success", function (file, response) {
                if (response.status === 'success') {
                    var item = response.data;
                    $("#file_gallery_id").val(response.gallery_id);
                    myDropzone.options.url = url_upload_file + '/' + response.gallery_id;
                    var html = '<li id="file_' + item.id + '" data-id="' + item.id + '">' +
                        '                    <figure class="imghvr-fade"><img src="' + img_default + '"' +
                        '                                                     class="img-responsive" width="180" height="120">' +
                        '                        <figcaption>' +
                        '                            <a class="white-rounded" onclick="editFile(' + item.id + ')" title="editar">' +
                        '                                <i class="icon mdi-editor-mode-edit i-20"></i>' +
                        '                            </a>' +
                        '                            <a class="white-rounded popup-files"  href="' + upload_url_file + '/' + item.filename + '" title="ver">' +
                        '                                <i class="icon mdi-action-search i-20"></i>' +
                        '                            </a>' +
                        '                            <a onclick="deleteFile(' + item.id + ')" class="white-rounded" title="eliminar">' +
                        '                                <i class="icon mdi-action-delete i-20"></i>' +
                        '                            </a>' +
                        '                        </figcaption>' +
                        '                    </figure>' +
                        '                </li>';
                    $("#sortable_files").append(html);
                    myDropzone.removeFile(file);
                    loadPopup();
                }else{
                    showMessage('error', response.message);
                }
            });

            loadPopup();

            var el = document.getElementById('sortable_files');
            sortablef = Sortable.create(el, {
                onSort: function () {
                    $.post(order_file_url, {data: sortablef.toArray(), _token: token_src}, function () {
                    })
                }
            });
        }
    }
});

function editFile(id) {
    var names = ['description_file', 'file_id_gallery'];
    clearValues(names);

    $.get(get_file_url + '/' + id, {}, function (data) {
        $("#file_id_gallery").val(id);
        $("#description_file").val(data.info.description);
        $('#modal_file').modal('show');
    })
}

function saveFile() {
    var data = $("#form_file").serialize();

    $.post(edit_file_url, data, function (response) {
        $.post(order_file_url, {data: sortablef.toArray(), _token: token_src}, function () {
            $('#modal_file').modal('hide');
        });
        showMessage('success', response.msj);
    })
}

function deleteFile(id) {
    confirmModal({
        messageText: '¿Deseas eliminar este archivo?',
        alertType: "danger"
    }).done(function (e) {
        if (e) {
            $.ajax({
                url: delete_file_url + "/" + id,
                method: 'DELETE',
                data: {_token: token_src}
            }).done(function () {
                $("#file_" + id).remove();
                showMessage('success', 'Archivo eliminado');
            });
        }
    });
}