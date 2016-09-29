var route = "http://localhost:8080/AppMultimedia/public/";

var functions = {

    filter: function(format) {
        //console.log(format);
        $.ajax({
            url: route + 'admin/files/filter/' + format,
            type: 'GET',
            success: function (response) {
                if (response === '0') {
                    console.log(response);
                }
                else {
                    $('#files').html('');
                    //console.log(response[0]['title']);
                    //console.log(typeof(response));
                    for (var i in response) {
                        $('#files').append("<li>" +
                            "<h3><a href='" + route + "admin/files/" + response[i]['id'] + "'>" + response[i]['title'] + "</a></h3>" +
                            "<p>Descripcion:" + response[i]['description'] + "</p>" +
                            "<p>Tipo:" + response[i]['type'] + "</p></li>");

                    }

                }
            }
        });
    },
    comment: function(data){
        $.ajax({
            url: route + 'comments',
            method: 'post',
            data: data
        }).done(function(response){
            console.log(response);
            if (response == '1') {
                Materialize.toast('Comentario agregado correctamente', 5000, 'blue');
                functions.allcomments();

            }
        });
    },
    allcomments: function() {
        $.ajax({
            url: route + 'comments',
            method: 'get'
        }).done( function(response){
            $('#allComments').html('');
            var count = Object.keys(response).length;
            if (count > 0 ){
                for (var i in response) {
                    var comments =  "<li class='collection-item'><p>"+response[i]['comment']+"<a href="+route+"/admin/users/"+response[i]['id']+">"+
                        "<span class='badge  light-blue ' style='color: #fff; position: relative;margin-left: 15px;'>" +
                        ""+ response[i]['names'] +"</span></a></p></li>"
                    $('#allComments').append(comments);
                }
            } else {
                $('#allComments').html('<p>No hay comentarios actualmente</p>');
            }
        });
    }
};