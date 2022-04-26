<?php
    // *****************************************************************************************
	// Description   : Classe abstraite parente de toutes les contrôleurs spécifiques
	// Date          : 10 avril 2021
	// Auteur        : Pierre Coutu
	// Collaborateur : Aucun
    // *****************************************************************************************
	abstract class Controleur {
		// ******************* Attributs 
		protected $messagesErreur = array();
		protected $messagesSucces = array();
		protected $categorieUtilisateur= "visiteur";
		protected $idUtilisateur=-1;
		protected $NomUtilisateur="";

		
		// ******************* Constructeur vide
		public function __construct() {
			$this->determinerUtilisateur();
		}
		
		// ******************* Accesseurs 
		public function getMessagesErreur() { 
			return $this->messagesErreur;		
		}

		public function getMessagesSucces() { 
			return $this->messagesSucces;		
		}


		public function getCategorieUtilisateur() { 
			return $this->categorieUtilisateur;		
		}
		public function getIdUtilisateur() { 
			return $this->idUtilisateur;		
		}
		public function getnomUtilisateur() { 
			return $this->nomUtilisateur;		
		}

		// ******************* Méthode abstraite executer action
		// Cette méthode :
		//  - gère la session (s'il y en a une)
		//  - valide les données reçues en POST (s'il y en a)
		//  - effectue le travail requis par l'action (interactions avec les DAO, ...)
		//  - retourne le nom de la vue à appliquer (en format string, sans le chemin(path))
		abstract public function executerAction();
		
		// ****************** Méthode privée
		private function determinerUtilisateur(){
			session_start();
			if (ISSET($_SESSION['categorieUtilisateur']) and ISSET($_SESSION['idUtilisateur'])) {
				$this->categorieUtilisateur=$_SESSION['categorieUtilisateur'];		
				$this->idUtilisateur=$_SESSION['idUtilisateur'];		
			} 
		}
	}
	
?>