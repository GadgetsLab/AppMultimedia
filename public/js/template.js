$(document).ready(function() {
    functions.allcomments();
    functions.checkNotifications();
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

    //j('#type').val('0');

    j('#type').change(function(){
        //console.log(j('#type').val());
        var format = j('#type').val();
        functions.filter(format);
    });
    j('#addComment').on('click', function () {
        var data = j('#formComment').serialize();
        functions.comment(data);
    })
});
var j = jQuery.noConflict(true);
//j('.select-chosen').chosen();

// Compartir

j('#sh').on('click', function(){
    var people = j('#compartir').serialize();
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


j('#send-report').on('click', function() {
    var report = j('#options-report').serialize();
    //console.log(typeof(report));
    functions.report_email(report);
});

j('#postLogin').on('click', function(e){
    e.preventDefault();
    var data = j('#formLogin').serialize();
    console.log(data);
    functions.login(data);
});

