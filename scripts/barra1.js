function canviPag(pag){
    var xmlhttp = new XMLHttpRequest();
    xmlhttp.onreadystatechange = function() {
        if(this.readyState == 4 && this.status == 200){
            document.getElementById("base").innerHTML = this.responseText;
        }
    };
    xmlhttp.open("GET", "./index.php?p=" + pag, true);
    xmlhttp.send();
}

function canviPagId(pag, id){
    var xmlhttp = new XMLHttpRequest();
    xmlhttp.onreadystatechange = function() {
        if(this.readyState == 4 && this.status == 200){
            document.getElementById("base").innerHTML = this.responseText;
        }
    };
    xmlhttp.open("GET", "./index.php?p=" + pag + "&id=" + id, true);
    xmlhttp.send();
}

function signup(){
    var xmlhttp = new XMLHttpRequest();
    xmlhttp.onreadystatechange = function() {
        if(this.readyState == 4 && this.status == 200){
            document.getElementById("base").innerHTML = this.responseText;
        }
    };
    xmlhttp.open("GET", "./vistes/destacats.php", true);
    xmlhttp.send();
}




function logout(){
    var xmlhttp = new XMLHttpRequest();
    xmlhttp.onreadystatechange = function() {
        if(this.readyState == 4 && this.status == 200){
            document.getElementById("navegador").innerHTML = this.responseText;
        }
    };
    xmlhttp.open("GET", "./resources/logout.php", true);
    xmlhttp.send();

    var xmlhttp = new XMLHttpRequest();
    xmlhttp.onreadystatechange = function() {
        if(this.readyState == 4 && this.status == 200){
            document.getElementById("base").innerHTML = this.responseText;
        }
    };
    xmlhttp.open("GET", "./index.php?p=" + '21', true);
    xmlhttp.send();
}

/* semblant a la funció signup pero amb jQuery (S'ha de provar encara)
$(document).ready(function(){
    $.ajax({url: "./vistes/destacats.php", successs: function(result){
        $(".base").html(result);
        }})
})
*/