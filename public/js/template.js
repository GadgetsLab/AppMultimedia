$(document).ready(function() {

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
        functions.comment(data)
        var id = j('#file_id').val();
        functions.allcomments(id);
        j("#comment").closeModal();
    })
});
var j = jQuery.noConflict(true);
//j('.select-chosen').chosen();

// Compartir

j('#sh').on('click', function(){
    var people = j('#compartir').serialize();
    var input = j('#compartir input:checkbox').length;
    if (input > 0) {
        functions.callshare(people);
    }else{
        j('.error').css('display', 'block');
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
j(".notification_link").on('click', function (e) {
    e.preventDefault()
    var id = j(this).attr('data_id');
    functions.updateStatusNotification(id)
    console.log('entro');
    window.location = j(this)[0].href;
})  
