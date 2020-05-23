<?php
	class Image {
		private $nomImage = "";
		private $url = "";
		private $acces = "";

	public function __construct($n = "", $url = "", $acces = "") {
		$this->nomImage = $n;
		$this->url = $url;
		$this->acces = $acces;
	}

	public function getNom() {
		return $this->nomImage;
	}
	public function setNom($n) {
		$this->nomImage = $n; 
	}

	public function getUrl() {
		return $this->url;
	}
	public function setUrl($n) {
		$this->url = $n; 
	}

	public function getPureUrl() {
		return substr($this->url, 8);
	}

	public function getAcces() {
		return $this->acces;
	}
	public function changeAcces() {
		if ($this->acces == 0) {
			$this->acces = 1;
		}
		elseif ($this->acces == 1) {
			$this->acces = 0;
		}
	}

	public function setAcces($n) {
		$this->acces = $n;
	}

	public function __toString() {
		return "Image[".$this->nomImage.",".$this->url.",".$this->acces."]";
	}

	public function loadFromArray($tab) {
		$this->nomImage = $tab["nomImage"];
		$this->url = $tab["url"];
		$this->acces = $tab["acces"];
	}

	public function loadFromObject($x) {
		$this->nomImage = $x->nomImage;
		$this->url = $x->url;
		$this->acces = $x->acces;
	}
}
?>