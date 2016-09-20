$(document).ready(function(){
    $('#type').val('0');
    $('#type').change(function(){
        //console.log($('#type').val());
        var format = $('#type').val();
        functions.filter(format);
    });

});