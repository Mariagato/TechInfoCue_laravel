'use strict'
$(function () {
    if ($("#sortable_0").length > 0) {
        var el = document.getElementById('sortable_0');
        sortable = Sortable.create(el, {
            onSort: function () {
                $.post(url_order_category, {data: sortable.toArray(), _token: token_src}, function () {
                })
            },
        });
    }
});

function saveCategory() {
    if ($("#name").val() !== "") {
        var data = $("#form-category").serialize();
        var id = $("#category_id").val();
        var parent = $("#parent_id").val();

        $.post(url_edit_category + '/' + id, data, function (data) {
            var level = data.level
            $(".close").trigger('click');
            selectCategory(parent, level);
            showMessage( 'success','Categoría guardada');
        })
    } else {
        showMessage( 'error','Ingresa el nombre de la categoría');
    }
}

function openCategory(id) {
    openDropzoneCategory(id);

    $.get(url_get_category + '/' + id, {}, function (item) {
        $("#name").val(item.info.name);
        $("#parent_id").val(item.parent);
        $("#category_id").val(item.id);
        $("#type").val(item.type);
        $("#level").val(item.level);
        $("#linkc").val(item.link);
        $("#hide_add").prop('checked', item.hide_add);
        $("#image_category").val(item.image);

        if (item.image !== "" && item.image != null) {
            $(".image-category").attr('src', url_upload + 's' + item.image);
        } else {
            $(".image-category").attr('src', img_default);
        }

        $("#category_modal").modal('show');
        $("#title_modal").html('Editar ' + (type_category === 'brand' ? 'marca' : 'categoría'));
        openDropzoneCategory();
    })

}

function newCategory(level, parent) {
    $("#name").val('');
    $("#parent_id").val(parent);
    $("#category_id").val(0);
    $("#type").val(type_category);
    $("#level").val(level);
    $("#category_modal").modal('show');
    $("#title_modal").html('Nueva ' + (type_category === 'brand' ? 'marca' : 'categoría'));
    $(".image-category").attr('src', img_default);

    openDropzoneCategory();
}

function openDropzoneCategory(id) {
    if ($('.dropzone-category').length && type_category === 'brand') {
        $(".dropzone-category").addClass('dropzone');
        $(".div-image").removeClass('hidden');

        if (typeof Dropzone === 'function') {
            if ($(".dz-default").length <= 0) {
                Dropzone.autoDiscover = false;
                var myDropzone = new Dropzone('.dropzone-category',
                    {
                        url: url_save_category_img,
                        dictDefaultMessage: '<small>Arrastra la imagen a la zona punteada o presiona clic para cargarla. <br>' + msj_tam_icon + '<br>Máx. 3MB</small> ',
                        parallelUploads: true,
                        maxFilesize: 3,
                        autoProcessQueue: true,
                        sending: function (file, xhr, formData) {
                            formData.append("type", type_category);
                            formData.append("_token", token_src);
                        },
                    });

                myDropzone.on("success", function (file, image) {
                    $(".max-size-error").hide();
                    $("#image_category").val(image.name);
                    $(".image-category").attr('src', image.file);

                    myDropzone.removeFile(file);
                });

                myDropzone.on("error", function (file) {
                    $(".max-size-error").show();
                    myDropzone.removeFile(file);
                });

            }
        }
    }
}

function deleteCategory(id, level, parent) {
    $('#delete_modal_msj').html('');
    confirmModal({
        messageText: '¿Deseas eliminar esta categoría? se eliminarán también las subcategorías.',
        alertType: "danger"
    }).done(function (e) {
        if(e) {
            $.ajax({
                url: url_delete_category + '/' + id,
                method: 'DELETE',
                data: {_token: token_src, type: type_category},
            }).done(function (data) {
                if (data.status === 'success') {
                    selectCategory(parent, level - 1);
                    showMessage('success', 'Categoría eliminanda');
                } else {
                    var msj = 'Primero debe asignar una nueva ' + title_type + ' a los siguientes ' + title_parent + ': ' + data.html;
                    $('#delete_modal_msj').html(msj);
                    $('#delete_modal').modal('show');
                }
            });
        }
    });
}

