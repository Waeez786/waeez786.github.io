<?php
	$p = $_GET['id'];

	switch($p) {
		case "1":
		echo '<div id="sell">
		    <h1>SELL YOUR BOOKS</h1>
			<div id="sellcontent">
			<label for="college">College Name: </label><input type="text" id="college" class="textbox"/>
			</div>
			</div>';
		break;
					  
		case "2":
		echo 'PG 2<br style="clear:both;" />';
		break;

		case "3": 
		echo 'My hotmail content goes here...<br style="clear:both;" />';
		break;

		case "4": default:
		echo 'Twitter status update :)<br style="clear:both;" />';
		break;
	}
?>