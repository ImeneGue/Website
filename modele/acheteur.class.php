<?php
// *****************************************************************************************
// Description : Classe représentant un acheteur connecté au site
// Date        : 21 avril 2021
// Auteur      : Gabriel Boisvert
// *****************************************************************************************
class Acheteur {
	// Attributs
	private $idAcheteur;  // int
	private $nom;       // String
	private $telephone;      // String
	private $solde;      // float
	private $lesBillets;      // Array<Billet>


	// Constructeur
	public function __construct($unId,$unNom,$unTelephone, $unSolde){
		$this->idAcheteur=$unId;
		$this->nom=$unNom;
		$this->telephone=$unTelephone;
		$this->solde=$unSolde;
		$this->lesBillets=array();
	}
	
	// Accesseurs et mutateurs
	public function getIdAcheteur() {return $this->idAcheteur;}
	public function getNom() {return $this->nom;}
	public function getTelephone() {return $this->telephone;}
	public function getSolde() {return $this->solde;}
	public function getLesBillets() {return $this->lesBillets;}

	public function setTelephone($valeur) {$this->telephone=$valeur;}

	// Autres méthodes
	public function ajouterBillet($nouveauBillet) { array_push($this->lesBillets,$nouveauBillet); }
	public function chargerSolde($montant) { $this->solde=$this->solde+$montant; }
	public function payerSolde($montant) { $this->solde=$this->solde-$montant; }
	
	// Affichage
	public function __toString(){
		$message=$this->nom." Id: ".$this->idAcheteur."<br/>";
		$message.=" #Téléphone: ".$this->telephone."<br/>";
		$message.=" Solde: ".$this->solde."$<br/><br/>";
		$i=1;
		foreach ($this->lesBillets as $billet) {
			$message.=" billet ".$i.": ".$billet."<br/>";
			$i++;
		}
		return $message;
	}

}
?>






