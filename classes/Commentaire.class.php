<?php 
	class Commentaire {
		private idCommentaire = "";
		private idImage = "";
		private commentaire = "";
	

	public function __construct($n="XXX000")	//Constructeur
	{
		$this->idCommentaire = $n;
	}	
	
	public function getIdCommentaire()
	{
			return $this->idCommentaire;
	}
	
	public function setIdCommentaire($value)
	{
			$this->idCommentaire = $value;
	}

	public function getIdImage()
	{
			return $this->idImage;
	}
	
	public function setIdImage($value)
	{
			$this->idCommentaire = $value;
	}

	public function getCommentaire()
	{
			return $this->commentaire;
	}
	
	public function setCommentaire($value)
	{
			$this->commentaire = $value;
	}

	public function __toString()
	{
		return "Commentaire[".$this->idCommentaire.",".$this->idImage.",".$this->commentaire."]";
	}

	public function loadFromArray($t) {
		this->idCommentaire = $t["idCommentaire"];
		this->idImage =  $t["idImage"];
		this->commentaire = $t["commentaire"]
	}

	public function loadFromObject($x) {
		idCommentaire = x->idCommentaire;
		this->idImage = x->idImage;
		this->commentaire = x->commentaire;
	}


}
?>