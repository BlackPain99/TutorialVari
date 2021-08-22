// come inviare richieste client al server tramite HttpXMLRequest
// adesso le risposte sono in formato JSON

$("#list").click(function(){
    $(".spinner-border").slideToggle();

    $.ajax({
        type: "GET",
        // pagina a cui fare la richiesta
        url: "../serverPHP/index.php",
        // tutti i parametri dopo il ?
        // "request-users&param2-value2"
        data: "request-users",
        dataType: "html",
        success: function(data){
            var json = JSON.parse(data);
            
            for (let i = 0; i < json.length; i++) {
                createLine(json[i]); 
            }

            $(".spinner-border").slideToggle();

        }, 
        error: function(){
            alert("Impossibile contattare il server...")
        }

    })
})

function createLine(json){
$("#users").append("<tr><td>" + json.id + "</td><td>" + json.nome + "</td><td>" + json.cognome + "</td></tr>");
}

$("#save").click(function(){
    $(".spinner-border").slideToggle();

    $.ajax({
        type: "POST",
        // pagina a cui fare la richiesta
        url: "../serverPHP/post.php",
        // tutti i parametri dopo il ?
        // "request-users&param2-value2"
        data: "request-newproduct&name=" + $("#name").val() + "&price=" + $("#price").val() + "&descr=" + $("#descr").val(),
        dataType: "html",
        success: function(data){
            var json = JSON.parse(data);
            
            if (json[0] == "OK") {
                $("#alert").html("<div class=\"alert alert-success\">Prodotto salvato!</div>");
            } else {
                alert("Errore: " + json[1]);
                
            }

            $(".spinner-border").slideToggle();

        }, 
        error: function(){
            alert("Impossibile contattare il server...")
        }

    })

})