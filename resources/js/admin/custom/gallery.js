'use strict';
var sortable;
Dropzone.autoDiscover = false;

$(function () {
    if ($('.dropzone_gallery').length) {
        if (typeof Dropzone === 'function') {
            var myDropzone = new Dropzone('.dropzone_gallery',
                {
                    url: url_gallery + '/' + gallery_id,
                    dictDefaultMessage: 'Arrastra las imágenes a la zona punteada o presiona clic para cargarlas<br/><strong>Tamaño recomendado de ' + tam_gallery + ' y un formato .jpg, .png o .gif. Máx. 3MB</strong><br>Puedes ordenar las imagenes cargadas haciendo clic sostenido sobre una de ellas y desplazándola hacía los lados.',
                    parallelUploads: true,
                    maxFilesize: 3,
                    autoProcessQueue: true,
                    sending: function (file, xhr, formData) {
                        var type_gallery = typeof  type_gallery !== 'undefined' ? type_gallery : 'general';
                        formData.append("_token", token_src);
                        formData.append("type", type_gallery);
                    },
                });

            myDropzone.on("success", function (file, response) {
                var item = response.data;
                $("#gallery_id").val(response.gallery_id);
                myDropzone.options.url = url_gallery + '/' + response.gallery_id;
                var html = '<li id="image_' + item.id + '" data-id="' + item.id + '">' +
                    '                    <figure class="imghvr-fade"><img src="' + upload_url + '/gallery/s' + item.filename + '"' +
                    '                                                     class="img-responsive" width="180" height="120">' +
                    '                        <figcaption>' +
                    '                            <a class="white-rounded" onclick="editImgGallery(' + item.id + ')" title="editar">' +
                    '                                <i class="icon mdi-editor-mode-edit i-20"></i>' +
                    '                            </a>' +
                    '                            <a class="white-rounded popup-gallery"  href="' + upload_url + '/gallery/b' + item.filename + '" title="ver">' +
                    '                                <i class="icon mdi-action-search i-20"></i>' +
                    '                            </a>' +
                    '                            <a onclick="deleteImgGallery(' + item.id + ')" class="white-rounded" title="eliminar">' +
                    '                                <i class="icon mdi-action-delete i-20"></i>' +
                    '                            </a>' +
                    '                        </figcaption>' +
                    '                    </figure>' +
                    '                </li>';
                $("#sortable_image").append(html);
                myDropzone.removeFile(file);
                loadPopup();
            });

            loadPopup();

            var el = document.getElementById('sortable_image');
            sortable = Sortable.create(el, {
                onSort: function () {
                    $.post(order_url, {data: sortable.toArray(), _token: token_src}, function () {
                    })
                }
            });
        }
    }
});

function editImgGallery(id) {
    var names = ['description_gallery', 'image_id_gallery'];
    clearValues(names);

    $.get(get_img_url + '/' + id, {}, function (data) {
        $("#image_id_gallery").val(id);
        $("#description_gallery").val(data.info.description);
        $('#modal_gallery').modal('show');
    })
}

function saveImgGallery() {
    var data = $("#form_img_gallery").serialize();

    $.post(edit_img_url, data, function (response) {
        $.post(order_url, {data: sortable.toArray(), _token: token_src}, function () {
            $('#modal_gallery').modal('hide');
        });
        showMessage('success', response.msj);
    })
}

function deleteImgGallery(id) {
    confirmModal({
        messageText: '¿Deseas eliminar esta imagen?',
        alertType: "danger"
    }).done(function (e) {
        if (e) {
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

function loadPopup() {
    $('.popup-gallery').magnificPopup({
        type: 'image',
        tLoading: 'Cargando imagen...',
        mainClass: 'mfp-fade',
        gallery: {
            enabled: true,
            navigateByImgClick: true,
            preload: [0, 1]
        },
        image: {
            tError: '<a href="%url%">La imagen</a> no pudo ser cargada.',
            titleSrc: function (item) {
                return '<small>by Rhiss.net</small>';
            }
        }
    });

    if ($(".popup-video").length > 0) {
        $('.popup-video').magnificPopup({
            type: 'image',
            tLoading: 'Cargando imagen...',
            mainClass: 'mfp-fade',
            gallery: {
                enabled: true,
                navigateByImgClick: true,
                preload: [0, 1]
            },
            image: {
                tError: '<a href="%url%">La imagen</a> no pudo ser cargada.',
                titleSrc: function (item) {
                    return '<small>by Rhiss.net</small>';
                }
            }
        });
    }

    if ($(".popup-files").length > 0) {
        $('.popup-files').magnificPopup({
            type: 'iframe',
            tLoading: 'Cargando archivo...',
            mainClass: 'mfp-fade',
            gallery: {
                enabled: true,
                navigateByImgClick: true,
                preload: [0, 1]
            },
            iframe: {
                markup: '<div class="mfp-iframe-scaler">' +
                '<div class="mfp-close"></div>' +
                '<iframe class="mfp-iframe" frameborder="0" allowfullscreen></iframe>' +
                '</div>',
                patterns: {
                    youtube: {
                        index: 'youtube.com/',
                        id: 'v=',
                        src: '//www.youtube.com/embed/%id%?autoplay=1'
                    },
                    vimeo: {
                        index: 'vimeo.com/',
                        id: '/',
                        src: '//player.vimeo.com/video/%id%?autoplay=1'
                    },
                    gmaps: {
                        index: '//maps.google.',
                        src: '%id%&output=embed'
                    }
                },
                srcAction: 'iframe_src',
            }
        });
    }
}

