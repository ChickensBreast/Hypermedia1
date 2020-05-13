<!DOCTYPE html>
<html>
<body>

	<figurecaption>N
	</figurecaption><br/>
	<form method="post"> 
	<textarea name="myTextArea">enterYourText</textarea> 
	<br/><input type="submit" name="a1" value="Telecharger">
	<form>
	
	<figurecaption>A
	</figurecaption><br/>
	<form method="post"> 
	<textarea name="myTextArea">enterYourText</textarea> 
	<br/><input type="submit" name="a2" value="Telecharger">
	<form>
<?php	
	print_r($_POST);	
	if(isset($_POST["myTextArea"])) {
		echo $_POST["myTextArea"];
	}
	else {
		echo "nope";
	}
?>

</main>
</body>
</html> 
