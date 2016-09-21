var route = "http://localhost:8080/AppMultimedia/public/";

var functions = {

    filter: function(format){
        //console.log(format);
        $.ajax({
            url: route + 'admin/files/filter/' + format,
            type:'GET',
            success: function(response){
                if(response === '0') {
                    console.log(response);
                }
                else{
                    $('#files').html('');
                    //console.log(response[0]['title']);
                    //console.log(typeof(response));
                     for(var i in response) {
                     $('#files').append("<li>" +
                         "<h3><a href='"+route+"admin/files/"+response[i]['id']+"'>"+response[i]['title']+"</a></h3>" +
                     "<p>Descripcion:"+ response[i]['description'] +"</p>" +
                     "<p>Tipo:"+ response[i]['type'] +"</p></li>");

                     }

                }
            }
        });
    },

};