<?php
//This php file provides verification whether the entered information relates to a registered user in MemberInfoship database
//Sends a SELECT request to MySQL database to see if there is a row with the user information
//If there is not a row with the entered user information, verification is invalid

//connects to the MemberInfoship database with recognized user
$mysqli = new mysqli("localhost", "gymman", "weightloss2021", "Assignment11DataBase", 3306);
//if database can be reached or user is not recognized, sent error message
if($mysqli->connect_errno) {
    echo "Failed to connect to MySQL: (" . $mysqli->connect_errno . ") " . $mysqli->connect_errno;
}

//takes in Js info and places user login info into a string
$loginInfo = $_REQUEST[info];

//creates substrings of appropriate variabels
//splits info into substrings at each space
$token = strtok($loginInfo," ");
echo "$token";
$email = $token;
echo "$email";
$token = strtok(" ");
echo "$token";
$password = $token;

//sends a query request to check if the entered user info is in the database
$sql = "SELECT * FROM `MemberInfo` WHERE `Email`='$email' AND `Password`='$password'";
$result = $mysqli->query($sql);

//if there is a registerd user in the database send back a verification that is valid
if($result->num_rows > 0){
    $verification = "valid";
    echo $verification;
}

//if info is not in the database, send back that the verification is invalid
else{
    $verification = "invalid";
    echo $verification;
}
?>
