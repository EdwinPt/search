$(document).ready(function(){
    
    /**
     * Consume api de github para obtener lista de repositorios
     * de acuerdo al parametro de busqueda de usuario
     */
    $("#form-send").submit(function(e){
        e.preventDefault();
        let url = window.location.href;
        let code_status = "";
        let text_status = "";

        $.ajax({
            url:  'https://api.github.com/search/repositories?',
            dataType: "jsonp",
            data: {
                q : $('#repo').val(),
                sort:"stars",
                order: "desc"
            },
            beforeSend: function(xhr){
                console.log("En proceso...");   
            },
            success: function(response, xhr, textStatus){
                if (response.data.total_count == 0) {
                    $(".result").css("display","none");
                    $(".not-found").text("No se encontraron resultados");
                }else{
                    $(".items tr").remove();
                    $(".not-found").text("");
                    $(".result").css("display","block");

                    let items = response.data.items;
                    let info = "";
                    let count = 0;
                    $.each(items, function(index, element){
                        let url = window.location.href;
                        count++;
                        info += "<tr>"
                        info += "<td>" + count + "</td>";
                        info += "<td>" + element.name + "</td>";
                        info += "<td><a class='url' href='https://api.github.com/repos/"+element.full_name+"/commits'>" + element.full_name + "</a></td>";
                        info += "</tr>";
                    });
                    $('.items').append(info);
                }
                code_status = textStatus.status;
                text_status = xhr;
            },
            error: function(jqXHR, textStatus){
                alert("Ocurrió un error inesperado, intente de nuevo por favor.");
                code_status = jqXHR.status;
                text_status = textStatus;               
            },
            complete: function(){
                $.ajax({
                    data:  {data: $('#repo').val(), code_status: code_status, text_status: text_status}, 
                    url:   url + 'commits/add', 
                    type:  'post', 
                    success:  function (response) {
                        console.log("Se agrego con exito el registro");
                    }
                });
            }          
        });      
    });

    /**
     * Mostrar vista de detalles de commits
     */
    $(document).on('click', ".url", function(e){
        e.preventDefault();
        let url = window.location.href;
        let url_commit = $(this).attr('href');
        redirectPost(url + 'commits/get_Url', {'url':url_commit});    
    });

    /**
     * Se crea form data para obtener detalles de commits
     */
    function redirectPost(url, data) {
        var form = document.createElement('form');
        document.body.appendChild(form);
        form.method = 'post';
        form.action = url;
        for (var name in data) {
            var input = document.createElement('input');
            input.type = 'hidden';
            input.name = name;
            input.value = data[name];
            form.appendChild(input);
        }
        form.submit();
    }
});