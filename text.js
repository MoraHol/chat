var text = document.getElementById("escribir");
var send = document.getElementById("button_send");

send.addEventListener("click", enviar);
text.addEventListener("keyup", enviar);
function enviar(event) {
  console.log(event);
  if (event.type == "click" || event.keyCode == 13) {
    var horaActual = new Date();
    var hora = document.createElement("span");
    hora.className = "hora";
    hora.innerHTML = horaActual.getHours() + ":" + horaActual.getMinutes();
    console.log(hora);
    console.log(horaActual.getHours());
    var texto = document.createElement("p");
    texto.className = "mensaje";
    texto.innerHTML = text.value;
    texto.appendChild(hora);
    document.body.appendChild(texto);
  }
}
