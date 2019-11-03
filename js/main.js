document.getElementById('logout-button').addEventListener('click', logout);
console.log('a');

function logout() {
  console.log('a');
  var xhttp = new XMLHttpRequest();
  xhttp.onreadystatechange = function () {
    if (this.readyState == 4 && this.status == 200) {
      if (this.responseText == "") {
        window.location.href = 'index.html';
      }
    }
  };
  xhttp.open("POST", "php/logout.php", true);
  xhttp.send();
}