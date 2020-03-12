

<?php

session_start();
//create a variable called $pagename which contains the actual name of the page
$pagename="Clear Basket";

//call in the style sheet called ystylesheet.css to format the page as defined in the style sheet
echo "<link rel=stylesheet type=text/css href=mystylesheet.css>";

//display window title
echo "<title>".$pagename."</title>";
//include head layout 
include ("headfile.html");

//clear all session variables
session_unset();

echo "<p></p>";
//display name of the page 
echo "<h2>".$pagename."</h2>";

//display the message
echo "<p> Your ordering basket is successfully cleared </p>";

//include head layout
include("footfile.html");
?>


