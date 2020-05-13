<?php
include_once('/classes/Database.class.php'); 
include_once('/classes/Utilisateur.class.php'); 

class UtilisateurDAO
{	
	public function create($x) {
		try
		{
			$db = Database::getConnexion();
			$pstm = $db->prepare("INSERT INTO utilisateur (nomUtilisateur, motDePasse, nom, prenom, courriel)"." VALUES (:nu, :mdp, :n, :pn, :c)");
			return $pstm->execute(array(':nu'=>$x->getNomUtilisateur(),
										':mdp'=>$x->getMdp(),
										':n'=>$x->getNom(),
										':pn'=>$x->getPrenom(),
										':c'=>$x->getCourriel()));
		}
		catch(PDOException $e)
		{
			throw $e;
		}
	}

	public function findFriends()
	{
		try {
			$liste = array();
			$cnx = Database::getConnexion();
			$requete = 'SELECT idAmi FROM utilisateurami where idUtilisateur='.$_SESSION["id"];
			$res = $cnx->prepare($requete);
			$res->execute();
		    foreach($res as $row) {
				$p = $row["idAmi"];
				$req2 = $cnx->prepare("SELECT * FROM utilisateur where idUtilisateur=:idami");
				$req2->bindParam(':idami', $p);
				$req2->execute();
				foreach($req2 as $ami) {
					$newAmi = new Utilisateur();
					$newAmi->loadFromArray($ami);
					array_push($liste,$newAmi);
				}
			    $req2->closeCursor();

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

	
	public function findPending()
	{
		try {
			$liste = array();
			$cnx = Database::getConnexion();
			$requete = 'SELECT idAmi FROM demandeami where idUtilisateur='.$_SESSION["id"];
			$res = $cnx->prepare($requete);
			$res->execute();
		    foreach($res as $row) {
				$p = $row["idAmi"];
				$req2 = $cnx->prepare("SELECT * FROM utilisateur where idUtilisateur=:idUtilisateur");
				$req2->bindParam(':idUtilisateur', $p);
				$req2->execute();
				foreach($req2 as $ami) {
					$newAmi = new Utilisateur();
					$newAmi->loadFromArray($ami);
					array_push($liste,$newAmi);
				}
			    $req2->closeCursor();

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

	public function findDemand()
	{
		try {
			$liste = array();
			$cnx = Database::getConnexion();
			$requete = 'SELECT idUtilisateur FROM demandeami where idAmi='.$_SESSION["id"];
			$res = $cnx->prepare($requete);
			$res->execute();
		    foreach($res as $row) {
				$p = $row["idUtilisateur"];
				$req2 = $cnx->prepare("SELECT * FROM utilisateur where idUtilisateur=:idutilisateur");
				$req2->bindParam(':idutilisateur', $p);
				$req2->execute();
				foreach($req2 as $ami) {
					$newAmi = new Utilisateur();
					$newAmi->loadFromArray($ami);
					array_push($liste,$newAmi);
				}
			    $req2->closeCursor();

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

	public function addFriend($ami, $self) {
		try {
			$cnx = Database::getConnexion();
			$requete = $cnx->prepare("SELECT idUtilisateur from utilisateur where nomUtilisateur = :nAmi");
			$requete->bindParam("nAmi", $ami);
			$requete->execute();
			foreach($requete as $myAmi) {}
			if (isset($myAmi["idUtilisateur"])) {
				$idAmi = $myAmi["idUtilisateur"];
				$requete = $cnx->prepare("INSERT INTO utilisateurami(idUtilisateur, idAmi)"." VALUES(:self, :nAmi)"); 
				$requete->bindParam(':self', $self);
				$requete->bindParam(':nAmi', $idAmi);
				$requete->execute();
				Database::close();
				header ("Local http://");
			}
			
		} catch (PDOException $e) {
			print "Error!:".$e->getMessage()."<br/>";
		}
	}

	public function addDemand($ami, $self) {
		try {
			$cnx = Database::getConnexion();
			$requete = $cnx->prepare("SELECT idUtilisateur from utilisateur where nomUtilisateur = :nAmi");
			$requete->bindParam("nAmi", $ami);
			$requete->execute();
			foreach($requete as $myAmi) {}
			if (isset($myAmi["idUtilisateur"])) {
				$idAmi = $myAmi["idUtilisateur"];
				$requete = $cnx->prepare("INSERT INTO demandeami(idUtilisateur, idAmi)"." VALUES(:self, :nAmi)"); 
				$requete->bindParam(':self', $self);
				$requete->bindParam(':nAmi', $idAmi);
				$requete->execute();
				Database::close();
				header ("Local http://");
			}
			
		} catch (PDOException $e) {
			print "Error!:".$e->getMessage()."<br/>";
		}
	}


	public function deleteFriend($otherId, $selfId) {
		try {
			$cnx = Database::getConnexion();
			$requete = $cnx->prepare("DELETE FROM utilisateurami where idAmi = :otherId and idUtilisateur = :selfId");
			$requete->bindParam('selfId', $selfId);
			$requete->bindParam('otherId', $otherId);
			$requete->execute();
			Database::close();
		} catch (PDOException $e) {
		    print "Error!: " . $e->getMessage() . "<br/>";
		} 
	}

	public function deleteDemand1($otherId, $selfId) {
		try {
			$cnx = Database::getConnexion();
			$requete = $cnx->prepare("DELETE FROM demandeami where idAmi = :otherId and idUtilisateur = :selfId");
			$requete->bindParam('selfId', $selfId);
			$requete->bindParam('otherId', $otherId);
			$requete->execute();

		
			Database::close();
		} catch (PDOException $e) {
		    print "Error!: " . $e->getMessage() . "<br/>";
		} 
	}public function deleteDemand2($otherId, $selfId) {
		try {
			$cnx = Database::getConnexion();
			$requete = $cnx->prepare("DELETE FROM demandeami where idAmi = :selfId and idUtilisateur = :otherId");
			$requete->bindParam('selfId', $selfId);
			$requete->bindParam('otherId', $otherId);
			$requete->execute();
			Database::close();
		} catch (PDOException $e) {
		    print "Error!: " . $e->getMessage() . "<br/>";
		} 
	}


	public static function find($id)
	{
		$db = Database::getConnexion();

		$pstmt = $db->prepare("SELECT * FROM produit WHERE NUM = :x");
		$pstmt->execute(array(':x' => $id));
		
		$result = $pstmt->fetch(PDO::FETCH_OBJ);
		
		if ($result)
		{
			$p = new Utilisateur();
			$p->loadFromObject($result);
			/*$p->setNumero($result->NUM);
			$p->setDesignation($result->DESIGN);
			$p->setPrixUnit($result->PRIXUNIT);*/
			$pstmt->closeCursor();
			return $p;
		}
		$pstmt->closeCursor();
		Database::close();

		return NULL;
	}

	public static function ajoutable($nom, $courriel) 
	{
		$db = Database::getConnexion();
		$pstm = $db->prepare("SELECT * FROM utilisateur WHERE nomUtilisateur=:n");
		$pstm->bindParam(":n", $nom);
		$pstm->execute();

		$pstm2= $db->prepare("SELECT * FROM utilisateur WHERE nomUtilisateur=:c");
		$pstm2->bindParam(":c", $courriel);
		$pstm2->execute();

		$resultat = null;
		$resultat2 = null;
		foreach($pstm as $resultat) {
		}
		foreach($pstm2 as $resultat2) {}
		return ($resultat == null && $resultat2 == null);
	}

	public function update($x) {
		try
		{
			$db = Database::getConnexion();
			$pstm = $db->prepare("UPDATE produit SET idUtilisateur = :d, nomUtilisateur = :nu, motDePasse = :mdp, nom = :n, prenom = :p, courriel = :c"
								." WHERE NUM = :n");
			return $pstm->execute(array(':d'=>$x->getIdUtilisateur(),
										':nu'=>$x->getNomUtilisateur(),
										':mdp'=>$x->getMdp(),
										':n'=>$x->getNom(),
										':p'=>$x->getPrenom(),
										':c'=>$x->getCourriel()));
																		
		
		}
		catch(PDOException $e)
		{
			throw $e;
		}
	}

	public function delete($x) {
		try
		{
			$db = Database::getConnexion();
			$pstm = $db->prepare("DELETE FROM utilisateur WHERE NUM = :numero");
			$numASupprimer = $x->getIdUtilisateur();
			$pstm->bindParam(':numero',$numASupprimer);
			return $pstm->execute();
		}
		catch(PDOException $e)
		{
			throw $e;
		}
	}
}