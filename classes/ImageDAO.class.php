<?php
include_once('/classes/Image.class.php'); 
include_once('/classes/Database.class.php'); 
class ImageDAO {

	public function create($x) {
		try {
			if (isset($_SESSION["id"])) {
				$db = Database::getConnexion($x);
				$pstm = $db->prepare("INSERT INTO image(nomImage, url, acces)"." VALUES(:n, :u, :a)");
				$pstm->execute(array(':n'=>$x->getNom(),
									':u'=>$x->getUrl(),
									':a'=>$x->getAcces()));
				$pstm = $db->prepare("SELECT idImage from image where url = :url");
				$url = $x->getUrl();
				$pstm->bindParam(':url', $url);
				$pstm->execute();

				foreach($pstm as $idTrouve) {
				}
				$idTrouve = $idTrouve["idImage"];

				echo "<script>alert('myid 1 ".$idTrouve."');</script>";
				echo "<script>alert('myid 2 ".$_SESSION["id"]."');</script>";
				if ($idTrouve != null) {
					$pstm = $db->prepare("INSERT INTO utilisateurimage(idUtilisateur, idImage) VALUES(:id, :idImage)");
					$pstm->bindParam(':id', $_SESSION["id"]);
					$pstm->bindParam(':idImage', $idTrouve);
					$pstm->execute();
				}
			}
		}
		catch(PDOException $e)
		{
			throw $e;
		}
	}

	public function findAllMyImage($id) {
		try {
			$liste = array();

			$requete = "SELECT idImage FROM utilisateurimage where idUtilisateur=".$id;
			$cnx = Database::getConnexion();

			$res = $cnx->query($requete);
		    foreach($res as $row) {
		    	$req2 = "SELECT * FROM image where idImage=".$row["idImage"];
				$res2 = $cnx->query($req2);
				foreach($res2 as $im) {
					$imageTrouve = new Image();
					$imageTrouve->loadFromArray($im);
					array_push($liste,$imageTrouve);
				}
				/*$p->setNumero($row['NUM']);
				$p->setDesignation($row['DESIGN']);
				$p->setPrixUnit($row['PRIXUNIT']);*/
		    }
			$res->closeCursor();
			Database::close();
			return $liste;
		} catch (PDOException $e) {
		    print "Error!: " . $e->getMessage() . "<br/>";
		    return $liste;
		}	
	}

	public function ajouterCommentaire($image, $commentaire) {

	}

	public function changerAcces($imageDontTuAsaccess) {
		try {

		$db = Database::getConnexion($x);
		$pstm = $db->prepare("UPDATE image set acces=");
		$pstm->execute();
		} catch (PDOException e) {
			print "Error!: " . $e->getMessage() . "<br/>";
		}
	}

	public function findPublicImage() {
		try {
			$liste = array();

			$requete = "SELECT * FROM image where acces='public'";
			$cnx = Database::getConnexion();

			$res = $cnx->query($requete);
		    foreach($res as $im) {
				$imageTrouve = new Image();
				$imageTrouve->loadFromArray($im);
				array_push($liste,$imageTrouve);
			}
				/*$p->setNumero($row['NUM']);
				$p->setDesignation($row['DESIGN']);
				$p->setPrixUnit($row['PRIXUNIT']);*/
			$res->closeCursor();
			Database::close();
			return $liste;
		} catch (PDOException $e) {
		    print "Error!: " . $e->getMessage() . "<br/>";
		    return $liste;
		}	
	}
}
?>