$(document).ready(function() {
    $(".button-collapse").sideNav();
    $('.materialboxed').materialbox();
    $('select').material_select();
  	$('#textarea1').trigger('autoresize');
   	$(".select_archivo").change(function() {
    	if (!$('.select_archivo:checked')){
    		$("#toggle_file").fadeOut();
    		$("#edit_file").attr('enctype', '');
       	}else{
    		$("#toggle_file").fadeIn();
    		$("#edit_file").attr('enctype', 'multipart/form-data');
    	}
  	});
});
