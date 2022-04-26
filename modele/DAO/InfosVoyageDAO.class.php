<?php
/* Description : DAO pour la classe infosVoyage de la BD voyage
	 * Date        : 21 avril 2021
     * Auteur      : Imene Guellil
	*/

    if (defined("DOSSIER_BASE_INCLUDE") == false) {
		$chemin=(substr($_SERVER['DOCUMENT_ROOT'],-1)=="/")?$_SERVER['DOCUMENT_ROOT']:$_SERVER['DOCUMENT_ROOT']."/";
		define("DOSSIER_BASE_INCLUDE", $chemin."projet_h2021_g16/");
	}
	include_once(DOSSIER_BASE_INCLUDE."modele/DAO/DAO.interface.php");
	include_once(DOSSIER_BASE_INCLUDE."modele/infosVoyage.class.php");

    class InfosVoyageDAO implements DAO {	
		
		
		public static function chercher($cle) { 
			try {
				$connexion=ConnexionBD::getInstance();
			} catch (Exception $e) {
				throw new Exception("Impossible d’obtenir la connexion à la BD."); 
			}
			$lesInfosVoyage=null; 
			$requete= $connexion->prepare("SELECT * FROM infos_voyage WHERE code_infos=?");
			$requete->execute(array($cle));			
			
			if ($requete->rowCount() > 0) {
				$rangee=$requete->fetch();
				$lesInfosVoyage=new InfosVoyage($rangee['code_infos'], $rangee['titre'],$rangee['url_photo'],$rangee['tour_guide_infos']);
			}
			$requete-> closeCursor();
			ConnexionBD::close();	
		  
			return $lesInfosVoyage;	 
		} 
		
		static public function chercherAvecFiltre($filtre){ 
			try {
				$connexion=ConnexionBD::getInstance();
			} catch (Exception $e) {
				throw new Exception("Impossible d’obtenir la connexion à la BD."); 
			}
			$liste = array(); 
	
			$requete= $connexion->prepare("SELECT * FROM infos_voyage ".$filtre);

			$requete-> execute();			

			foreach ($requete as $rangee) {
				$lesInfosVoyage=new InfosVoyage($rangee['code_infos'], $rangee['titre'],$rangee['url_photo'],$rangee['tour_guide_infos']);
				array_push($liste,$lesInfosVoyage);
			}

			$requete-> closeCursor();
			ConnexionBD::close();	
			
			return $liste;	 
		} 

        static public function chercherTous() { 
			return self::chercherAvecFiltre("");
		} 
    
        static function inserer($lesInfosVoyage){ 
			try {
				$connexion=ConnexionBD::getInstance();
			} catch (Exception $e) {
				throw new Exception("Impossible d’obtenir la connexion à la BD."); 
			}
			$commandeSQL  = "INSERT INTO infos_voyage (code_infos, titre, url_photo, tour_guide_infos)";  
			$commandeSQL .=  "VALUES (?,?,?,?)";
			
			$requete = $connexion->prepare($commandeSQL);
			$tab = [$lesInfosVoyage->getCodeInfos(), $lesInfosVoyage->getTitre(), $lesInfosVoyage->getUrlPhoto(), $lesInfosVoyage->getTourGuideInfo()];
			$requete-> execute($tab);
		}

		static public function modifier($lesInfosVoyage) {
			try {
				$connexion=ConnexionBD::getInstance();
			} catch (Exception $e) {
				throw new Exception("Impossible d’obtenir la connexion à la BD."); 
			}
			$commandeSQL = "UPDATE infos_voyage SET titre=?, url_photo=?, tour_guide_infos=? WHERE code_infos=?";
			$requete = $connexion->prepare($commandeSQL);
			$tab = [$lesInfosVoyage->getTitre(), $lesInfosVoyage->getUrlPhoto(), $lesInfosVoyage->getTourGuideInfo(), $lesInfosVoyage->getCodeInfos()];
			$requete-> execute($tab);
		}
		
		static public function supprimer($lesInfosVoyage){
			try {
				$connexion=ConnexionBD::getInstance();
			} catch (Exception $e) {
				throw new Exception("Impossible d’obtenir la connexion à la BD."); 
			}
			$commandeSQL = "DELETE FROM infos_voyage WHERE code_infos=?";
			$requete = $connexion->prepare($commandeSQL);
			$requete-> execute([$lesInfosVoyage->getCodeInfos()]);
		} 
		
		static public function obtenirProchainId(){
			try {
				$connexion=ConnexionBD::getInstance();
			} catch (Exception $e) {
				throw new Exception("Impossible d’obtenir la connexion à la BD."); 
			}
			$commandeSQL = "SELECT code_infos FROM infos_voyage ORDER BY code_infos DESC";
			$requete = $connexion->prepare($commandeSQL);
			$requete-> execute();
			$prochainId=1;
			if ($requete->rowCount()>0) {
				$rangee=$requete->fetch();
				$prochainId=$rangee['code_infos']+1;
			}
			return $prochainId;
			
				
		}
    
	}
?>
