<!DOCTYPE html>
<html lang="fr-CA">
<head>
	<title>
		PhotoShare - Connexion
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
			<div id="header">	</div>

	</header>	
	
		
	<main style="min-height: 600px">
		<div class="jumbotron text-center" style="margin-bottom:0; background-color:orange; color:white">
		  <h1>Déconnection <h1>
		</div>
		<br />
		<br />
		<br />
		<div class="container">
			<div class="row">
				<div class="alert alert-primary" role="alert">
					<?php session_start(); 
					if (isset($_SESSION["nom"])) {


					echo "L'utilisateur ".$_SESSION["nom"]. " est déconnecté du site."; }
					else {
						echo "Aucun utilisateur connecté.";}session_destroy();
					?>
				</div>
			</div>
		</div>
	</main>
	<footer>
		<div id="footer"></div>
	</footer>
</body>
</html>