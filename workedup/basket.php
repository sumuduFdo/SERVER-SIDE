<?php

session_start();
include ("db.php");
//create a variable called $pagename which contains the actual name of the page
$pagename="Ordering Basket";

//call in the style sheet called ystylesheet.css to format the page as defined in the style sheet
echo "<link rel=stylesheet type=text/css href=mystylesheet.css>";

//display window title
echo "<title>".$pagename."</title>";
//include head layout 
include ("headfile.html");

//echo "PRODUCT".$_SESSION['basket'][$newprodid]." ";
//display name of the page 
echo "<h2>".$pagename."</h2>";


//capture product id and quantity using POST superglobal
if(isset($_POST['h_prodid'])){
	$newprodid=$_POST['h_prodid'];
	$reququantity =$_POST['quant'];

	//insert quantity to basket session variable with index productid
	$_SESSION['basket'][$newprodid] = $reququantity;

	echo "<p> Your basket has been updated</p>";
	echo "<br/>";
}
elseif(isset($_SESSION['basket'])){
	echo "Existing Basket";
}
else{
	echo "Your shopping basket is empty";
	echo "<br/><br/>";
}

echo "<table>";
		$total = 0;
		echo "<tr>";
			echo "<th> Product Name </th>";
			echo "<th> Unit Price </th>";
			echo "<th> Quantitiy </th>";
			echo "<th> Subtotal </th>";
		echo "</tr>";
		if(isset($_SESSION['basket'])){
			foreach($_SESSION['basket'] as $x => $item){
				$QUERY = "select prodName, prodPrice from product where prodId=".$x;
				$exeQUERY = mysqli_query($conn,$QUERY) or die(mysqli_error($conn));
				$arrayitem = mysqli_fetch_array($exeQUERY);
				$total += $arrayitem['prodPrice']*$item;
				echo "<tr>";
					echo "<td>"
					.$arrayitem['prodName']."</td>";
					echo "<td>".$arrayitem['prodPrice']."</td>";
					echo "<td>".$item."</td>";
					echo "<td>".$arrayitem['prodPrice']*$item."</td>";
				echo "</tr>";
			}
		}
		echo "<tr>";
			echo "<td colspan=3> Total </td>";
			echo "<td> GBP.".$total."</td>";
		echo "</tr>";
	echo "</table>";

	echo "<br/><br/>";

	echo "<a href=clearbasket.php >Clear Basket</a>";
	echo "<br/><br/>";


//include head layout
include("footfile.html");
?>
