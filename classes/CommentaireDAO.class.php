<?php
include_once('/classes/Commentaire.class.php'); 
include_once('/classes/Database.class.php'); 

class CommentaireDAO {

public function findAllComments($url) {
	$db = Database::getConnexion();

	$pstm = $db->prepare("SELECT utilisateur.nomUtilisateur, commentaire.commentaire from utilisateur, image, commentaire where image.url = :url and image.idImage = commentaire.idImage and commentaire.idUtilisateur = utilisateur.idUtilisateur");
	$pstm->bindParam(':url', $url);
	$pstm->execute();

	$myarray = array();
	foreach ($pstm as $commentaire) {
		array_push($myarray, $commentaire);
	}

	return  $myarray;
}
}
?>