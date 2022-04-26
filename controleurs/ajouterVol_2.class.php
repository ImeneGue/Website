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

	class ajoutVol_2 extends  Controleur {
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
			// si on arrive d'une autre étape et que les données sont initialisées
			if($_SESSION['etapeAjoutVol']==2){
				if (ISSET($_POST['numeroVol'])) {
					if(VoyageDAO::chercher($_POST['numeroVol'])==NULL){
						$lesInfosVoyage=InfosVoyageDAO::chercher($_SESSION['code_info']); 
						$voyage= new Voyage($_POST['numeroVol'],$_POST['dateVoyage'],$_POST['prixVol'],$_POST['placeTotal'],$_POST['placeVendu'],$lesInfosVoyage);
						VoyageDAO::inserer($voyage);
						array_push ($this->messagesSucces,"Vol ajouter");
						return "PageAjoutVol_2";
					}
					else{
						
						array_push ($this->messagesErreur,"Numero de vol deja attribuer");
						return "PageAjoutVol_2";
					}
				}
				elseif(ISSET($_POST['formulaireRetour'])){
					$_SESSION['etapeAjoutVol']=1;
					unset($_SESSION['code_info']);
					return "PageAjoutVol";
				}
			

			}
			return "PageAjoutVol";
			
		}
	}	
	
?>