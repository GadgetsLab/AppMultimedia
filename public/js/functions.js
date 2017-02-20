var route = "http://localhost:8080/AppMultimedia/public/";
//var types = [];

var functions = {

    filter: function(format) {
        j.ajax({
            url: route + 'admin/files/filter/' + format,
            type: 'GET',
            success: function (response) {
                if (response === '0') {
                    j('#files').html('');
                }
                else {
                    j('#files').html('');
                    //console.log(response[0]['title']);
                    //console.log(typeof(response));
                    for (var i in response) {
                        j('#files').append("<tr>" +
                            "<td>"+ response[i]['id'] +"</td> "+
                            "<td>"+ response[i]['title'] +"</td>"+
                            "<td>" + response[i]['description'] + "</td>" +
                            "<td>" + response[i]['type'] + "</td>" +
                            "<td><a href='" + route + "admin/files/" + response[i]['id'] + "' ><i class='material-icons tiny'>mode_edit</i></a></td>" +
                            "<td><a href='"+ route + "admin/files" + response[i]['id'] + "'><i class='material-icons tiny'>delete</i></a></td>" +
                            "</tr>");

                    }

                }
            }
        });
    },
    comment: function(data){
        j.ajax({
            url: route + 'comments',
            method: 'post',
            data: data
        }).done(function(response){
            console.log(response);
            if (response == '1') {
                //Materialize.toast('Comentario agregado correctamente', 5000, 'blue');
            }
        });
    },
    allcomments: function(id) {
        j.ajax({
            url: route + 'comments/' + id,
            method: 'get'
        }).done( function(response){
            j('#allComments').html('');
            var count = Object.keys(response).length;
            if (count > 0 ){
                for (var i in response) {
                    var comments =  "<li class='collection-item'><p>"+response[i]['comment']+"<a style='float: left;'>"+
                        "<span class='badge  light-blue ' style='color: #fff; position: relative;margin-left: 15px;'>" +
                        ""+ response[i]['names'] +" dice:</span></a></p></li>"
                    j('#allComments').append(comments);
                }
            } else {
                j('#allComments').html('<p>No hay comentarios actualmente</p>');
            }
        });
    },
    callshare: function(people){
        j.ajax({
            url: route + 'share',
            method: 'POST',
            data:people,
            success: function(response){
                if(response == '1') {
                    console.log('Todo Bien');
                }
            }
        });
    },
    open_modal: function(){
        j('#veil').css('display','block');
    },
    close_modal: function(){
        j('#veil').css('display','none');
    },
    checkNotifications: function(){
        j.ajax({
            url: route + 'newnotifications',
            method: 'GET',
            success: function (response) {
                if(response > 0){
                    j('#count').html(response);
                    j('#count').show();
                    j('.button-collapse').css('background', 'tomato');
                }
                else
                {
                    j('.button-collapse').css('background', 'transparent');
                    j('#count').hide();
                }

            }
        });
    },
    report_email: function(report){
        j.ajax({
            url: route + 'report',
            method: 'POST',
            data:report,
            success: function (response) {
                if (response === '1') {
                    //Materialize.toast('Su queja ha sido enviada', 3000, 'rounded');
                    j('#report').closeModal();
                }
                else {
                    j('#report').closeModal();
                    //Materialize.toast('Whoops, ha ocurrido un error', 3000, 'rounded','blue' );
                }
            }
        });
    },
    login: function(data){
        j.ajax({
            url: route + 'login',
            method: 'POST',
            data:data,
            success: function(response){
                if(response == '1') {
                    j(location).attr('href', route+'home');
                }
            }
        });
    },
    updateStatusNotification: function (id) {
        j.ajax({
            url: route + 'notification/update',
            method: 'POST',
            data: {'id': id}
        }).done( function (response){
            return true;
        })
    }
};