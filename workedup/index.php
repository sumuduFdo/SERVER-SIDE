<?php
// $dbhost = 'localhost';
// $dbuser = 'root';
// $dbpass = '';

// $conn = mysqli_connect($dbhost, $dbuser, $dbpass) ;
// if (!$conn)
// {
	// die('Could not connect: ' . mysqli_error($conn));
// }
// mysqli_select_db($conn, "w1742066");

include ("db.php");
//create a variable called $pagename which contains the actual name of the page
$pagename="Index";

//call in the style sheet called ystylesheet.css to format the page as defined in the style sheet
echo "<link rel=stylesheet type=text/css href=mystylesheet.css>";

//display window title
echo "<title>".$pagename."</title>";
//include head layout 
include ("headfile.html");

echo "<p></p>";
//display name of the page and some random text
echo "<p id=descrip>Amazing products for your home, for your work, for you! <br/><br/></p><hr/>";

//create a new variable containing a SQL statement retrieving names of products from the product table 
$SQL="select prodId, prodName, prodPicName, prodPrice from product";
//Create a new variable containing the execution of the SQL query i.e. select the records or get out
$exeSQL=mysqli_query($conn,$SQL) or die (mysqli_error($conn));

//create an array of records (2 dimensional variable) called $prodArray.
//populate it with the records retrieved by the SQL query previously executed. 
//loop through the array i.e while the end of the array has not been reached go through it
while ($arrayprod=mysqli_fetch_array($exeSQL))
{
	echo"<div class=item>";
	echo "<br>";
	//make each product a link to the next page and pass the product id to the next page by URL
	//concatenate a string of characters u_prodid which carries the value of the actual id
	echo "<p><a href=prodinfo.php?u_prodid=".$arrayprod['prodId'].">";
	//Display name of the product
	echo $arrayprod['prodName']."<br/>";
	echo "</a>";
	echo "<a href=prodinfo.php?u_prodid=".$arrayprod['prodId']."><img  src=image/".$arrayprod['prodPicName']."></a>";
	echo "<br><br>";
	echo "£. ".$arrayprod['prodPrice']."<br/>";
	echo "</div>";
	echo "<hr>";
}

//include foot layout
include("footfile.html");
?>
