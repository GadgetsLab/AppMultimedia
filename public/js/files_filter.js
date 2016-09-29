$(document).ready(function(){
    $('#type').val('0');
    $('#type').change(function(){
        //console.log($('#type').val());
        var format = $('#type').val();
        functions.filter(format);
    });
    $('.modal-trigger').leanModal();
    $('.select-users').chosen({disable_search_threshold: 10});


});

