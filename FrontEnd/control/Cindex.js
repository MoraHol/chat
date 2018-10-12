var text = document.getElementById("escribir");
var send = document.getElementById("button_send");
var flag = false;
send.addEventListener("click", enviar);
text.addEventListener("keyup", enviar);
var caja = document.getElementById("caja-chat");

function enviar(event) {
    if ((event.type == "click" || event.keyCode == 13) && text.value != "") {
        var mensa = document.getElementById("escribir").value;
        var ajax = new XMLHttpRequest();
        ajax.onreadystatechange = function () {
            if (this.readyState == 4 && this.status == 200) {
                caja.innerHTML = this.responseText;
            }
        };
        ajax.open("GET", "../../BackEnd/scripts/registerMessage.php?mensaje="+mensa, true);
        ajax.send();
        limpiar();
    }
}

function limpiar() {
    text.value = "";
}

function cargarMensajes() {
    var ajax = new XMLHttpRequest();
    ajax.onreadystatechange = function () {
        if (this.readyState == 4 && this.status == 200) {
            caja.innerHTML = this.responseText;
        }
    };
    ajax.open("GET", "../../BackEnd/scripts/showMessages.php", true);
    ajax.send();
}
setInterval(cargarMensajes, 1000);