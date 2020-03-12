<?php

//include db.php file to connect with the database
include ("db.php");

//create and populate a variable called $pagename
$pagename = "Make your home smart";

//call in stylesheet and display name of the page as the window title
echo "<link rel=stylesheet type=text/css href=mystylesheet.css>"; 
echo "<title>".$pagename."</title>";

echo "<body>";
include ("headfile.html"); //include header layout file
echo "<br/>";
echo "<h4>".$pagename."</h4>";

//Create a $SQL variable and populate it with a SQL statement that retrieves product details
$SQL = "select prodId, prodName, prodPicNameSmall, prodDescripShort, prodPrice from Product";
//run SQL query for connected database or exit and display error message
$exeSQL = mysqli_query($conn, $SQL) or die (mysqli);

echo "<table style='border:0px'>";

//create $arryp array of records (2D variable)
//populate it with the records retrieved by the SQl query previously executed
//iterate through the array 
while($arrayp = mysqli_fetch_array($exeSQL)){
	echo "<tr>";
	echo "<td style='border:0px'>";
	echo "<a href=prodbuy.php?u_prod_id=".$arrayp['prodId']."><img src=image1/".$arrayp['prodPicNameSmall']." height=200 width=200></a>";
	echo "</td>";
	echo "<td style='border:0px'>";
	echo "<p><h5>".$arrayp['prodName']."</h5></p>";
	echo "<p>".$arrayp['prodDescripShort']."</p>";
	echo "<p><b> £".$arrayp['prodPrice']."</b></p>";
	echo "</td>";
	echo "</tr>";
}
echo "</table>";

include ("footfile.html");  //include foot layout
echo "</body>";
?>
