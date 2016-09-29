$(document).ready(function() {
    functions.allcomments();
    $(".button-collapse").sideNav();
    $('.materialboxed').materialbox();
    $('select').material_select();
  	$('#textarea1').trigger('autoresize');
<<<<<<< HEAD
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
=======
    $('.modal-trigger').leanModal();
    $("#sub_archivo").click(function(event) {
  		event.preventDefault();
  		$("#file").trigger('click');
    });

    $('#type').val('0');
    $('#type').change(function(){
        //console.log($('#type').val());
        var format = $('#type').val();
        functions.filter(format);
    });

    $('#addComment').on('click', function () {
        var data = $('#formComment').serialize();
        functions.comment(data);
    })
});
>>>>>>> 6cc8f30fbca7b3e6ce554e897a862372a03d7f7a
