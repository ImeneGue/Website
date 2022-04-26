<?php
    // *****************************************************************************************
 	// Cours       : 420-G16-RO 
	// Session     : H2021, Projet
	// Description : Contrôleur spécifique pour l'action de seConnecter qui s'occupe de récupérer
	//               gérer la connexion d'un utilisateur du site
	// Auteur      : Pierre Coutu
	// Modifié par :
    // *****************************************************************************************
	include_once(DOSSIER_BASE_INCLUDE."controleurs/controleur.abstract.class.php");
	include_once(DOSSIER_BASE_INCLUDE."modele/DAO/UtilisateurDAO.class.php");

	class SeConnecter extends  Controleur {
		
		// ******************* Constructeur vide
		public function __construct() {
			parent::__construct();
		}
		

		// ******************* Méthode exécuter action
		public function executerAction() {
			//----------------------------- VÉRIFIER LA VALIDITÉ DE LA SESSION  -----------
			if ($this->categorieUtilisateur!="visiteur") {
				array_push ($this->messagesErreur,"Vous êtes déjà connécté.");
				return "pageAccueil";
			}
			//----------------------------- VÉRIFIER LA VALIDITÉ DES POSTS ---------------
			if (ISSET($_POST['id_utilisateur']) AND ISSET($_POST['mot_passe'])){ 
				$unUtilisateur=UtilisateurDAO::chercher($_POST['id_utilisateur']);
				if ($unUtilisateur==null) {
					array_push ($this->messagesErreur,"Cet utilisateur n'existe pas.");
					return "pageConnexion";					
				} elseif (!$unUtilisateur->verifierMotPasse($_POST['mot_passe']))  {
					array_push ($this->messagesErreur,"Le mot de passe est incorrect.");
					return "pageConnexion";										
				} else {
					$this->categorieUtilisateur=$unUtilisateur->getCategorie();
					$this->idUtilisateur=$unUtilisateur->getIdUtilisateur();
					$_SESSION['categorieUtilisateur']=$this->categorieUtilisateur;
					$_SESSION['idUtilisateur']=$this->idUtilisateur;
					array_push ($this->messagesSucces," Connexion Reussie");
					return "pageAccueil";
				}
			} else {
				return "pageConnexion";
			}
		}
	}	
	
?>