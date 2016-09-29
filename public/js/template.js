$(document).ready(function() {
    $(".button-collapse").sideNav();
    $('.materialboxed').materialbox();
    $('select').material_select();
  	$('#textarea1').trigger('autoresize');
    $("#sub_archivo").click(function(event) {
  		event.preventDefault();
  		$("#file").trigger('click');
    });
});