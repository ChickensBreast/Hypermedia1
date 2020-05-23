<!DOCTYPE html>
<html>
<head>
	<title> FeedBack </title>
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

	<main style="min-height: 600px" class="text-center">

		<div class="row">
			<div class="col-lg-12">
				<div class="container p-3 my-3 bg-dark text-white">
					<h1> Contact par courriel </h1>
					<h5>Vous avez des questions ou vous voulez nous donner du Feedback par rapport au site web, envoyer nous un courriel.</h5> <br>
					<form class="contact-form" action="courrielForm.php" method="post">
						<input type="text" name="nomComplet" placeholder="Nom complet"> <br> <br>
						<input type="text" name="courriel" placeholder="Votre courriel"> <br> <br>
						<input type="text" name="sujet" placeholder="Sujet"> <br> <br> <br>
						<textarea name="message" placeholder="Message" rows="10" cols="90" ></textarea> <br> <br>
						<button type="submit" name="submit" >   Send Email  </button> <br> <br>
					</form> 
				</div>
			</div>
		</div>

    </main>
    
    <footer>
    	<div id="footer"></div>
    </footer>

</body>

</html>