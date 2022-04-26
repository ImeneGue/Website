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
	include_once(DOSSIER_BASE_INCLUDE."modele/DAO/BilletDAO.class.php");
	include_once(DOSSIER_BASE_INCLUDE."modele/DAO/AcheteurDAO.class.php");
	include_once(DOSSIER_BASE_INCLUDE."modele/DAO/VoyageDAO.class.php");
	include_once(DOSSIER_BASE_INCLUDE."modele/DAO/InfosVoyageDAO.class.php");

	class AchatBillet_3 extends  Controleur {
		// ******************* Attributs
		private $tableauVoyage;
		private $infoVoyage;
		private $id;
		private $acheteur;
		private $tableauBillet=[];
		private $numeroBillet;
		private $prix;


		// ******************* Constructeur vide
		public function __construct() {
			parent::__construct();

		}

		// ******************* Accesseur
		public function getVoyage(){
			$this->tableauVoyage=VoyageDAO::chercherAvecFiltre(" WHERE numero_voyage =".$_SESSION['numeroVol']);
			return $this->tableauVoyage;
		}

		public function getTableauBillet(){
			return $this->tableauBillet;
		}

		public function getPrix(){
			$this->prix= $this->tableauVoyage[0]->getPrixUnBillet() *$_SESSION['nbAcheter'];
			return $this->prix;
		}
		

		public function getDestination(){
			$this->titre=InfosVoyageDAO::chercher($this->tableauVoyage[0])->getTitre();
			return $this->titre;
		}

		public function getSolde(){
			return $this->acheteur->getSolde();
		}


		public function enregistrerBillet($acheteur, $voyage){
			$this->numeroBillet =  BilletDAO::obtenirProchainNumero(); 
			$unBillet=new Billet($this->numeroBillet,floatval($voyage->getPrixUnBillet()),intval($voyage->getNumeroVoyage()),intval($_SESSION['idUtilisateur']));
			BilletDAO::inserer($unBillet);
			array_push($this->tableauBillet,$unBillet);

			
		}

		// ******************* Méthode exécuter action
		public function executerAction() {
			if ($this->categorieUtilisateur!="acheteur") {
				array_push ($this->messagesErreur,"Vous devez etre connecte avec un compte acheteur.");
				return "pageAccueil";
			}


			if($_SESSION['etapeAchatVol']== 3 ){
				$this->tableauVoyage=VoyageDAO::chercherAvecFiltre(" WHERE numero_voyage =".$_SESSION['numeroVol']);
				$this->acheteur = AcheteurDAO::chercher($_SESSION['idUtilisateur']);
				if (ISSET($_POST['paiement'])) {
					$_SESSION['choixPaiment'] = $_POST['paiement'];
					if($_SESSION['choixPaiment'] == 'compte'){;
						$prix= $this->tableauVoyage[0]->getPrixUnBillet() *$_SESSION['nbAcheter'];
						$this->acheteur->chargerSolde($prix);
						AcheteurDAO::modifier($this->acheteur);
					}
					for($i=0; $i<$_SESSION['nbAcheter']; $i++){
						$this->enregistrerBillet($this->acheteur,$this->tableauVoyage[0]);
					}
					$this->tableauVoyage[0]->vendreDesPlaces($_SESSION['nbAcheter']);
					VoyageDAO::modifier($this->tableauVoyage[0]);
					$_SESSION['etapeAchatVol']= 4;
					}
					return "pageAchatBillet_4"; 

			}else{
				$_SESSION['etapeAchatVol']=1;
				return "pageAchatBillet"; 
			}
			
		}
		
	}	
	
?>
