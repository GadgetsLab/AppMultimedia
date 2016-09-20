$(document).ready(function(){

    $('#type').change(function(){
        //console.log($('#type').val());
        var format = $('#type').val();
        functions.filter(format);
    });

});