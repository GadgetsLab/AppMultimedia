$(document).ready(function() {
    functions.allcomments();
    $(".button-collapse").sideNav();
    $('.materialboxed').materialbox();
    $('select').material_select();
  	$('#textarea1').trigger('autoresize');
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