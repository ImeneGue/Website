<?php
    // *****************************************************************************************
	// Description   : Contrôleur spécifique pour toutes les actions non-valides qui rammène à la
	//                 page d'accueil
	// Date          : 10 avril 2021
	// Auteur        : Kevin Martinez
	// Modifé par    : 
    // *****************************************************************************************
	include_once(DOSSIER_BASE_INCLUDE."controleurs/controleur.abstract.class.php");
	include_once(DOSSIER_BASE_INCLUDE."modele/DAO/VoyageDAO.class.php");
	include_once(DOSSIER_BASE_INCLUDE."modele/DAO/InfosVoyageDAO.class.php");

	class ajoutVol extends  Controleur {
		private $tableauVoyage;


		// ******************* Constructeur vide
		public function __construct() {
			parent::__construct();
		}

		public function getTableauVoyage(){
			$this->tableauVoyage=VoyageDAO::chercherParCodeInfo($_SESSION['code_info']);
			return $this->tableauVoyage;
		}

		public function getDestination(){
			$this->titre=InfosVoyageDAO::chercher($_SESSION['code_info'])->getTitre();
			return $this->titre;
		}


		// ******************* Méthode exécuter action
		public function executerAction() {
			if ($this->categorieUtilisateur!="administrateur") {
				array_push ($this->messagesErreur,"Vous devez etre connecte en administrateur.");
				return "pageAccueil";
			}
			if (ISSET($_SESSION['etapeAjoutVol'])) {
				$_SESSION['etapeAjoutVol']=1;
				if($_SESSION['etapeAjoutVol']==1){
					if (ISSET($_POST['formulaireAjoutVol'])) {
					if(VoyageDAO::chercherParCodeInfo($_POST['inputCode'])==null){
						array_push ($this->messagesErreur,"Code info invalide.");
						$_SESSION['etapeAjoutVol']=1;
						return "PageAjoutVol";
						}
						else{
							$_SESSION['etapeAjoutVol']=2;
							$_SESSION['code_info']=$_POST['inputCode'];
							return "PageAjoutVol_2";
						}
					}
				}
			}
			else{
				$_SESSION['etapeAjoutVol']=1;
				return "PageAjoutVol"; 
			}
			return "PageAjoutVol";
			
		}
	}	
	
?>