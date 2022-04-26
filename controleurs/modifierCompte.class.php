<?php
    // *****************************************************************************************
	// Description   : Contrôleur spécifique pour toutes les actions non-valides qui rammène à la
	//                 page d'accueil
	// Date          : 10 avril 2021
	// Auteur        : Pierre Coutu
	// Modifé par    : Aucune modification à faire
    // *****************************************************************************************
	include_once(DOSSIER_BASE_INCLUDE."controleurs/controleur.abstract.class.php");
	include_once(DOSSIER_BASE_INCLUDE."modele/DAO/AcheteurDAO.class.php");
	include_once(DOSSIER_BASE_INCLUDE."modele/acheteur.class.php");

	class modifierCompte extends  Controleur {
		
		// ******************* Constructeur vide
		public function __construct() {
			parent::__construct();
		}

		// ******************* Méthode exécuter action
		public function executerAction() {
			if ($this->categorieUtilisateur!="acheteur") {
				array_push ($this->messagesErreur,"Vous devez etre connecte avec un compte acheteur.");
				return "pageAccueil";
			}
			
			if (ISSET($_SESSION['idUtilisateur'])){
				$unAcheteur=AcheteurDAO::chercher($_SESSION['idUtilisateur']);
				
				if (ISSET($_POST['telephone']) AND $_POST['telephone']!=""){
					$unAcheteur->setTelephone($_POST['telephone']);
					AcheteurDAO::modifier($unAcheteur);
					array_push ($this->messagesSucces," Modification Téléphone Réussie <br> Nouveau Téléphone : ".$unAcheteur->getTelephone());
				}
				if (ISSET($_POST['montant']) AND $_POST['montant']!=""){
					$unAcheteur->payerSolde($_POST['montant']);
					AcheteurDAO::modifier($unAcheteur);
					array_push ($this->messagesSucces," Paiement Réussie <br> Nouveau Solde : ".$unAcheteur->getSolde());
				}
				return "pageModifierCompte";
			}
			
		}
	}	
	
?>