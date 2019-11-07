//Loads bugs from DB
window.addEventListener("load", function () {
  var xhttp = new XMLHttpRequest();
  xhttp.onreadystatechange = function () {
    if (this.readyState == 4 && this.status == 200) {
      if (this.responseText == "") {} else {
        var bugsJson = JSON.parse(this.response);
        loadBugs(bugsJson);
      }
    }
  };
  xhttp.open("POST", "php/select-bugs.php", true);
  xhttp.send();
});

function loadBugs(bugsJson) {
  for (var len in bugsJson) {
    var id = "bugsJson." + len + ".id";
    var title = "bugsJson." + len + ".title";
    var desc = "bugsJson." + len + ".desc";
    var status = "bugsJson." + len + ".status";

    var bugList = "";

    //Determines in which list each bug goes
    switch (eval(status)) {
      case "0":
        bugList = "bug-list-open";
        break;
      case "1":
        bugList = "bug-list-in-progress";
        break;
      case "2":
        bugList = "bug-list-tested";
        break;
      case "3":
        bugList = "bug-list-reopen";
        break;
      case "4":
        bugList = "bug-list-closed";
        break;
    }

    //Creates cards for bugs
    createCard(id, title, desc, bugList, bugsJson);
  }
}

//Creates cards for bugs
function createCard(id, title, desc, bugList, bugsJson) {
  var card = document.createElement("div");
  card.setAttribute("class", "card h-25 mb-1");
  card.setAttribute("id", eval(id));
  document.getElementById(bugList).appendChild(card);

  var cardBody = document.createElement("div");
  cardBody.setAttribute("class", "card-body");
  card.appendChild(cardBody);

  var cardTitle = document.createElement("h5");
  cardTitle.setAttribute("class", "card-title");
  cardTitle.innerHTML = eval(title);
  cardBody.appendChild(cardTitle);

  var cardText = document.createElement("p");
  cardText.setAttribute("class", "card-text m-0");
  cardText.innerHTML = eval(desc);
  cardBody.appendChild(cardText);

  var cardButtonDelete = document.createElement("button");
  cardButtonDelete.setAttribute(
    "class",
    "btn btn-primary-outline float-right p-0"
  );
  cardButtonDelete.innerHTML = "X";
  cardTitle.appendChild(cardButtonDelete);

  var cardButtonAlter = document.createElement("button");
  cardButtonAlter.setAttribute(
    "class",
    "btn btn-primary-outline float-right p-0"
  );
  cardButtonAlter.innerHTML = "...";
  cardBody.appendChild(cardButtonAlter);
}



//Inserts new bug in DB
document.getElementById("new-bug-form").addEventListener("submit", function () {
  var bugTitle = document.getElementById("bug-title").value;
  var bugDesc = document.getElementById("bug-desc").value;
  var projectId = 1; //PLACEHOLDER////////////////////////////////////////
  submitNewBug(bugTitle, bugDesc, projectId);
  event.preventDefault();
});

function submitNewBug(bugTitle, bugDesc, projectId) {
  var xhttp = new XMLHttpRequest();
  xhttp.onreadystatechange = function () {
    if (this.readyState == 4 && this.status == 200) {
      if (this.responseText == "") {
        window.location.href = "bugs.php";
      } else {
        document.getElementById("result").innerHTML = this.responseText;
      }
    }
  };
  xhttp.open(
    "POST",
    "php/submit-bug.php?bugTitle=" +
    bugTitle +
    "&bugDesc=" +
    bugDesc +
    "&projectId=" +
    projectId,
    true
  );
  xhttp.send();
}