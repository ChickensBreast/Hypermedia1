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
							<input type="password" class="form-control" id="mdp" name="mdp" required>
						</div>
						<div class="form-group">
							<label for="mdp2"> Confirmez mot de passe : </label>
							<input type="password" class="form-control" id="mdp2" name="mdp2" required>
						</div>
						<div class="form-group">
							<div class="form-checkbox"> 
								<label> <input type="checkbox" class="form-check-input"> <a href="termeUtilisation.php"> J'accepte les conditions </a> </label>
							</div>
						</div>
						<div class="form-group">
							<button type="submit" id="submit" name="submit" class="btn btn-primary">S'inscrire</button>
						</div>
					</form>
					<?php
						$passwordRegex = "/^.*(?=.{7,})(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).*$/"; // Minimum :One upper, One Lower, One Number, 7 char / Max: 21 char
						$courrielRegex = "/^[a-zA-Z\d\._]+@[a-zA-Z\d\._]+\.[a-zA-Z\d\.]{2,}+$/";
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

								if(!preg_match($courrielRegex,$_POST['courriel'])){
									echo "<script>alert('Adresse courriel invalide'); </script>";
									$validate = false;
									$errNom.="- mot de passe non conforme \n";
								}

								if(!isset($_POST["mdp"])) {
									$errNom.="- mot de passe\n";
									$validate = false;
								}
						
								if(!isset($_POST["mdp2"])) {
									$errNom.="- confirmez mot de passe\n";
									$validate = false;
								}

								if ($_POST["mdp2"] !== $_POST["mdp"]) {
									$errNom.="- Confirmation mot de passe non valide \n";
									$validate = false;
									echo "<script>alert('Confirmation de mot passe est invalide'); </script>";
								}

								if(!preg_match($passwordRegex,$_POST['mdp'])){
									echo "<script>alert('Mot de passe a besoin d au moins : 1 lower case, 1 Upper Case, 1 chiffre, 7 char et max 21 char'); </script>";
									$validate = false;
									$errNom.="- mot de passe non conforme \n";
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