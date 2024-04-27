$(function () {
    if ($(".list_table").length) {
        var ctrl = (typeof control !== 'undefined') ? control : 'json-list';
        generateTable('datatable', ctrl);
    }

    if ($("#sortable_0").length > 0) {
        var el = document.getElementById('sortable_0');
        sortable = Sortable.create(el, {
            onSort: function () {
                $.post(url_order_category, {data: sortable.toArray(), _token: token_src}, function () {
                })
            },
        });
    }
    if ($(".date_from").length > 0) {
        $('.date_from').bootstrapMaterialDatePicker({
            time: false,
            clearButton: true,
            switchOnClick: true,
            cancelText: 'Cancelar',
            okText: 'Aceptar',
            nowText: 'Hoy',
            clearText: 'Limpiar',
            lang: 'es'
        }).on('change', function (e, date) {
            //   $('.date_until').bootstrapMaterialDatePicker('setMinDate', date);
        });
    }
    if ($(".date_until").length > 0) {
        $('.date_until').bootstrapMaterialDatePicker({
            time: false,
            clearButton: true,
            switchOnClick: true,
            cancelText: 'Cancelar',
            okText: 'Aceptar',
            nowText: 'Hoy',
            clearText: 'Limpiar',
            lang: 'es'
        });
    }

    $('.feature_image').change(function (event) {
        $(".btn_change").removeClass('hidden');
        $(".btn_delete").removeClass('hidden');
        $(".btn_select").addClass('hidden');

        $(".img_preview").data('load', true);
        $(".img_preview").attr('src', URL.createObjectURL(event.target.files[0]));
        $("#delimg").val(0);
    });

    $(".btn_delete").on('click', function () {
        $(".btn_change").addClass('hidden');
        $(".btn_delete").addClass('hidden');
        $(".btn_select").removeClass('hidden');
        $(".img_preview").attr('src', img_default);
        $("#delimg").val(1);
    });

    $('.config_image').change(function (event) {
        var parent = $(this).data('parent');

        $("." + parent + " .btn_change").removeClass('hidden');
        $("." + parent + " .btn_config_delete").removeClass('hidden');
        $("." + parent + " .btn_select").addClass('hidden');

        $("." + parent + " .img_preview").data('load', true);
        $("." + parent + " .img_preview").attr('src', URL.createObjectURL(event.target.files[0]));
        $("#delimg_" + parent).val(0);
    });

    $(".btn_config_delete").on('click', function () {
        var parent = $(this).data('parent');
        $("." + parent + " .btn_change").addClass('hidden');
        $("." + parent + " .btn_config_delete").addClass('hidden');
        $("." + parent + " .btn_select").removeClass('hidden');
        $("." + parent + " .img_preview").attr('src', img_default);
        $("#del_" + parent).val(1);
    });


    $('.seo_image').change(function (event) {
        $(".btn_seo_change").removeClass('hidden');
        $(".btn_seo_delete").removeClass('hidden');
        $(".btn_seo_select").addClass('hidden');

        $(".img_seo_preview").data('load', true);
        $(".img_seo_preview").attr('src', URL.createObjectURL(event.target.files[0]));
        $("#delimg_seo").val(0);
    });

    $(".btn_seo_delete").on('click', function () {
        $(".btn_seo_change").addClass('hidden');
        $(".btn_seo_delete").addClass('hidden');
        $(".btn_seo_select").removeClass('hidden');
        $(".img_seo_preview").attr('src', img_default);
        $("#delimg_seo").val(1);
    });


    $("form").keypress(function (e) {
        if (e.which == 13) {
            return false;
        }
    });

    if ($(".show_pass").length)
        showPass();

    if (typeof message !== 'undefined' && message !== '')
        showMessage(type_message, message);

    if ($("#ckeditor").length)
        CKEDITOR.replace('ckeditor');

    if ($("#map_canvas").length)
        loadLeafletMap(latitude, longitude);

    if ($('#full_screen').length)
        document.getElementById('full_screen').addEventListener('click', function () {
            toggleFullscreen();
        });

    if ($('.popup-gallery').length)
        loadPopup();
});

// ------------------------------------------------
//  Configs
// ------------------------------------------------
$("#change_password").on('change', function () {
    showPass();
});

function showPass() {
    if ($(".show_pass_check").is(':checked')) {
        $(".show_pass input").prop('disabled', false);
        $(".show_pass").show();
    }
    else {
        $(".show_pass").hide();
        $(".show_pass input").prop('disabled', true);
    }
}

function toggleFullscreen(elem) {
    elem = elem || document.documentElement;
    if (!document.fullscreenElement && !document.mozFullScreenElement &&
        !document.webkitFullscreenElement && !document.msFullscreenElement) {
        if (elem.requestFullscreen) {
            elem.requestFullscreen();
        } else if (elem.msRequestFullscreen) {
            elem.msRequestFullscreen();
        } else if (elem.mozRequestFullScreen) {
            elem.mozRequestFullScreen();
        } else if (elem.webkitRequestFullscreen) {
            elem.webkitRequestFullscreen(Element.ALLOW_KEYBOARD_INPUT);
        }
    } else {
        if (document.exitFullscreen) {
            document.exitFullscreen();
        } else if (document.msExitFullscreen) {
            document.msExitFullscreen();
        } else if (document.mozCancelFullScreen) {
            document.mozCancelFullScreen();
        } else if (document.webkitExitFullscreen) {
            document.webkitExitFullscreen();
        }
    }
}

