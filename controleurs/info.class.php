<?php
    // *****************************************************************************************
	// Description   : Contrôleur spécifique pour toutes les actions non-valides qui rammène à la
	//                 page informations
	// Date          : 10 avril 2021
	// Auteur        : 
	// Modifé par    : IG
    // *****************************************************************************************
	include_once(DOSSIER_BASE_INCLUDE."controleurs/controleur.abstract.class.php");
	include_once(DOSSIER_BASE_INCLUDE."modele/DAO/VoyageDAO.class.php");
	include_once(DOSSIER_BASE_INCLUDE."modele/DAO/InfosVoyageDAO.class.php");
	include_once(DOSSIER_BASE_INCLUDE."modele/DAO/BilletDAO.class.php");

	class info extends  Controleur {
		// ******************* Attributs
        private $tableauVoyage;
		private $infoVoyage;
		private $titre;
		private $photo;
		private $id;


		// ******************* Constructeur vide
		public function __construct() {
			parent::__construct();

		}

		// ******************* Accesseur
		public function getTableauVoyage(){
			return $this->tableauVoyage;
		}

		public function getDestination($id){
			$this->titre=InfosVoyageDAO::chercher($id)->getTitre();
			return $this->titre;
		}

		public function getPhoto($id){	

		$this->photo=InfosVoyageDAO::chercher($id)->getUrlPhoto();
		return $this->photo;
		}


		public function getNombreVol(){
			return count($this->tableauVoyage);
		}

		public function getPrixMoyen(){
			$tab=$this->getTableauVoyage();
			$prixMoyen=0;
			foreach($tab as $voyage){
				$prixMoyen += $voyage->getPrixUnBillet();
				}
			$prixMoyen= $prixMoyen/count($tab);	
			return round($prixMoyen,2)."$";


			
		}

		public function getNbBilletVendu(){
			$billet=BilletDAO::chercherTous();
			return count($billet);
			
		}




		// ******************* Méthode exécuter action
		public function executerAction() {

			$this->tableauVoyage=VoyageDAO::chercherTous();

			// $this->infoVoyage=InfosVoyageDAO::chercher($this->tableauVoyage);
			


			return "pageInfos";
		}
	}
	
?>
