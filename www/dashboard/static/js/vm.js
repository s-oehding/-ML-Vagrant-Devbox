$(document).ready(function() {
 getAjaxProgressLoop('/vm/getMemoryUsage/', '#memoryUsage', 2500);
  getAjaxProgressLoop('/vm/getCpuStatus/', '#cpuUsage', 2500);
});


function getAjaxProgressLoop(controller, target, intervall){
  var refreshId = setInterval(function() {
    $.ajax({
      url: controller,
      cache: false,
      success: function(value) {
        var trimmed = value;
        if (trimmed <= 25) {
          status = "progress-bar-success"
        }else if (trimmed > 25 && trimmed <= 50) {
          status = "progress-bar-info"
        }else if (trimmed > 50 && trimmed <= 75) {
          status = "progress-bar-warning"
        }else if (trimmed > 75 && trimmed <= 100) {
          status = "progress-bar-danger"
        }
        $(target).addClass(status);
        $(target).css('width', trimmed+'%').attr("aria-valuenow",trimmed);
        $(target+' span').html(trimmed);
        }
    });
  }, intervall);
}
