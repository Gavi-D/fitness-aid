var pass = "";
var encryptedPassword = "";

function addDigitToPassword(digitInput){
    pass += digitInput;
    if (document.getElementById("see").checked == true) {
      document.getElementById("password").value += digitInput;
    }
    else {
      document.getElementById("password").value += "*";
  }
}

function clearPassword() {
    document.getElementById("password").value = "";
}

function submitInfo() {
    var email = document.getElementById("email").value;
    var info = email + " " + pass;
    //console.log("Full Info:" + info);

    var myXMLRequest = new XMLHttpRequest();
    myXMLRequest.onload = displayPHPResult;
    myXMLRequest.open("POST","assignment11LogIn.php?info="+info, true);
    myXMLRequest.send();
}

function displayPHPResult() {
    var data = this.responseText;
    if(data != "invalid"){
        var newLocation = "#welcomePage";
        window.location = newLocation;
    }
    //if user was not in Mysql database, send an alert info was not recognized
    else{
        alert("Sorry the information you entered is not a recognized user");
    }
}

//sends a request to php to add user info to the membership database
function addUser() {
    var firstName = document.getElementById("firstName").value;
    var lastName = document.getElementById("lastName").value;
    var email = document.getElementById("newEmail").value;
    var password = document.getElementById("newUserPassword").value;

    //adds all info into one string to send to php
    //places space between info to make substrings easier later
    var newUser = firstName + " " + lastName + " " + email + " " + password;
    console.log("New MemberInfo: " + newUser);

    //sends all info to php file dealing with adding user info to the system
    var myXMLRequest = new XMLHttpRequest();
    myXMLRequest.onload = returnloginScreen;
    myXMLRequest.open("POST","assignment11SignUp.php?newUser="+newUser, true);
    myXMLRequest.send();
}

//gets user input on what muscule group they want to train
//only have abdominals and legs in database for right now!!
function createActivities() {
    var muscleGroup = document.getElementById("muscleGroup").value;
    console.log("Muscle:"+muscleGroup);

    //sends user info to php file dealing with creating a table to output to the correct screen
    var myXMLRequest = new XMLHttpRequest();
    myXMLRequest.onload = createTableActivities;
    myXMLRequest.open("POST","assignment11Muscles.php?mg="+muscleGroup, true);
    myXMLRequest.send();
}

//outputs MySQL database info in the form of a table if user input a recognized primary key
function createTableActivities() {
    document.getElementById("activitiesList").innerHTML = this.responseText;
}

//switches screen to the sign up page
function signUp() {
    var newLocation = "#signUpPage";
    window.location = newLocation;
}

//switches screeen to the login screen
function loginScreen() {
    var newLocation = "#pageHome";
    window.location = newLocation;
}

//switches the screen to the login screen and alerts the user a new user has been added to the database
function returnloginScreen() {
    alert("New user has been added!");
    var newLocation = "#pageHome";
    window.location = newLocation;
}
