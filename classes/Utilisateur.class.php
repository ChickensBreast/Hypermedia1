<?php
	class Utilisateur {
		private $nomUtilisateur = "default";
		private $prenom = "";
		private $nom = "";
		private $courriel = "";
		private $motDePasse = "";

	public function __construct($ni="", $n="", $p="", $c="", $mdp="") {
		$this->nomUtilisateur = $ni;
		$this->nom = $n;
		$this->prenom = $p;
		$this->courriel = $c;
		$this->motDePasse = $mdp;
	}

	public function getIdUtilisateur() {
		return $this->idUtilisateur;
	}

	public function setIdUtilisateur() {
		$this->idUtilisateur = rand(1,1000);
	}

	public function getNomUtilisateur() {
		return $this->nomUtilisateur;
	}

	public function setNomUtilisateur($n) {
		$this->nomUtilisateur = $n;
	}

	public function getNom() {
		return $this->nom;
	}

	public function setNom($n) {
			$this->nom = $n;
	}

	public function getMdp() {
		return $this->motDePasse;
	}
	public function setMdp($n) {
		$this->motDePasse = $n;
	}

	public function getPrenom() {
		return $this->nom;
	}

	public function setPrenom($n) {
		$this->nom = $n;
	}

	public function getCourriel() {
		return $this->courriel;
	}

	public function setCourriel($n) {
		$this->courriel = $n;
	}

	public function __toString()
	{
		return "Utilisateur[".$this->nomUtilisateur.",".$this->$nom.",".$this->$prenom.",".$this->$courriel."]";
	}

	public function afficher() 
	{
		echo $this->__toString();
	}

	public function loadFromArray($tab) {
		$this->nomUtilisateur = $tab["nomUtilisateur"];
		$this->nom = $tab["nom"];
		$this->prenom = $tab["prenom"];
		$this->courriel = $tab["courriel"];
	}

	public function loadFromObject($x) {
		$this->nomUtilisateur = $x->nomUtilisateur;
		$this->motDePasse = $x->motDePasse;
		$this->nom = $x->nom;
		$this->prenom = $x->prenom;
		$this->courriel = $x->courriel;
	}
}
?>