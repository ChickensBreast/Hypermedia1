<!DOCTYPE html>
<html lang="fr-CA">
<head>
	<title>
		Public
	</title>
	<meta name="viewport" content="width=device=width=device-width, initial-scale=1.0">
	<meta charset="utf-8">
	<script type="dist/js/bootstrap.min.js"></script>
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
  	<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js"></script>
	<script src="fichier.js"></script>
	<link rel="stylesheet" href="dist/css/bootstrap.css">	
	<link rel=stylesheet href="style.css">

</head>
<body>
	<header>
		<div id="header"></div>
	</header>	
	
	<main style="min-height: 600px">
		<div class="input-group-prepend" style="justify-content: center">
        	<form >
        		<input type="submit" name="" value="Afficher les images publiques">
        	</form>
    	</div>
	</main>

	<?php 
		if(!isset($_SESSION)) {
 			   session_start();
		} 
	
		include_once('/classes/Image.class.php'); 
		include_once('/classes/ImageDAO.class.php'); 
		$dao = new ImageDAO();
		$liste = $dao->findPublicImage();
		echo "hi";
		foreach($liste as $image) {
			echo "<figure><img src='".$image->getUrl()."'/><br/><figurecaption>".$image->getNom()."</figurecaption></figure>";
		}
	?>
	<footer>
		<div id="footer"></div>
	</footer>
</body>
</html>