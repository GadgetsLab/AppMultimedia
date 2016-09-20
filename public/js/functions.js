var route = "http://localhost:8080/AppMultimedia/public/";

var functions = {

    filter: function(format){
        //console.log(format);
        var formats = {1:'video', 2:'image', 3:'document'};
        var limit;
        switch (formats[format]){
            case 'video':
                limit = 1;
            break;
            case 'image':
                limit = 4;
            break;
            case 'document':
                limit = 10;
            break;
            default:
                console.log('Algo salio mal');
        }
        $.ajax({
            url: route + 'admin/files/filter/' + format + '/'+ limit,
            type:'GET',
            data:{},
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
                     "<p>Tipo:"+ formats[format] +"</p></li>");

                     }

                }
            }
        });
    },

};