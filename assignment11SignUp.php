<?php
//This php file adds a new user to the MemberInfoship database
//Sends a INSERT request to appropriate Mysql database

//connects to the MemberInfo database with recognized user
$mysqli = new mysqli("localhost", "gymman", "weightloss2021", "Assignment11DataBase", 3306);
//if database can be reached or user is not recognized, sent error message
if($mysqli->connect_errno) {
    echo "Failed to connect to MySQL: (" . $mysqli->connect_errno . ") " . $mysqli->connect_errno;
}

//takes in new user info from Js
$userInfo = $_REQUEST[newUser];

//Creates substring of userInfo where spaces are
//assigns info to appropriate variables
$token = strtok($userInfo, " ");
$firstName = $token;
$token = strtok(" ");
$lastName = $token;
$token = strtok(" ");
$email = $token;
$token = strtok(" ");
$password = $token;

//sends a quert request that adds user info into the MemberInfoship datebase, under the MemberInfo table
$sql = "INSERT INTO `MemberInfo` (`First Name`, `Last Name`, `Email`, `Password`) VALUES ('$firstName', '$lastName', '$email', '$password')";
$mysqli->query($sql);
?>
