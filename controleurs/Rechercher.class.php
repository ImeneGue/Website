<?php
    // *****************************************************************************************
	// Description   : Contrôleur spécifique pour toutes les actions non-valides qui rammène à la
	//                 page d'accueil
	// Date          : 
	// Auteur        : I G
	// Modifé par    : I G
    // *****************************************************************************************
	include_once(DOSSIER_BASE_INCLUDE."controleurs/controleur.abstract.class.php");
	include_once(DOSSIER_BASE_INCLUDE."modele/DAO/VoyageDAO.class.php");
	include_once(DOSSIER_BASE_INCLUDE."modele/DAO/InfosVoyageDAO.class.php");
	include_once(DOSSIER_BASE_INCLUDE."modele/infosVoyage.class.php");

	class Rechercher extends  Controleur {
		// ******************* Attributs
		private $tableauVoyage;
		private $infoVoyage="";
		private $titre;
		private $photo;
		private $id;
		private $infos;
		private $guide;
		private $recherche = [];


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
    public function getGuide($id){	
		$this->guide=InfosVoyageDAO::chercher($id)->getTourGuideInfo();
		return $this->guide;
	}
   

		// ******************* Méthode exécuter action
public function executerAction() {
	if(ISSET($_POST['formulaireRechercheVol'])){
            if (ISSET($_POST['prix_un_billet']) && $_POST['prix_un_billet']!=Null) {
                $prix=$_POST['prix_un_billet'];
            	array_push($this->recherche ," prix_un_billet <='".$prix."'");
            }
            if (ISSET($_POST['code_infos']) && $_POST['code_infos']!=Null) {
                array_push($this->recherche,"  `code_infos` =".$_POST['code_infos']);
            }
            if (ISSET($_POST['titre']) && $_POST['titre']!=Null){
                $titre = $_POST['titre'];
				if ($_POST['titre']!=Null){
					$titre = $_POST['titre'];
					$infoVoyage=InfosVoyageDAO::chercherAvecFiltre("WHERE titre ='".$titre."'");
					$code=intval($infoVoyage[0]->getCodeInfos());
					$this->tableauVoyage=VoyageDAO::chercherAvecFiltre("WHERE code_infos ='".$code."'");
					array_push($this->recherche," code_infos ='".$code."'");
	
				}
            }
            
            if (ISSET($_POST['dateVoyage1']) && ISSET($_POST['dateVoyage2']) && $_POST['dateVoyage1']!=Null && $_POST['dateVoyage2']!=Null){
                date_default_timezone_set('America/Toronto');
                $date1=strtotime($_POST['dateVoyage1']);
                    $date2=strtotime($_POST['dateVoyage2']);
                    $dateFormat1 = date('Y-m-d',$date1);
                    $dateFormat2 = date('Y-m-d',$date2);
					array_push($this->recherche,"la_date BETWEEN '".$dateFormat1."' AND '".$dateFormat2."'");
                }
            
			$donnes=0;
			foreach($this->recherche as $message){
				if($donnes==0){
					$this->infoVoyage.="WHERE ".$message;
					$donnes=1;
				}else{
					$this->infoVoyage.=" AND ".$message;
				}
				
			}
	
			$this->tableauVoyage=VoyageDAO::chercherAvecFiltre($this->infoVoyage);
			}
        
            return "pageRechercheVol";
        
}   
         
        
            
        
			
		
	}	
    
?>
