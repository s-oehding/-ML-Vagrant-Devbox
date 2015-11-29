$(document).ready(function () {
    getMemoryLoad(1000);
    getCpuLoad(1000);
});


function getMemoryLoad(intervall) {
    var refreshIdMemory = setInterval(function () {
        $.ajax({
            url: '/vm/getMemoryUsage/',
            cache: false,
            success: function (value) {
                render_progressbar(value, '#memory-load');
            }
        });
    }, intervall);
}

function getCpuLoad(intervall) {
    var refreshIdCpu = setInterval(function () {
        $.ajax({
            dataType: "json",
            url: '/vm/getCpuLoad/',
            cache: false,
            success: function (data) {
                render_progressbar(data['user'], '#cpu-load-user');
                render_progressbar(data['nice'], '#cpu-load-nice');
                render_progressbar(data['sys'], '#cpu-load-sys');
                render_progressbar(data['idle'], '#cpu-load-idle');
            }
        });
    }, intervall);
}


function render_progressbar(value, target) {
    var trimmed = value;
    if (target != '#cpu-load-idle') {
        if (trimmed <= 25) {
            status = "progress-bar-success"
        } else if (trimmed > 25 && trimmed <= 50) {
            status = "progress-bar-info"
        } else if (trimmed > 50 && trimmed <= 75) {
            status = "progress-bar-warning"
        } else if (trimmed > 75 && trimmed <= 100) {
            status = "progress-bar-danger"
        }
        $(target).addClass(status);
    }

    $(target).css('width', trimmed + '%').attr("aria-valuenow", trimmed);
    $(target + ' span').html(trimmed + ' %');
}