function selectCategory(id, level) {
    if (level < level_limit) {
        $("#cat_" + id).toggleClass('current').siblings().removeClass('current');

        var id_level = parseInt(level) + 1;
        $("#level").val(level);

        $.get(url_categories + '/' + id + '/' + type_category, {}, function (info) {
            var data = info.data;
            var total = info.total;
            var parent = info.parent;
            var html = '';

            if (parent != null) {

                $("#Cat_levels .area-scroll #container_" + id_level).nextAll().remove();
                $("#Cat_levels .area-scroll #container_" + id_level).remove();

                html += '<section class="area_category line-right2" id="container_' + id_level + '">';

                if (total > 0)
                    html += '<div class="head">\
                        <div class="row">\
                            <div class="col-sm-6">\
                                <div class="subtitle">' + parent.info.name + '<span class="line"></span></div>\
                            </div>\
                            <div class="col-sm-6 text-right">\
                                <div class="btn-add"><a onclick="newCategory(' + id_level + ',' + id + ')">Agregar </a></div>\
                            </div>\
                        </div>\
                    </div>\
                    <ul id="sortable_' + id_level + '">';

                else
                    html += '<div class="empty-alert">\
                        <div class="info">\
                            <div class="area">\
                                No hay categorías en: <strong>' + parent.info.name + '</strong>\
                                <a onclick="newCategory(' + id_level + ',' + id + ')" class="btn-add-cat">Agregar</a>\
                            </div>\
                         </div>\
                       </div>';

                html += fillLi(data);

                html += '</ul></section>';

                $("#Cat_levels .area-scroll").append(html)

            } else {
                if (total > 0) {
                    $("#area_main").html('<div class="head">\
                            <div class="row">\
                                <div class="col-sm-6">\
                                   <div class="title">' + (type_category === 'brand' ? 'Marcas' : 'Categorías') + '<span class="line"></span></div>\
                                </div>\
                                <div class="col-sm-6 text-right">\
                                    <div class="btn-add"><a onclick="newCategory(0,0)">Agregar </a></div>\
                                </div>\
                            </div>\
                         </div>\
                         <ul id="sortable_0"></ul>');

                    $("#sortable_0").html(fillLi(data));
                }
                else {
                    html = '<div class="empty-alert">\
                            <div class="info">\
                                <div class="area">\
                                    No hay categorías almacenadas\
                                    <a onclick="newCategory(0,0)" class="btn-add-cat">Agregar</a>\
                                </div>\
                            </div>\
                        </div>';

                    $("#area_main").html(html);
                }

                $(".area-scroll").empty();
            }

            if (total > 0) {
                var el = document.getElementById('sortable_' + id_level);

                sortable = Sortable.create(el, {
                    onSort: function () {
                        $.post(url_order_category, {data: sortable.toArray(), _token: token_src}, function () {
                        })
                    },
                });
            }
        })
    }
}

function fillLi(data) {
    var html = '';

    $.each(data, function (i, item) {
        html += '<li id="cat_' + item.id + '" data-id="' + item.id + '">\
                            <div class="options">\
                                <button class="btn-cate btn btn-primary" title="Editar" onclick="openCategory(' + item.id + ')"><i class="fa fa-pencil" aria-hidden="true"></i></button>\
                                ' + ((item.show_delete) ? '<button class="btn-cate btn btn-danger" title="Eliminar" onclick="deleteCategory(' + item.id + ',' + item.level + ',' + item.parent + ')"> <i class="fa fa-trash" aria-hidden="true"></i></button>' : '') + '\
                            </div>\
                            <div class="mask" onclick="selectCategory(' + item.id + ',' + item.level + ')"><a href="javascript:;">' + item.info.name + '</a></div>\
                        </li>';
    })

    return html;
}