<!DOCTYPE html>
<html lang="fr-CA">
<head>
	<title>
		Ami
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
		<?php
		include_once("classes/Utilisateur.class.php");
		include_once("classes/UtilisateurDAO.class.php");
		$dao = new UtilisateurDAO();
		if(!isset($_SESSION)) {
			   session_start(); ?>

		<h1> Vos demandes reçus à accepter  </h1>
		<?php 
			$liste = $dao->findDemand();
			if ($liste != null) {
				echo "bonjouyr";
				$i  = 1; ?>
				<table border="1"> 
				<tr>
					<th> # </th>
					<th width="300px">  Nom - Prenom - Nom d'utilisateur  </th>
					<th> [-] </th>
					<th> [+] </th>
				</tr>
			<?php
				foreach ($liste as $demande) {
					?> 
					<tr>
						<td> <?=$i?> </td>
					 <td> <?=$demande->getNomUtilisateur()?> </td> 
						<td><a class='btn btn-danger' href="?action=ref?&a=<?=$demande->getIdUtilisateur()?>">Refuser demande</a></td> 
						<td><a class='btn btn-primary' href="?action=acp&b=<?=$demande->getIdUtilisateur()?>">Accepter demande</a></td> 
					</tr>

					<?php
				}
				?>
			</table>
				<?php

			}
			else {
				echo "hi";
			}
		?>


		<h1> Vos demandes envoyés en attentes</h1>
		<?php 
			$liste = $dao->findPending();
			if ($liste != null) {
				echo "bonjouyr";
				$i  = 1; ?>
				<table border="1"> 
				<tr>
					<th> # </th>
					<th width="300px">  Nom - Prenom - Nom d'utilisateur  </th>
					<th> [Etat] </th>
				</tr>
			<?php
				foreach ($liste as $demande) {
					?> 
					<tr>
						<td> <?=$i?> </td>
					 <td> <?=$demande->getNomUtilisateur()?> </td> 
						<td><a class='btn btn-danger' href="?action&ann=<?=$demande->getIdUtilisateur()?>">Annuler</a></td> 
					</tr>

					<?php
					$i++;
				}
				?>
			</table>
				<?php

			}
			else {
				echo "hi";
			}
		?>


		<div class="input-group-prepend">
			<form method="post" action="?action=dem&nomami?">
				<label for="nomAmi"><h1> Ajouter un ami </h1></label>
				<input class="form-control" type="text" name="z" required>
				<input class="btn btn-primary" type="submit" name="dem">
			</form>
		</div>
	   <div class="input-group-prepend" style="justify-content: center">
        	<form>
        		<input class="btn btn-primary" type="submit" name="chargerImageAmi" value="Afficher les photos de mes amis">
        	</form>
    	</div>


		<h1> Votre liste d'amis </h1>
		<?php
			} 
			$liste = $dao->findFriends($_SESSION["id"]);	
			if ($liste != null) {

			$i = 1;
			?>
			<table border="1"> 
				<tr>
					<th> # </th>
					<th width="300px"> Nom - Prenom - Nom d'utilisateur </th>
					<th> [X] </th>
				</tr>
			<?php
			foreach($liste as $ami) {
				
				?> 
				<tr> <td> <?= $i ?></td><td><?=$ami->getNom()." ".$ami->getPrenom()."(".$ami->getNomUtilisateur().")"?> </td> <td> <a class='btn btn-danger' href="?action=del&n=<?=$ami->getIdUtilisateur()?>">Supprimer cet ami</a></td></tr>
				<?php
				$i++;
				}
				?> 
				</table>
				<?php
			}
			else {
				echo "Aucun ami. Veuillez en ajouter.";
			}	
			//echo "<script>alert();</script>";
		?>
		
	</main>
	<?php			
		print_r(array_keys($_REQUEST));

		if (isset($_REQUEST['action'])) {
			if ($_REQUEST['action'] == "del") {
				$dao->deleteFriend($_REQUEST["n"], $_SESSION["id"]);
			}	

			 if ($_REQUEST['action'] == "dem") {
				$dao->addDemand($_REQUEST["z"], $_SESSION["id"]);
			}	
			 if ($_REQUEST['action'] == "ref") {
				$dao->deleteDemand1($_REQUEST["a"], $_SESSION["id"]);
				$dao->deleteDemand2($_REQUEST["a"], $_SESSION["id"]);

			}
			 if ($_REQUEST['action'] == "acp") {
				$dao->addFriend($_REQUEST["b"], $_SESSION["id"]);
			}

			if ($_REQUEST['action'] == "ann") {
										echo "<script> alert(''); </script>";

			}
		}
	?>
	<footer>
		<div id="footer"></div>
	</footer>
</body>
</html>