// ------------------------------------------------
//  Utilities
// ------------------------------------------------
function showMessage(type, message) {
    toastr.options = {
        "closeButton": true,
        "debug": false,
        "newestOnTop": true,
        "progressBar": false,
        "positionClass": "toast-top-center",
        "preventDuplicates": false,
        "onclick": null,
        "showDuration": "300",
        "hideDuration": "1000",
        "timeOut": "5000",
        "extendedTimeOut": "1000",
        "showEasing": "swing",
        "hideEasing": "linear",
        "showMethod": "fadeIn",
        "hideMethod": "fadeOut"
    };
    switch (type) {
        case 'error':
            toastr.error(message);
            break;
        default:
            toastr.success(message);
    }
}

function clearValues(names) {
    names.forEach(function (name) {
        $('#' + name).val('');
    });
}

function openModalOrder(model) {
    $.get(url_get_model, {}, function (data) {
        $("#tbody_modal").html(data);
    });

    $("#order_modal").modal('show');
    $("#title_order_modal").html('Ordenar ' + title_order_model);
}


$('.list_item tbody').sortable({
    helper: fixWidthHelper,
    axis: 'y',
    stop: function (event, ui) {
        var data = $(this).sortable('toArray').toString();
        $.ajax({
            data: {_token: token_src, data: data},
            type: 'POST',
            url: url_order_model
        });
    }
}).disableSelection();

function fixWidthHelper(e, ui) {
    ui.children().each(function () {
        $(this).width($(this).width());
    });
    return ui;
}

// ------------------------------------------------
//  Datatables
// ------------------------------------------------
function generateTable(id_table, control) {
    var querystring = window.location.search.substring(1);
    $('#' + id_table).DataTable({
        sorting: [[0, "desc"]],
        paginationType: "full_numbers",
        scrollX: true,
        scrollY: true,
        scrollCollapse: !0,
        processing: true,
        serverSide: true,
        destroy: true,
        ajax: control + '/?' + querystring,
        "columnDefs": [{
            "targets": 0,
            "searchable": true
        }],
        columns: columns,
        oLanguage: {
            sSearch: "<span>Buscar:</span> ",
            sInfo: "Mostrando <span>_START_</span> a <span>_END_</span> de <span>_TOTAL_</span> Registros",
            sLengthMenu: "<span>Mostrando</span> _MENU_ <span>Registros</span>",
            sInfoEmpty: "Mostrando 0 a 0 de 0 Registros",
            sInfoFiltered: "(Filtrado de _MAX_ total)",
            sZeroRecords: "No hay Registros",
            oPaginate: {"sFirst": "&laquo;", "sPrevious": "&lsaquo;", "sNext": "&rsaquo;", "sLast": "&raquo;"},
            sProcessing: "Procesando..."
        }
    });
}

function deleteRow(id) {
    var delete_url = (typeof delete_ctrl !== 'undefined') ? delete_ctrl : 'delete';

    confirmModal({
        messageText: del_message,
        alertType: "danger"
    }).done(function (e) {
        if (e) {
            var nTr = $("#row_" + id)[0];
            var oTable = $('#datatable').dataTable();
            oTable.fnDeleteRow(nTr, function () {
                $.ajax({
                    url: delete_url + '/' + id,
                    method: 'DELETE',
                    data: {_token: token_src}
                }).done(function (data) {
                    var msj = 'Ha ocurrido un error';
                    var type = 'error';
                    if (data === '1') {
                        msj = 'Registro eliminado';
                        type = 'success';
                    }
                    showMessage(type, msj);
                });
            });
        }
    });
}

// ------------------------------------------------
//  Map
// ------------------------------------------------
function loadLeafletMap(latg, longg) {

    var container = L.DomUtil.get('map_canvas');
    if (container != null) {
        container._leaflet_id = null;
    }

    var mapl = L.map('map_canvas').setView([latg, longg], 12);

    L.tileLayer('http://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', {
        maxZoom: 18
    }).addTo(mapl);
    L.control.scale().addTo(mapl);

    var smallIcon = new L.Icon({
        iconSize: [27, 27],
        iconAnchor: [13, 27],
        popupAnchor: [1, -24],
        iconUrl: icon_map_url
    });

    var marker = L.marker([latg, longg], {draggable: true, icon: smallIcon}).addTo(mapl);
    marker.bindPopup("Punto donde se encuentra su negocio").openPopup();
    marker.on('dragend', onMarkerClick);
    mapl.on('click', onMapClick);

    function onMarkerClick(e) {
        var coord = e.target.getLatLng();
        $('#latitude_map').val(coord.lat);
        $('#longitude_map').val(coord.lng);
    }

    function onMapClick(e) {
        var coord = e.latlng;
        marker.setLatLng(coord);
        $('#latitude_map').val(coord.lat);
        $('#longitude_map').val(coord.lng);
    }
}
