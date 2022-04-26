<?php
// *****************************************************************************************
// Description : Classe représentant un utilisateur connecté au site
// Date        : 18 avril 2021
// Auteur      : Pierre Coutu
// *****************************************************************************************
class Utilisateur {
	// Attributs
	private $idUtilisateur;  // int
	private $motPasse;       // String
	private $categorie;      // String (administrateur ou acheteur)

	// Constructeur
	public function __construct($unId,$unMotPasse,$uneCategorie){
		$this->idUtilisateur=$unId;
		$this->motPasse=$unMotPasse;
		$this->categorie=$uneCategorie;
	}
	
	// Accesseurs et mutateurs
	public function getIdUtilisateur() {return $this->idUtilisateur;}
	public function getMotPasse() {return $this->motPasse;}
	public function getCategorie() {return $this->categorie;}
	public function setMotPasse($nouveauMotPasse) {$this->motPasse=$nouveauMotPasse;}

	// Autres méthodes
	public function verifierMotPasse($motAVerifier) { return $this->motPasse == $motAVerifier; }
	
	// Affichage
	public function __toString(){
		$message=$this->idUtilisateur." (".$this->categorie.")";
		return $message;
	}
}
?>






