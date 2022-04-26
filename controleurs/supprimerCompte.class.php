<?php
    // *****************************************************************************************
	// Description   : Contrôleur spécifique pour toutes les actions non-valides qui rammène à la
	//                 page d'accueil
	// Date          : 10 avril 2021
	// Auteur        : Pierre Coutu
	// Modifé par    : Aucune modification à faire
    // *****************************************************************************************
	include_once(DOSSIER_BASE_INCLUDE."controleurs/controleur.abstract.class.php");
	include_once(DOSSIER_BASE_INCLUDE."modele/DAO/UtilisateurDAO.class.php");
	include_once(DOSSIER_BASE_INCLUDE."modele/DAO/AcheteurDAO.class.php");

	class supprimerCompte extends  Controleur {
		private $tableauUtilisateur;
		private $infoAcheteur;
		
		
		// ******************* Constructeur vide
		public function __construct() {
			parent::__construct();
		}

		public function getInfoUtilisateur(){
			
			return $this->tableauUtilisateur;	
		}
		
		public function getInfoAcheteur($id){
			$this->infoAcheteur = AcheteurDAO::chercher($id);
			return $this->infoAcheteur;	
			
		}




		// ******************* Méthode exécuter action
		public function executerAction() {
			if ($this->categorieUtilisateur!="administrateur") {
				array_push ($this->messagesErreur,"Vous devez etre connecte en administrateur.");
				return "pageAccueil";
			}


			$this->tableauUtilisateur=UtilisateurDAO::chercherTous();
			if (ISSET($_POST['formulaireSuppresion'])) {
				$Utilisateur=UtilisateurDAO::chercher($_POST['id_utilisateur']);
				$acheteur=AcheteurDAO::chercher($_POST['id_utilisateur']);
				AcheteurDAO::supprimer($acheteur);
				UtilisateurDAO::supprimer($Utilisateur);
				array_push ($this->messagesSucces," Suppresion du compte reussie");
				return "pageAccueil";
			} 
			return "pageSupprimerCompte";
		}
	}	
	
?>