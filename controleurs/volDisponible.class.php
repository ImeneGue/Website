<?php
    // *****************************************************************************************
	// Description   : Contrôleur spécifique pour toutes les actions non-valides qui rammène à la
	//                 page d'accueil
	// Date          : 10 avril 2021
	// Auteur        : Pierre Coutu
	// Modifé par    : Aucune modification à faire
    // *****************************************************************************************
	include_once(DOSSIER_BASE_INCLUDE."controleurs/controleur.abstract.class.php");
	include_once(DOSSIER_BASE_INCLUDE."modele/DAO/VoyageDAO.class.php");
	include_once(DOSSIER_BASE_INCLUDE."modele/DAO/InfosVoyageDAO.class.php");

	class volDisponible extends  Controleur {
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


		// ******************* Méthode exécuter action
		public function executerAction() {

			$this->tableauVoyage=VoyageDAO::chercherTous();

			//$this->infoVoyage=InfosVoyageDAO::chercher($this->tableauVoyage);
			


			return "pageVolDisponible";
		}
	}	
	
?>