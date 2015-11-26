


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

jQuery(document).ready(function($) {

  // site preloader -- also uncomment the div in the header and the css style for #preloader
  $(window).load(function(){
  	$('#preloader').fadeOut('slow');
  });
  $('a.ajaxtrigger').click(function (event) {
      $('#preloader').fadeIn('fast');
  });

});

// Pagination
jQuery(function($) {
    // Grab whatever we need to paginate
    var pageParts = $(".paginate");

    // How many parts do we have?
    var numPages = pageParts.length;
    // How many parts do we want per page?
    var perPage = 10;

    // When the document loads we're on page 1
    // So to start with... hide everything else
    pageParts.slice(perPage).hide();
    // Apply simplePagination to our placeholder
    $("#page-nav").pagination({
        items: numPages,
        itemsOnPage: perPage,
        cssStyle: "pagination",
        // We implement the actual pagination
        //   in this next function. It runs on
        //   the event that a user changes page
        onPageClick: function(pageNum) {
            // Which page parts do we show?
            var start = perPage * (pageNum - 1);
            var end = start + perPage;

            // First hide all page parts
            // Then show those just for our page
            pageParts.hide().slice(start, end).show();
            // $('#page-nav ul').addClass('pagination');
        }
    });

});

// $(function() {
//     $('.pagination').pagination({
//         items: 100,
//         itemsOnPage: 10
//     });
// });

// $('a.ajaxtrigger').click(function (event) {
//     $('#preloader').fadeIn('slow');
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
