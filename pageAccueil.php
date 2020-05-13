<!DOCTYPE html>
<html>
<head>
	<title>Page Accueil</title>
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
<header>
	<div id="header"></div>
</header>

<main style="min-height: 600px" class="text-center">
	<div class="container text-center">
		<div class="row">
			<div class="col-lg-4">
				<div class="card" style="width: 300px">
					<img src="img/photograph.webp" class="card-img-top">
					<div class="card-body">
						<p class="card-text card-text-border"> <strong>PhotoShare</strong> <br/> Site de partage de photos</p>
					</div>
				</div>
			</div>

			<div class="col-lg-4">
				<div class="card " style="width: 300px">
					<img src="img/friend.webp" class="card-img-top">
					<div class="card-body">
						<p class="card-text card-text-border"> <strong> Partager à vos amis </strong> <br/> Publier vos photos </p>
					</div>
				</div>			
			</div>

			<div class="col-lg-4">
				<div class="card" style="width: 300px">
					<img src="img/world.webp" class="card-img-top">
					<div class="card-body">
						<p class="card-text card-text-border"> <strong> Explorer </strong> les photos des utilisateur de partout dans le monde </p>
					</div>
				</div>			
			</div>
		</div>
	</div>
	<script>
		var allSubDiv = document.getElementsByClassName("card-text");
		for (var i = allSubDiv.length - 1; i >= 0; i--) {
			allSubDiv[i].addEventListener("mousemove", mouseMove);
		}
		function mouseMove(event) {
			var y = event.pageY;
			for (var i = allSubDiv.length - 1; i >= 0; i--) {
			  	let fraction = y/window.innerWidth;
        		allSubDiv[i].style.background = "hsl("+(fraction*600)+", 100%, 50%)";
				}
		}
	</script>
</main>
<footer>
	<div id="footer"> </div>
</footer>
</html>