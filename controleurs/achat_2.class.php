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

	class AchatBillet_2 extends  Controleur {
		// ******************* Attributs
		private $tableauVoyage;
		private $infoVoyage;
		private $id;
		private $acheteur;
		private $tableauBillet=[];
		private $numeroBillet;
		private $prix;
		private $destination;


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
			
			return $this->destination;
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
			if ($_SESSION['etapeAchatVol']==2) {
					$this->getVoyage();
					$this->destination=InfosVoyageDAO::chercher($this->tableauVoyage[0]->getInfos()) ->getTitre();
					var_dump($this->destination);
					if (ISSET($_POST['nbrBillet'])) {
						if($this->tableauVoyage[0]->calculerPlacesDisponibles() < $_POST['nbrBillet'] ){
							array_push ($this->messagesErreur,"Pas assez de place disponible");
							return "pageAchatBillet_2";
						}
						$_SESSION['nbAcheter'] = $_POST['nbrBillet'];
						$_SESSION['etapeAchatVol']= 3;
						}
						return "pageAchatBillet_3"; 
			}
			
			
			else{
				$_SESSION['etapeAchatVol']=1;
				return "pageAchatBillet"; 
			}
			
		}
		
	}	
	
?>
