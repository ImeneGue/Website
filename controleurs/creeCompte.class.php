<?php
    // *****************************************************************************************
	// Description   : Contrôleur spécifique pour toutes les actions non-valides qui rammène à la
	//                 page d'accueil
	// Date          : 10 avril 2021
	// Auteur        : Pierre Coutu
	// Modifé par    : Aucune modification à faire
    // *****************************************************************************************
	include_once(DOSSIER_BASE_INCLUDE."controleurs/controleur.abstract.class.php");
	include_once(DOSSIER_BASE_INCLUDE."modele\DAO\UtilisateurDAO.class.php");
	include_once(DOSSIER_BASE_INCLUDE."modele\DAO\AcheteurDAO.class.php");


	class creeCompte extends  Controleur {
		// ******************* Attributs
		private $nom;
		private $prenom;
		private $id;
		private $telephone;
		

		// ******************* Constructeur vide
		public function __construct() {
			parent::__construct();

		}

		// ******************* Accesseur
		public function getNextId(){
			return $this->id;
		}

		
		
		// Accesseurs et mutateurs
	


		// ******************* Méthode exécuter action
		public function executerAction() {
				$this->id=UtilisateurDAO::obtenirProchainId();
			if (ISSET($_POST['inputNom'])){ 
				$unUtilisateur=new Utilisateur($this->id,$_POST['mdp'],'acheteur');
				$unAcheteur=new Acheteur($this->id,$_POST['inputNom'],$_POST['telephone'],100.00);
				UtilisateurDAO::inserer($unUtilisateur);
				AcheteurDAO::inserer($unAcheteur);
				array_push ($this->messagesSucces,"Compte Creer");
				return "pageConnexion";
			} else {
				return "pageCreeCompte";
			}


			return "pageCreeCompte";
		}
	}	
	
?>