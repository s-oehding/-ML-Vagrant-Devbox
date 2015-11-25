


$('a.trigger').click(function (event) {
    extension = $(this).attr('name'); 
    $.ajax({
        type:"POST",
        url:"server/getExtensionFunctions/"+extension,
        data:{'dataString':extension},
        success:function (data) {
            // console.log(data);
            var parsedData = $.parseJSON(data);
            var i = 1;
            $('.modal-header').empty();
            $('.modal-header').append("<h4 class='modal-title'>"+extension+" functions</h4> ");
            $('.modal-body').empty();
            $('.modal-body').append("<table id='functions' class='table table-responsive table-striped table-hover'>" );
            jQuery.each(parsedData, function(index, value){
                $('#functions').append("<tr><td>"+i+"</td><td>"+value+"</td></tr>");
                i++
            });
            $('.modal-body').append("</table>");

            $('#myModal').modal('show');
        }
    });
    event.preventDefault();
});



// $('a.ajaxtrigger').click(function (event) {
//     $('.spinner').fadeIn('slow');
//     controllerName = $(this).attr('name'); 
//     $.ajax({
//         type:"GET",
//         url:"controller/"+controllerName,
//         success:function (data) {
//             $('#page-cotent-wrapper').html(data).fadeIn('slow');
//             $('.spinner').fadeOut('slow');
//         }
//     });
//     event.preventDefault();
// });