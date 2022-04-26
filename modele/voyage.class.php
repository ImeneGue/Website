<?php
// *****************************************************************************************
// Description : Classe représentant un Voyage
// Date        : 21 avril 2021
// Auteur      : Gabriel Boisvert
// *****************************************************************************************
class Voyage {
	// Attributs
	private $numeroVoyage;  // int
	private $laDate;       // String
	private $prixUnBillet;      // float
	private $placesTotales;      // int
	private $placesVendues;      // int
	private $infos;      // InfosVoyage


	// Constructeur
	public function __construct($unNumeroVoyage,$uneDate,$unPrix, $desPlacesTotales,$desPlacesVendues, $desInfos){
		$this->numeroVoyage=$unNumeroVoyage;
		$this->laDate=$uneDate;
		$this->prixUnBillet=$unPrix;
		$this->placesTotales=$desPlacesTotales;
		$this->placesVendues=$desPlacesVendues;
		$this->infos=$desInfos;

	}
	
	// Accesseurs et mutateurs
	public function getNumeroVoyage() {return $this->numeroVoyage;}
	public function getLaDate() {return $this->laDate;}
	public function getPrixUnBillet() {return $this->prixUnBillet;}
	public function getPlacesTotales() {return $this->placesTotales;}
	public function getPlacesVendues() {return $this->placesVendues;}
	public function getInfos() {return $this->infos;}

	public function setPrixUnBillet($unPrix) {$this->prixUnBillet=$unPrix;}
	public function setLaDate($uneDate) {$this->laDate=$uneDate;}

	// Autres méthodes
	public function vendreDesPlaces($nombrePlaces) { 
		
		if ($this->calculerPlacesDisponibles()==0) {
			echo "Il ne reste plus de places";
		}elseif (self::calculerPlacesDisponibles()<$nombrePlaces) {
			echo "Il ne reste plus suffisament de places";
		}else{
			$this->placesVendues+=$nombrePlaces;
		}
		; }
	public function calculerPlacesDisponibles() { return $this->placesTotales-$this->placesVendues; }
	
	
	// Affichage
	public function __toString(){
		$message= $this->infos."<br/> Numéro: ".$this->numeroVoyage."<br/>";
		$message.=" Date: ".$this->laDate."<br/>";
		$message.=" Prix: ".$this->prixUnBillet."$<br/>";
		$message.=" Places restantes: ".self::calculerPlacesDisponibles();
		
		return $message;
	}

}
?>


