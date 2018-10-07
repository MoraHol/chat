var text = document.getElementById("escribir");
var send = document.getElementById("button_send");
var flag = false;
send.addEventListener("click", enviar);
text.addEventListener("keyup", enviar);
var caja = document.getElementById("caja-chat");

function enviar(event) {
    if ((event.type == "click" || event.keyCode == 13) && text.value != "") {
        var mensa = $("#escribir").val();
        $.post("../../backend/blockchain/test.php", {
            mensaje: mensa
        });
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
    //ajax.open("GET", "../../backend/consulta_chat.php", true);
    ajax.open("GET", "../../backend/blockchain/test2.php", true);
    ajax.send();
}
setInterval(cargarMensajes, 1000);