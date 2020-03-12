<?php

include ("db.php");
//create and populate a variable called $pagename
$pagename = "A smart buy for a smart home";

//call in stylesheet
echo "<link rel=stylesheet type=text/css href=mystylesheet.css>"; 

//display name of the page as the window title
echo "<title>".$pagename."</title>";

echo "<body>";

include ("headfile.html"); //include header layout file
echo "<h4>".$pagename."</h4>";

//retrieve the product_id passed from previous page using the GET method and the $_GET superglobal variable
//apply it to the query string u_prod_id
//store the value in a local variable called $prodid
$prodid = $_GET['u_prod_id'];



//Create a $SQL variable and populate it with a SQL statement that retrieves product details
$SQL = "select prodId, prodName, prodPicNameLarge, prodDescripLong, prodPrice, prodQuantity from product where prodId=".$prodid;
//run SQL query for connected database or exit and display error message
$exeSQL = mysqli_query($conn, $SQL) or die (mysqli);

echo "<table style='border:0px'>";

//create $arryp array of records (2D variable)
//populate it with the records retrieved by the SQl query previously executed
//iterate through the array 
while($arrayp = mysqli_fetch_array($exeSQL)){
	echo "<tr>";
	echo "<td style='border:0px'>";
	echo "<a href=prodbuy.php?u_prod_id=".$arrayp['prodId']."><img src=image1/".$arrayp['prodPicNameLarge']."></a>";
	echo "</td>";
	echo "<td style='border:0px'>";
	echo "<p><h5>".$arrayp['prodName']."</h5></p>";
	echo "<p>".$arrayp['prodDescripLong']."</p>";
	echo "<p><b> £".$arrayp['prodPrice']."</b><br/><br/>";
	echo "Number left in stock: ".$arrayp['prodQuantity']."</p>";
	//crete form made of one text field and one button for user to enter quantity
	//the value entered in the form will be posted to the basket.php to be processed
	$qty = $arrayp['prodQuantity'];
	echo "<form action=basket.php method=post>";
	echo "<select name=quant>";
	if($qty>0){
		for ($i=1; $i<=$qty; $i++){
			echo "<option value=".$i.">".$i."</option>";
		}
	}		
	else{
		echo "<option value=0>0</option>";
	}
	echo "</select>";
	echo "&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;";
	if($qty>0){
		echo "<input type=submit value='ADD TO BASKET' />";
	}
	else{
		echo "<input type=submit value='ADD TO BASKET' disabled/>";
	}
	echo "<input type=hidden  name=h_prodid value=".$prodid.">";
	echo "</form>";
	echo "</td>";
	echo "</tr>";
}
echo "</table>";

include ("footfile.html");  //include foot layout
echo "</body>";
?>
