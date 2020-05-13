<?php
include_once('/classes/Image.class.php'); 
include_once('/classes/Utilisateur.class.php'); 
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

	public function ajouterCommentaire($url, $commentaire) {
		try {
			$db = Database::getConnexion();
			

			$pstm = $db->prepare("SELECT idImage from image where url=:url");
			$pstm->bindParam('url', $url);
			$pstm->execute();
			foreach($pstm as $id) {}
			$id = $id["idImage"];
			$pstm2 = $db->prepare("INSERT INTO commentaire(idImage, commentaire, idUtilisateur) VALUES(:idIm, :comm, :idUser)");
			$pstm2->bindParam('idIm', $id);
			$pstm2->bindParam('comm', $commentaire);
			$pstm2->bindParam('idUser', $_SESSION["id"]);

			$pstm2->execute();

		} catch(PDOException $e) {
			print "Error!: " . $e->getMessage() . "<br/>";
			echo "<script>alert('".$e->getMessage()."');</script>";
		}
	}

	public function findUtilsateurFromPhoto($objImage) {
		try {

			$db = Database::getConnexion();
			$pstm = $db->prepare("SELECT idImage from image where url=:url");
			$url = $objImage->getUrl();
			$pstm->bindParam('url', $url);
			$pstm->execute();
		    foreach($pstm as $im) {
		    }
		    $id = $im["idImage"];
		    $pstm2 = $db->prepare("SELECT idUtilisateur from utilisateurimage where idImage=:id");
		    $pstm2->bindParam('id', $id);
		    $pstm2->execute();
		    foreach($pstm2 as $idUser) {
		    }
		    $idFinalUser = $idUser["idUtilisateur"];
		    $pstm3 = $db->prepare("SELECT * from utilisateur where idUtilisateur=:mid");
		    $pstm3->bindParam('mid', $idFinalUser);
		    $pstm3->execute();
	     	foreach($pstm3 as $user) {
		    }
		    $a = $user["nomUtilisateur"];
	    	
		    return $a;


		}
		catch (PDOException $e) {
			print "Error!: " . $e->getMessage() . "<br/>";
			return $monNom = "Anonyme";
		}
	}	

	public function changerAcces($imageDontTuAsaccess) {
		try {

		$db = Database::getConnexion($x);
		$pstm = $db->prepare("UPDATE image set acces=0");
		$pstm->execute();
		} catch (PDOException $e) {
			print "Error!: " . $e->getMessage() . "<br/>";
		}
	}

	public function findPublicImage() {
		try {
			$liste = array();

			$requete = "SELECT * FROM image where acces='0'";
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