'use strict';
var sortablev;

$(function () {
    if ($(".upload_video").length > 0) {
        $(".upload_video").on('click', function () {
            var url = $(".video_url").val();
            if (url !== "") {
                $.post(url_upload_video + '/' + video_gallery_id, {url: url, _token: token_src}, function (response) {
                    if (response.status === 'success') {
                        var item = response.data;
                        $("#video_id").val(response.video_id);
                        video_gallery_id = response.video_id;
                        $(".video_url").val('');
                        var html = '<li id="video_' + item.id + '" data-id="' + item.id + '">' +
                            '                    <figure class="imghvr-fade"><img src="' + item.image + '"' +
                            '                                                     class="img-responsive" width="180" height="120">' +
                            '                        <figcaption>' +
                            '                            <a class="white-rounded" onclick="editVideo(' + item.id + ')" data-toggle="modal"' +
                            '                               data-target="#modal-gallery" title="editar">' +
                            '                                <i class="icon mdi-editor-mode-edit i-20"></i>' +
                            '                            </a>' +
                            '                            <a class="white-rounded popup-files"  href="' + item.url + '" title="ver">' +
                            '                                <i class="icon mdi-action-search i-20"></i>' +
                            '                            </a>' +
                            '                            <a onclick="deleteVideo(' + item.id + ')" class="white-rounded" title="eliminar">' +
                            '                                <i class="icon mdi-action-delete i-20"></i>' +
                            '                            </a>' +
                            '                        </figcaption>' +
                            '                    </figure>' +
                            '                </li>';

                        $("#sortable_video").append(html);
                        loadPopup();


                    } else{
                        showMessage('error', response.message);
                    }
                });
            } else{
                showMessage('error', 'Debes ingresar una URL de Youtube.');
            }
        });

        var elv = document.getElementById('sortable_video');
        sortablev = Sortable.create(elv, {
            onSort: function () {
                $.post(order_video_url, {data: sortablev.toArray(), _token: token_src}, function () {
                })
            }
        });
    }
});

function editVideo(id) {
    var names = ['description_video', 'video_id_gallery'];
    clearValues(names);

    $.get(get_video_url + '/' + id, {}, function (data) {
        $("#video_id_gallery").val(id);
        $("#description_video").val(data.info.description);
        $('#modal_video').modal('show');
    })
}

function saveVideo() {
    var data = $("#form_video").serialize();

    $.post(edit_video_url, data, function (response) {
        $.post(order_video_url, {data: sortablev.toArray(), _token: token_src}, function () {
            $('#modal_video').modal('hide');
        });
        showMessage('success', response.msj);
    });
}

function deleteVideo(id) {
    confirmModal({
        messageText: '¿Deseas eliminar este video?',
        alertType: "danger"
    }).done(function (e) {
        if(e) {
            $.ajax({
                url: delete_video_url + "/" + id,
                method: 'DELETE',
                data: {_token: token_src}
            }).done(function () {
                $("#video_" + id).remove();
                showMessage('success', 'Video eliminado');
            });
        }
    });
}