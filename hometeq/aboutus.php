<?php

//create and populate a variable called $pagename
$pagename = "homteq: app and cloud controlled tech for your home";

//call in stylesheet
echo "<link rel=stylesheet type=text/css href=mystylesheet.css>"; 

//display name of the page as the window title
echo "<title>".$pagename."</title>";

echo "<body>";

include ("headfile.html"); //include header layout file
echo "<h4>".$pagename."</h4>";

//display random text
echo "<p>
	homteq is a highly-specialized online retailer that offers a wide range of devices at the most competitive prices to make your home and your 			life super smart.<br/><br/><br/>
	<b>SMART SECURITY</b><br/><br/>
	Smart-home monitoring products mean you can set up cameras to check on your home, even if you're in another country.
	You can either watch a live stream through your phone or tablet, or just get alerts when the motion sensor is triggered.
	<br/><br/><br/>
	<b>SMART ENERGY</b><br/><br/>
	Smart thermostat systems let yo turn it off isntantly from yor phone - no matter where you are - or you can tell them when you're heading home to switch it back on, so it's warm when you get in.
	They can figure out your routine and customize your heating and hot water so it's on when you need it and off when you don't,helping you to reduce your energy bills
	<br/><br/><br/>
	<b>SMART SPEAKERS</b><br/><br/>
	We've all got too much to do.
	Being able to command a virtual assistant to do something for you saves time, and it also means you can multitask more efficiently.
	If your hands are covered in flour but you need a two-minute-timer, you can set it by voice without even having to strop kneading.
	Because virtual assistants live in a speaker with a microphone, the're present in your home whenever you need them
	
	Whatever smart tech you are after, homteq has it on offer!</p>";


include ("footfile.html");  //include foot layout
echo "</body>";
?>
