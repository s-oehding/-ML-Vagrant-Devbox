jQuery(document).ready(function($) {

  // site preloader -- also uncomment the div in the header and the css style for #preloader
  $(window).load(function(){
  	$('#preloader').fadeOut('slow');
  });
  $('a.ajaxtrigger').click(function (event) {
      $('#preloader').fadeIn('fast');
  });

});
