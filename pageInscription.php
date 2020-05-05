<!DOCTYPE html>
<html lang="fr-CA">
<head>
	<title>
		PhotoShare - Inscription
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
		<div class="jumbotron text-center" style="margin-bottom:0; background-color:orange; color:white">
		  <h1>S'inscrire <h1>
		</div>
		<div class="container form-vertical">
					<form method="POST">
						<div class="form-group">
							<label for="nom">Nom d'utilisateur : </label>
							<input type="text" class="form-control" id="nomutilisateur" name="nomutilisateur" required>
						</div>
						<div class="form-group">
							<label for="nom">Nom : </label>
							<input type="text" class="form-control" id="nom" name="nom" required>
						</div>
						<div class="form-group">
							<label for="nom">Prénom : </label>
							<input type="text" class="form-control" id="prenom" name="prenom" required>
						</div>
						<div class="form-group">
							<label for="nom">Courriel : </label>
							<input type="text" class="form-control" id="courriel" name="courriel" required>
						</div>
						<div class="form-group">
							<label for="mdp">Mot de passe : </label>
							<input type="text" class="form-control" id="mdp" name="mdp" required>
						</div>
						<div class="form-group">
							<div class="form-checkbox"> 
								<label> <input type="checkbox" class="form-check-input"> J'accepte les conditions </label>
							</div>
						</div>
						<div class="form-group">
							<button type="submit" id="submit" name="submit" class="btn btn-primary">S'inscrire</button>
						</div>
					</form>
					<?php
						include_once('/classes/Utilisateur.class.php'); 
 						include_once('/classes/UtilisateurDAO.class.php');
						$dao = new UtilisateurDAO();
 						$errNom = "Veuillez entrer les informations suivantes : \n";
 							$validate = true;
							if(isset($_POST["submit"])) {
							
							if(!isset($_POST["nomutilisateur"])) {
								$errNom.="- nom d'utilisateur\n";
								$validate = false;
							}

							if(!isset($_POST["nom"])) {
								$errNom.="- un nom";
								$validate = false;

							}

							if(!isset($_POST["prenom"])) {
								$errNom.="- un prénom\n";
								$validate = false;
								
							}

							if(!isset($_POST["courriel"])) {
								$errNom.="- un courriel\n";
								$validate = false;
							
							}

							if(!isset($_POST["mdp"])) {
								$errNom.="- mot de passe\n";
								$validate = false;
							}

							if ($validate) {

								$nu = $_POST["nomutilisateur"];
								$prenom = $_POST["nom"];
								$nom = $_POST["prenom"];
								$courriel = $_POST["courriel"];
								$mdp = $_POST["mdp"];
								if ($dao->ajoutable($nu, $courriel)) {
									$newUser = new Utilisateur($nu, $nom, $prenom, $courriel, $mdp);
									$user = $dao->create($newUser);	
									echo "<script>alert('Utilisateur ".$nu." ajouté.'); </script>";
								}
								else {
									echo "<script>alert('Ce nom d\'utilisateur ou courriel est deja utilise sur PhotoShare'); </script>";
								}
							}
						}
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