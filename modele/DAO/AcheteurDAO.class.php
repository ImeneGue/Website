<?php
/* Description : DAO pour la classe acheteur de la BD acheteur
	 * Date        : 21 avril 2021
     * Auteur      : Imene Guellil
	*/

    if (defined("DOSSIER_BASE_INCLUDE") == false) {
		$chemin=(substr($_SERVER['DOCUMENT_ROOT'],-1)=="/")?$_SERVER['DOCUMENT_ROOT']:$_SERVER['DOCUMENT_ROOT']."/";
		define("DOSSIER_BASE_INCLUDE", $chemin."projet_h2021_g16/");
	}
	include_once(DOSSIER_BASE_INCLUDE."modele/DAO/DAO.interface.php");
	include_once(DOSSIER_BASE_INCLUDE."modele/DAO/BilletDAO.class.php");
	include_once(DOSSIER_BASE_INCLUDE."modele/acheteur.class.php");


    class AcheteurDAO implements DAO {

        public static function chercher($cle) { 
			try {
				$connexion=ConnexionBD::getInstance();
			} catch (Exception $e) {
				throw new Exception("Impossible d’obtenir la connexion à la BD."); 
			}
            $unAcheteur=null;

            $requete= $connexion->prepare("SELECT * FROM acheteur WHERE id_acheteur=?");
            $requete->execute(array($cle));
            if ($requete->rowCount() > 0) {
				$rangee=$requete->fetch();
				$unAcheteur=new Acheteur($rangee['id_acheteur'], $rangee['nom'],$rangee['telephone'], $rangee['solde']);
            }
            $requete-> closeCursor();
            ConnexionBD::close();	
              
            return $unAcheteur;	 
            
        }
        static public function chercherAvecFiltre($filtre){ 
			try {
				$connexion=ConnexionBD::getInstance();
			} catch (Exception $e) {
				throw new Exception("Impossible d’obtenir la connexion à la BD."); 
			}
			$liste = array(); 
			$requete= $connexion->prepare("SELECT * FROM acheteur ".$filtre);

			$requete-> execute();			

			foreach ($requete as $rangee) {
				$unAcheteur=new Acheteur($rangee['id_acheteur'], $rangee['nom'],$rangee['telephone'], $rangee['solde']);

				array_push($liste, $unAcheteur);
			}
			
			$requete-> closeCursor();
			ConnexionBD::close();	
			
			return $liste;	 
		} 

        static public function chercherTous() { 
			return self::chercherAvecFiltre("");
		}

        static function inserer($unAcheteur){ 
			try {
				$connexion=ConnexionBD::getInstance();
			} catch (Exception $e) {
				throw new Exception("Impossible d’obtenir la connexion à la BD."); 
			}
			$commandeSQL  = "INSERT INTO acheteur (id_acheteur,nom,telephone,solde) ";  
			$commandeSQL .=  "VALUES (?,?,?,?)";
			
			$requete = $connexion->prepare($commandeSQL);

			$tab = [$unAcheteur->getIdAcheteur(),$unAcheteur->getNom(),$unAcheteur->getTelephone(), $unAcheteur->getSolde()];
			$requete-> execute($tab);
		}

        static public function modifier($unAcheteur) {
			try {
				$connexion=ConnexionBD::getInstance();
			} catch (Exception $e) {
				throw new Exception("Impossible d’obtenir la connexion à la BD."); 
			}
			$commandeSQL = "UPDATE acheteur SET nom=?, telephone=?, solde=? WHERE id_acheteur=?";
			$requete = $connexion->prepare($commandeSQL);

            $tab = [$unAcheteur->getNom(),$unAcheteur->getTelephone(), $unAcheteur->getSolde(),$unAcheteur->getIdAcheteur()];
			$requete-> execute($tab);
		}

        static public function supprimer($unAcheteur){
			try {
				$connexion=ConnexionBD::getInstance();
			} catch (Exception $e) {
				throw new Exception("Impossible d’obtenir la connexion à la BD."); 
			}
			// On prépare la commande Delete
			$commandeSQL = "DELETE FROM acheteur WHERE id_acheteur=?";
			$requete = $connexion->prepare($commandeSQL);
			// On l’exécute
			$requete-> execute([$unAcheteur->getIdAcheteur()]);
		} 

        static public function obtenirProchainId(){
			try {
				$connexion=ConnexionBD::getInstance();
			} catch (Exception $e) {
				throw new Exception("Impossible d’obtenir la connexion à la BD."); 
			}
			// On prépare la commande Delete
			$commandeSQL = "SELECT id_acheteur FROM acheteur ORDER BY id_acheteur DESC";
			$requete = $connexion->prepare($commandeSQL);
			// On l’exécute
			$requete-> execute();
			// Valeur à retourner
			$prochainId=1;
			if ($requete->rowCount() > 0) {
				$rangee=$requete->fetch();
				$prochainId=$rangee['id_acheteur']+1;
			}
			return $prochainId;
			
				
		}















    }
    ?>