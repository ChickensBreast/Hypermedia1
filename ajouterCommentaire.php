<?php 
	if (isset($_POST)) {
		echo("    ");print_r($_POST);
		echo("    ");print_r(array_keys($_POST));
		if (isset($_POST["myTextArea"])) {
			echo ($_POST["myTextArea"]);
		}
		echo(" g   ");
	}
?>