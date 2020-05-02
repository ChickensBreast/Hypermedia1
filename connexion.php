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
				$nomTrouve =$cnx->query("select * from utilisateur where nomUtilisateur=".$nom);
				$mdpTrouve = $cnx->query("select motDePassse from utilisateur where nomUtilisateur=".$nomTrouve);
				if ($mdp == $mdpTrouve) {
					echo "Connexion reussi";
					$_SESSION["nom"] = $nom;
				}
				else {
					echo "Mauvais mot de passe.";
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