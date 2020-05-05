<!DOCTYPE html>
<html>
<body>

<h2 id="love">My First Web Page</h2>
<p>My First Paragraph.</p>
<main>
	
<div id="demo"></div>
<form method="post">
		<label for="nomAmi">Ajouter un ami</label>
		<input class="form-control" type="text" name="nomAmi">
		<input class="btn btn-primary" type="submit" name="ajouter">
	</form>
</div>
<div class="input-group-prepend">
	<form method="post">
		<label for="lbnomAmi">Supprimer un ami</label>
		<input class="form-control" type="text" name="nomAmi">
		<input class="btn btn-primary" type="submit" name="supprimer">
	</form>
</div>

<?php
echo "hi";
	$i=0;
	$t = array_keys($_POST);
	foreach($t as $submit) {
		echo $i." $submit";
	}
?>
</main>
</body>
</html> 
