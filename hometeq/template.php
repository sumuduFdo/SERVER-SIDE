<?php

//create and populate a variable called $pagename
$pagename = "Template";

//call in stylesheet
echo "<link rel=stylesheet type=text/css href=mystylesheet.css>"; 

//display name of the page as the window title
echo "<title>".$pagename."</title>";

echo "<body>";

include ("headfile.html"); //include header layout file
echo "<h4>".$pagename."</h4>";

//display random text
echo "<p> TEXT HERE ";
echo "</p>";

include ("footfile.html");  //include foot layout
echo "</body>";
?>
