<?php
// *****************************************************************************************
// Description : Classe représentant un Billet connecté au site
// Date        : 21 avril 2021
// Auteur      : Gabriel Boisvert
// *****************************************************************************************
class Billet {
	// Attributs
	private $numeroBillet;  // int
	private $prixPaye;       // float
	private $idAcheteur;      // int
	private $evenement;      // voyage
	


	// Constructeur
	public function __construct($unNumero,$unPrix,$unIdAcheteur,$unEvenement){
		$this->numeroBillet=$unNumero;
		$this->prixPaye=$unPrix;
		$this->idAcheteur=$unIdAcheteur;
		$this->evenement=$unEvenement;
	}
	
	// Accesseurs et mutateurs
	public function getNumeroBillet() {return $this->numeroBillet;}
	public function getPrixPaye() {return $this->prixPaye;}
	public function getIdAcheteur() {return $this->idAcheteur;}
	public function getEvenement() {return $this->evenement;}



	// Affichage
	public function __toString(){
		$message= "#".$this->numeroBillet." Voyage: ".$this->evenement."<br/>";
		$message.=" Id Acheteur: ".$this->idAcheteur."<br/>";
		$message.=" Prix: ".$this->prixPaye."$<br/>";
		return $message;
	}

}
?>