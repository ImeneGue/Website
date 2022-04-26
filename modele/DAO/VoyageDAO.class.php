<?php
/* Description : DAO pour la classe Voyage de la BD voyage
	 * Date        : 21 avril 2021
     * Auteur      : Imene Guellil
	*/

    if (defined("DOSSIER_BASE_INCLUDE") == false) {
		$chemin=(substr($_SERVER['DOCUMENT_ROOT'],-1)=="/")?$_SERVER['DOCUMENT_ROOT']:$_SERVER['DOCUMENT_ROOT']."/";
		define("DOSSIER_BASE_INCLUDE", $chemin."projet_h2021_g16/");
	}
	include_once(DOSSIER_BASE_INCLUDE."modele/DAO/DAO.interface.php");
	include_once(DOSSIER_BASE_INCLUDE."modele/DAO/InfosVoyageDAO.class.php");
	include_once(DOSSIER_BASE_INCLUDE."modele/voyage.class.php");

    class VoyageDAO implements DAO {		
		
		public static function chercher($cle) { 
			try {
				$connexion=ConnexionBD::getInstance();
			} catch (Exception $e) {
				throw new Exception("Impossible d’obtenir la connexion à la BD."); 
			}
			$unVoyage=null; 
			$requete= $connexion->prepare("SELECT * FROM voyage WHERE numero_voyage=?");
			$requete->execute(array($cle));			
			
			if ($requete->rowCount() > 0) {
				$rangee=$requete->fetch();
				$unVoyage=new Voyage($rangee['numero_voyage'], $rangee['la_date'],$rangee['prix_un_billet'],$rangee['places_totales'],$rangee['places_vendues'],$rangee['code_infos']);
			
            
            }
			$requete-> closeCursor();
			ConnexionBD::close();	
		  
			return $unVoyage;	 
		} 
		
		static public function chercherAvecFiltre($filtre){ 
			try {
				$connexion=ConnexionBD::getInstance();
			} catch (Exception $e) {
				throw new Exception("Impossible d’obtenir la connexion à la BD."); 
			}
			$liste = array(); 
	
			$requete= $connexion->prepare("SELECT * FROM voyage ".$filtre);

			$requete-> execute();			

			foreach ($requete as $rangee) {
				$unVoyage=new Voyage($rangee['numero_voyage'], $rangee['la_date'],$rangee['prix_un_billet'],$rangee['places_totales'],$rangee['places_vendues'],$rangee['code_infos']);
				array_push($liste,$unVoyage);
			}

			$requete-> closeCursor();
			ConnexionBD::close();	
			
			return $liste;	 
		} 

        static public function chercherTous() { 
			return self::chercherAvecFiltre("");
		} 



        static function inserer($unVoyage){ 
			try {
				$connexion=ConnexionBD::getInstance();
			} catch (Exception $e) {
				throw new Exception("Impossible d’obtenir la connexion à la BD."); 
			}
			$commandeSQL  = "INSERT INTO voyage(numero_voyage, la_date, prix_un_billet, places_totales, places_vendues, code_infos)";  
			$commandeSQL .=  "VALUES (?,?,?,?,?,?)";
			$infoUnVoyage=$unVoyage->getInfos();
			$codeInfo=intval($infoUnVoyage->getCodeInfos());
			$requete = $connexion->prepare($commandeSQL);
			$tab = [$unVoyage->getNumeroVoyage(), $unVoyage->getLaDate(),$unVoyage->getPrixUnBillet(), $unVoyage->getPlacesTotales(), $unVoyage->getPlacesVendues(),$codeInfo];
			$requete->execute($tab);
		}

		static public function modifier($unVoyage) {
			try {
				$connexion=ConnexionBD::getInstance();
			} catch (Exception $e) {
				throw new Exception("Impossible d’obtenir la connexion à la BD."); 
			}
			$commandeSQL = "UPDATE voyage SET la_date=?, prix_un_billet=?, places_totales=?,  places_vendues=?,code_infos=? WHERE numero_voyage=?";
			$requete = $connexion->prepare($commandeSQL);
			$tab = [$unVoyage->getLaDate(), $unVoyage->getPrixUnBillet(), $unVoyage->getPlacesTotales(), $unVoyage->getPlacesVendues(), $unVoyage->getInfos(), $unVoyage->getNumeroVoyage()];
			$requete-> execute($tab);
		}
		
		static public function supprimer($unVoyage){
			try {
				$connexion=ConnexionBD::getInstance();
			} catch (Exception $e) {
				throw new Exception("Impossible d’obtenir la connexion à la BD."); 
			}
			$commandeSQL = "DELETE FROM voyage WHERE numero_voyage=?";
			$requete = $connexion->prepare($commandeSQL);
			// On l’exécute
			$requete-> execute([$unVoyage->getNumeroVoyage()]);
		} 
		
		static public function obtenirProchainId(){
			try {
				$connexion=ConnexionBD::getInstance();
			} catch (Exception $e) {
				throw new Exception("Impossible d’obtenir la connexion à la BD."); 
			}
			$commandeSQL = "SELECT numero_voyage FROM voyage ORDER BY numero_voyage DESC";
			$requete = $connexion->prepare($commandeSQL);
			$requete-> execute();
			$prochainId=1;
			if ($requete->rowCount()>0) {
				$rangee=$requete->fetch();
				$prochainId=$rangee['numero_voyage']+1;
			}
			return $prochainId;
			
				
		}

        
        static public function chercherParCodeInfo($unCode) { 
			try {
				$connexion=ConnexionBD::getInstance();
			} catch (Exception $e) {
				throw new Exception("Impossible d’obtenir la connexion à la BD."); 
			}
			$tableau=[];	

			$requete=$connexion->prepare("SELECT * FROM voyage WHERE code_infos=?");
			$requete->execute(array($unCode));

			foreach ($requete as $rangee) {
				$unVoyage=new Voyage($rangee['numero_voyage'], $rangee['la_date'],$rangee['prix_un_billet'],$rangee['places_totales'],$rangee['places_vendues'],$rangee['code_infos']);							
				array_push($tableau,$unVoyage);
			}
			$requete-> closeCursor();
			ConnexionBD::close();	
			return $tableau;
		} 
    


	}
?>