<header>
		<nav>
		<div class='text-center'>
				<figure>
					<img src='img/logo.svg' style='width: 100px'> <br/>
					<figurecaption> PhotoShare </figurecaption>
				</figure>
			</div>
		</div>
		<div class='conteneur conteneur-reparti' style='flex-wrap: nowrap;'>
			<div class='conteneur' >
				<ul style='list-style: none'>
					<li><a href='pageAccueil.php'><button type='button' class='btn btn-primary'> Accueil </button></a></li>

					<li><a id='p_ami' href='pageAmi.php'><button id='b_ami' type='button' class='btn btn-primary'>Mes Amis</button></a></li>
					<li><a id='p_photo' href='pagePhoto.php'><button id ='b_photo' type='button' class='btn btn-primary'>Mes Photos</button></a></li>
					<li><a id='p_public' href='pagePublic.php'><button type='button' class='btn btn-primary'>Public</button></a></li>
				</ul>
			</div>
			<div class='conteneur conteneur-fin'>
				<div class='dropdown'>
					<button class='btn btn-secondary dropdown-toggle' type='button' id='dropdownMenuButton ' data-toggle='dropdown' aria-haspopup='true' aria-expanded='false'>
						<label id="lbl_user"> 
							<?php 
							session_start();
							if (isset($_SESSION["nom"])) {
								echo $_SESSION["nom"];} 
							else { 
								echo "Visiteur";} ?>
						</label>
					  <img src='img/person.png' style='height: 30px'>
					  </button>
					  <div class='dropdown-menu btn btn-primary' aria-labelledby='dropdownMenuButton'>
					    <a class='dropdown-item' href='pageInscription.php'><button id ='a_ins' type='button' class='btn btn-primary'>S'inscrire</button></a>
					    <a class='dropdown-item' href='pageConnexion.php'><button id ='a_con' type='button' class='btn btn-primary'>Se connecter</button></a>
					    <a  class='dropdown-item' href='pageDeconnexion.php'><button id ='a_dec' type='button' class='btn btn-primary'>Déconnexion</button></a>
					  </div>
				</div>
			</div>
		</div>
	</nav>
		<?php if (!isset($_SESSION["id"])) {?>	<script>
			document.getElementById('b_ami').disabled = true;
			document.getElementById('b_photo').disabled = true;
			document.getElementById('a_dec').disabled = true;

 			</script>
 		<?php } else { ?> 
 			<script>
				document.getElementById('a_con').disabled = true;
				document.getElementById('a_ins').disabled = true;
 			</script>
 		<?php }; ?>