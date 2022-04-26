<?php
// *****************************************************************************************
// Description : Classe représentant les Information d'un Voyage 
// Date        : 21 avril 2021
// Auteur      : Gabriel Boisvert
// *****************************************************************************************
class InfosVoyage {
	// Attributs
	private $codeInfos;  // int
	private $titre;       // String
	private $urlPhoto;      // String
	private $tourGuideInfo;      // string


	// Constructeur
	public function __construct($unCode,$unTitre,$unUrl, $unTourGuideInfo){
		$this->codeInfos=$unCode;
		$this->titre=$unTitre;
		$this->urlPhoto=$unUrl;
		$this->tourGuideInfo=$unTourGuideInfo;
	}
	
	// Accesseurs et mutateurs
	public function getCodeInfos() {return $this->codeInfos;}
	public function getTitre() {return $this->titre;}
	public function getUrlPhoto() {return $this->urlPhoto;}
	public function getTourGuideInfo() {return $this->tourGuideInfo;}

	public function setTitre($unTitre) {$this->titre=$unTitre;}
	public function setUrlPhoto($unUrl) {$this->urlPhoto=$unUrl;}
	public function setTourGuideInfo($unTourGuideInfo) {$this->tourGuideInfo=$unTourGuideInfo;}

	public function afficherImage(){
		echo "<img src='".$this->urlPhoto."' alt='".$this->titre."' height=190px width=190px>" ;
	}

	// Affichage
	public function __toString(){
		$message= $this->titre." Code: ".$this->codeInfos."<br/>";
		$message.=" Information voyage: ".$this->tourGuideInfo."<br/>";
		return $message;
	}

}
?>






