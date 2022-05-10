<?php
//This pph file deals with creating an Exercises list from a user entered primary key
//Sends SELECT request to Excercise databse in MySQL to populate a table in php

//connects to the membership database with recognized user
$mysqli = new mysqli("localhost", "gymman", "weightloss2021", "Assignment11DataBase", 3306);
//if database can be reached or user is not recognized, sent error message
if($mysqli->connect_errno) {
  echo "Failed to connect to MySQL: (" . $mysqli->connect_errno . ") " . $mysqli->connect_error;
  //var_dump( $mysqli);
}

//takes into Js info and places user input into variable
$muscleGroup = $_REQUEST['mg'];

//sends request to the database to SELECT appropriate row from the given primary key
//primary key is the muscule group in this case
$sql = "SELECT * FROM `Exercises` WHERE `MuscleGroup`='$muscleGroup'";
$result = $mysqli->query($sql);


//if there is a recognized primary key create a table with all the activites
if($result->num_rows > 0) {
$myDisplayResults .= "<table>";
$myDisplayResults .= "<tr>";
$myDisplayResults .= "<th>Excercises</th>";
$myDisplayResults .= "</tr>";

while($row = $result->fetch_assoc()) {
  $myDisplayResults .= "<tr>";
  $myDisplayResults .= "<td>$row[Ex1]</td>";
  $myDisplayResults .= "</tr>";
  $myDisplayResults .= "<tr>";
  $myDisplayResults .= "<td>$row[Ex2]</td>";
  $myDisplayResults .= "</tr>";
  $myDisplayResults .= "<tr>";
  $myDisplayResults .= "<td>$row[Ex3]</td>";
  $myDisplayResults .= "</tr>";
  $myDisplayResults .= "<tr>";
  $myDisplayResults .= "<td>$row[Ex4]</td>";
  $myDisplayResults .= "</tr>";
}

$myDisplayResults .= "</table>";
echo $myDisplayResults;
}
//if there is not a recognized primary key, ouput there was no results for that key
else {
  echo "Muscle Group entered is not available";
}

?>
