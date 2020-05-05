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
  	<script src="fichier.js"></script>
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js"></script>
	<link rel="stylesheet" href="dist/css/bootstrap.css">	
	<link rel=stylesheet href="style.css">
</head>
<body>
	<header>
	<div id="header"></div>
	</header>
	
	<main>
		
		<div class="jumbotron text-center" style="margin-bottom:; background-color:orange; color:white">
		  <h1>Se connecter <h1>
		</div>
		<div class="container form-vertical">
					<form method="POST">
						<div class="form-group">
							<label for="nom">Nom d'utilisateur : </label>
							<input type="text" class="form-control" id="nom" name="nom" required>
						</div>
						<div class="form-group">
							<label for="mdp">Mot de passe : </label>
							<input type="password" class="form-control" id="mdp" name="mdp" required>
						</div>
						<div class="form-group">
							<button type="submit" name="submit" class="btn btn-primary">Se connecter</button>
						</div>
					</form>
				</div>
			</div>
		</div>
		<?php
			try {	
				session_start();
				$cnx = new PDO('mysql:host=localhost;dbname=photo',"root","root");
				if(isset($_POST["submit"])) {
					if(!isset($_POST["nom"])) {
						$errNom = "Veuillez entrer votre nom"; 
					}
					if (!isset($_POST["mdp"])) {
						$err = "Veuillez entrer votre mot de passe";
					}

					if (isset($_POST["nom"]) && isset($_POST["mdp"])) {

						$nom = $_POST["nom"];
						$mdp = $_POST["mdp"];

						$nomTrouve =$cnx->prepare("select * from utilisateur where nomUtilisateur = :nom");
						$nomTrouve->bindParam(':nom', $nom);
						$nomTrouve->execute();
						foreach($nomTrouve as $resultat) {
							echo "nom:".$resultat["nomUtilisateur"];
							$nomTrouve = $resultat["nomUtilisateur"];
						}
						$mdpTrouve = $cnx->prepare("select motDePasse from utilisateur where nomUtilisateur =:nomTrouve");
						$mdpTrouve->bindParam(":nomTrouve", $nomTrouve);
						$mdpTrouve->execute();
						foreach($mdpTrouve as $resultat) {
							echo "motDePasse:".$resultat["motDePasse"];
							$mdpTrouve = $resultat["motDePasse"];
						}

						if ($mdp == $mdpTrouve) {
							echo "Connexion reussi";
							$idUtilisateur = $cnx->prepare("select idUtilisateur from utilisateur where nomUtilisateur =:nomTrouve");
							$idUtilisateur->bindParam(":nomTrouve", $nomTrouve);
							$idUtilisateur->execute();
							foreach($idUtilisateur as $resultat) {
								echo "idUtilisateur:".$resultat["idUtilisateur"];
							$idUtilisateur = $resultat["idUtilisateur"];
						}
							$_SESSION["id"] = $idUtilisateur;
							$_SESSION["nom"] = $nom;
						}
						else {
							echo "Mauvais mot de passe. Veuillez réessayer.";
						}
					}
				}
			$cnx = null;
			}

			catch(PDOException $e) {
				echo "Connexion ratee";
				throw $e;
			}
		?>
	</main>
	<footer style="margin-top: 300px">
		<div id="footer"></div>
	</footer>
</body>
</html>