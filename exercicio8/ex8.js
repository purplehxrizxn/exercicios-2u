var btn = document.getElementById("btn");

btn.addEventListener("click", function() {
    
    var ajax = new XMLHttpRequest();

    ajax.open("GET", "ex8.json");
    
    ajax.responseType = "json";
    
    ajax.send(null);
    
    ajax.addEventListener("readystatechange", function () {
    
        if(ajax.readyState === 4 && ajax.status === 200){
    
            let response = ajax.response["items"];
            var list = document.querySelector(".list");
    
            for(var i = 0; i < response.length; i++){
                list.innerHTML += "<div>"+"id: "+response[i]['id']+"<br>"+"titulo: "+response[i]['titulo']+"<br>"+"subtitulo: "+response[i]['subtitulo']+"<br>"+"username: "+response[i]['username']+"<br><br>"+"</div>";
            };
        };
    });
    btn.disabled = true;
});