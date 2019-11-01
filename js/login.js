function login(name, password) {
  var xhttp = new XMLHttpRequest();
  xhttp.onreadystatechange = function () {
    if (this.readyState == 4 && this.status == 200) {

      if (this.responseText == "") {
        window.location.href = 'main.php';
      } else {
        document.getElementById("result").innerHTML = this.responseText;
      }

    }
  };
  xhttp.open("POST", "php/login.php?n=" + name + "&p=" + password, true);
  xhttp.send();
}


document.getElementById('submitL').addEventListener('submit', function () {
  var name = document.getElementById('nameL').value;
  var password = document.getElementById('passwordL').value;
  login(name, password);
  event.preventDefault();
});