var send = document.getElementById("send");
var response = document.getElementById("response");
send.addEventListener("click", sendRegister);

function sendRegister() {
    var userName = document.getElementById("username").value;
    var email = document.getElementById("email").value;
    var pass = document.getElementById("pass").value;
    var repeatPass = document.getElementById("repeat-pass").value;
    var url = "?userName=" + userName + "&email=" + email + "&pass=" + pass + "&repeatPass=" + repeatPass;
    var ajax = new XMLHttpRequest();
    ajax.onreadystatechange = function () {
        if (this.readyState == 4 && this.status == 200) {
            response.innerHTML = this.responseText;
        }
    };
    ajax.open("GET", "../../BackEnd/scripts/register.php" + url, true);
    ajax.send();
}