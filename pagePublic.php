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
	<?php 
		if(!isset($_SESSION)) {
 			   session_start();
		} 
		
		include_once('/classes/Image.class.php'); 
		include_once('/classes/ImageDAO.class.php'); 
		include_once('/classes/Commentaire.class.php'); 
		include_once('/classes/CommentaireDAO.class.php'); 
		$dao2 = new CommentaireDAO();
		$dao = new ImageDAO();
		$liste = $dao->findPublicImage();
		echo "<div class='conteneur' style='border:2px solid black'>";
		?>
		<div class='conteneur' style='border:2px solid black'>

		<?php
		foreach($liste as $image) {
			$nom = $dao->findUtilsateurFromPhoto($image);
						?>
			
						<figure style='border:2px solid black'>
						<img src="<?=$image->getUrl()?>"/><br/>
						<figurecaption>
						<?php $tabNomCom = $dao2->findAllComments($image->getUrl());

						?>
						<div style= "height: 100px;" data-spy="scroll" class="overflow-auto" data-target="#navbar-example3" data-offset="0">
						<?php
						foreach ($tabNomCom as $tab) {
							?>
							  <h4> <?=$tab["nomUtilisateur"]?></h4>
							  <p> <?=$tab["commentaire"]?>.</p>
							

						<?php } 
						?>
						</div>

						<br/>  <form method='POST' action="?action=<?=$image->getUrl()?>"> 
						<textarea name="comment"></textarea> 
						<br/><input type='submit' name='submit' value='Commenter'>
						</form></figure>
						</figurecaption>
						</figure><br/>

		<?php } ?> 
		</div><?php
		if (isset($_POST["submit"])) {
			// print_r(array_keys($_POST));
			// echo ($_POST['comment']);
			// echo ($_REQUEST['action']);
			$dao->ajouterCommentaire($_REQUEST['action'], $_POST['comment']);
		    header("Location: /monappli/pagePublic.php");
		}
		
	?>
	</main>
	<footer>
		<div id="footer"></div>
	</footer>
</body>
</html>