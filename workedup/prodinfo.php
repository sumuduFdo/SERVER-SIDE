<?php
$dbhost = 'localhost';
$dbuser = 'root';
$dbpass = '';

// $conn = mysqli_connect($dbhost, $dbuser, $dbpass) ;
// if (!$conn)
// {
    // die('Could not connect: ' . mysqli_error($conn));
// }
// mysqli_select_db($conn, "w1742066");

include ("db.php");
//create a variable called $pagename which contains the actual name of the page
$pagename="Product Information";

//call in the style sheet called ystylesheet.css to format the page as defined in the style sheet
echo "<link rel=stylesheet type=text/css href=mystylesheet.css>";

//display window title
echo "<title>".$pagename."</title>";
//include head layout 
include ("headfile.html");

//retrieve the product id passed from the previous page using the $_GET superglobal variable
//store the value in a variable called $prodid
$prodid=$_GET['u_prodid'];
//echo "<p>Selected product Id: ".$prodid;

//query the product table to retrieve the record for which the value of the product id
//matches the product id of the product that was selected by the user
$prodSQL="select prodId, prodName, prodPicName, 
prodDescrip , prodPrice, prodQuantity from product
where prodId=".$prodid;
//execute SQL query
$exeprodSQL=mysqli_query($conn,$prodSQL) or die(mysqli_error($conn));
//create array of records & populate it with result of the execution of the SQL query
$thearrayprod=mysqli_fetch_array($exeprodSQL);

//display product name in capital letters
echo "<div class=product>";
echo "<p>".strtoupper($thearrayprod['prodName'])."</p>";
echo "<br/>";
echo "<img src=image/".strtoupper($thearrayprod['prodPicName']).">";
echo "<br/>";
echo "<p>".strtoupper($thearrayprod['prodDescrip'])."</p>";
echo "<p> £".strtoupper($thearrayprod['prodPrice'])."</p>";
echo "<p>"."Quantity Available: ".strtoupper($thearrayprod['prodQuantity'])."</p>";
//display form made of one text box and one button for user to enter quantity
//pass the product id to the next page basket.php as a hidden value
$qty = $thearrayprod['prodQuantity'];
echo "<form action=basket.php method=post>";
echo "<div class=qty>";
echo "<p>Quantity: ";
echo "<select name=quant>";
if($qty>0){
	for ($i=1; $i<=$qty; $i++){
		echo "<option value=".$i.">".$i."</option>";
	}
}
else{
	echo "<option value=0> 0 </option>";
}
echo "</select>";
if($qty>0){
	echo "<input type=submit value='Add to Basket'>";
}
else{
	echo "<input type=button value='Add to Basket' disabled />";
}
echo "<input type=hidden  name=h_prodid value=".$prodid.">";
echo "</p>";
echo "</div>";
echo "</form>";
echo "</div>";
//include foot layout
include("footfile.html");
?>
