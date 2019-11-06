window.addEventListener('load', function () {
  //load bugs
  var xhttp = new XMLHttpRequest();
  xhttp.onreadystatechange = function () {
    if (this.readyState == 4 && this.status == 200) {

      if (this.responseText == "") {

      } else {
        console.log(JSON.parse(this.response));
      }
    }
  };
  xhttp.open("POST", "php/select-bugs.php", true);
  xhttp.send();
});


document.getElementById('new-bug-form').addEventListener('submit', function () {
  var bugTitle = document.getElementById('bug-title').value;
  var bugDesc = document.getElementById('bug-desc').value;
  var projectId = 1; //PLACEHOLDER////////////////////////////////////////
  console.log(bugTitle, bugDesc, projectId);
  submitNewBug(bugTitle, bugDesc, projectId);
  event.preventDefault();
});

function submitNewBug(bugTitle, bugDesc, projectId) {
  var xhttp = new XMLHttpRequest();
  xhttp.onreadystatechange = function () {
    if (this.readyState == 4 && this.status == 200) {

      if (this.responseText == "") {
        window.location.href = 'bugs.php';
      } else {
        document.getElementById("result").innerHTML = this.responseText;
      }

    }
  };
  xhttp.open("POST", "php/submit-bug.php?bugTitle=" + bugTitle + "&bugDesc=" + bugDesc + "&projectId=" + projectId, true);
  xhttp.send();
}