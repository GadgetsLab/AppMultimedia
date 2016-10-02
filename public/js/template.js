$(document).ready(function() {
    functions.allcomments();

    j(".button-collapse").sideNav();
    j('.materialboxed').materialbox();
    j('.select-materialize').material_select();
    j('#textarea1').trigger('autoresize');
    j(".select_archivo").change(function() {
    	if (!j('.select_archivo:checked')){
    		j("#toggle_file").fadeOut();
    		j("#edit_file").attr('enctype', '');
       	}else{
    		j("#toggle_file").fadeIn();
    		j("#edit_file").attr('enctype', 'multipart/form-data');
    	}
  	});
    j('.modal-trigger').leanModal();

    j("#sub_archivo").click(function(event) {
  		event.preventDefault();
  		j("#file").trigger('click');
    });
    j('#type').val('0');

    j('#type').change(function(){
        //console.log($('#type').val());
        var format = j('#type').val();
        functions.filter(format);
    });
    j('#addComment').on('click', function () {
        var data = j('#formComment').serialize();
        functions.comment(data);
    })
    j('.modal-trigger').leanModal();
});
var j = jQuery.noConflict(true);
//j('.select-chosen').chosen();

// Compartir

j('#sh').on('click', function(){
    var people = j('#compartir').serialize();
   console.log(people);
    console.log(j('#people-share').val());
   if(j('#people-share').val() != null) {
        functions.callshare(people);
    }
    else{
        j('.error').css('display','block');
    }

});

j('.modal-click').on('click', function() {
    functions.open_modal();
    j('.select-chosen').chosen({
        width: '90%'
    });
});

j('#close-modal').on('click', function(){
    functions.close_modal();
});

