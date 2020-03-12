<?php
session_start();
include("db.php");
//create and populate a variable called $pagename
$pagename = "Smart Basket";

//call in stylesheet
echo "<link rel=stylesheet type=text/css href=mystylesheet.css>"; 

//display name of the page as the window title
echo "<title>".$pagename."</title>";

echo "<body>";
include ("headfile.html"); //include header layout file
echo "<h4>".$pagename."</h4>";

if(isset($_POST['h_prodid'])){
	$newprodid = $_POST['h_prodid'];
	$reququantity = $_POST['quant'];

	//display id and the quantity of the selected product
	echo "<p>Id of selected product: ".$newprodid."<br/>";
	echo "Quantity of selected product: ".$reququantity."</p>";

	//create a new cell in the basket session array with the cell index product_id
	//store the required product quantity
	$_SESSION['basket'][$newprodid] = $reququantity;
	echo "<p>Item added to the basket</p>";
}
//display basket only if items are present in the basket
elseif(isset($_SESSION['basket'])){
	echo "Basket Unchanged";
}
else{
	echo "Your basket is empty";
}
if(isset($_SESSION['basket'])){
	echo "<table style='boder:0px'>";
		$total = 0;
		echo "<tr>";
			echo "<th>Product Name</th>";
			echo "<th>Unit Price</th>";
			echo "<th>Quantity</th>";
			echo "<th>Subtotal</th>";
		echo "</tr>";
	foreach ($_SESSION['basket'] as $baskItem => $item){
		$SQLQRY = "select prodName, prodPrice, from product where prodId="$baskItem;
		$execute = mysqli_query($conn, $SQLQRY) or die(mysqli_erro($conn));
		$arrayitem = mysqli_fetch_array($execute);
		$total += (arrayitem['prodPrice']*$item);
		echo "<tr>";
			echo "<td>".$rrayitem['prodName']."</td>";
			echo "<td>".$item."</td>";
			echo "<td>".$arrayitem['prodPrice']*$item."</td>"
		echo "</tr>";
		}
		echo "<tr>";
			echo "<td colspan=3>Total</td>";
			echo "<td> £".$total."</td>";
		echo "</tr>";
}
else{
	echo "Your shopping basket is empty";
}
	
echo "</table>"


include ("footfile.html");  //include foot layout
echo "</body>";
?>
