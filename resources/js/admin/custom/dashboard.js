$(function () {
    if ($("#traffic_table").length > 0) {

        loadChart();
    }
});

function loadChart() {
    var date_start = $("#date_start").val();
    var date_end = $("#date_end").val();

    $(".btn-load").prop('disabled', true);
    $(".btn-load").html('<i class="fa fa-spinner" aria-hidden="true"></i> Cargando estadísticas...');

    $.get('/cms/dashboard/visits', {date_start: date_start, date_end: date_end}, function (info) {
        var fechai = date_start.split("-");
        Highcharts.chart('stats', {
            title: {
                text: 'Visitas al sitio por día'
            },
            xAxis: {
                type: 'datetime',
                title: {
                    text: 'Días'
                }
            },
            yAxis: {
                allowDecimals: false,
                title: {
                    text: 'Visitas'
                }
            },
            subtitle: {
                text: 'Fuente: Google Analytics'
            },
            legend: {
                enabled: false
            },
            series: [{
                name: info.name,
                data: info.data
            }],
            tooltip: {
                formatter: function () {
                    return '<b>' + Highcharts.dateFormat('%e %b %Y', this.x) + '</b><br/>' +
                        this.y + ' Visitas';
                }
            },
            plotOptions: {
                line: {
                    cursor: 'pointer',
                    pointInterval: 24 * 60 * 60 * 1000,
                    pointStart: Date.UTC(fechai[0], fechai[1] - 1, fechai[2], 0, 0, 0)

                }
            },
        });
    });
    $.get('/cms/dashboard/graph', {date_start: date_start, date_end: date_end, type: 1}, function (data) {
        $(".tables").removeClass('hidden');
        $("#traffic_table").html(data);
    });

    $.get('/cms/dashboard/graph', {date_start: date_start, date_end: date_end, type: 2}, function (data) {
        $("#country_table").html(data);
    });

    $.get('/cms/dashboard/general', {date_start: date_start, date_end: date_end}, function (data) {
        $(".statistic-big").removeClass('hidden');
        $('#visits').html(data.visits);
        $('#rebound').html(data.rebound);
        $('#time').html(data.time);

        $(".btn-load").prop('disabled', false);
        $(".btn-load").html('<i class="fa fa-line-chart" aria-hidden="true"></i> Cargar Estadísticas');
    })
}
