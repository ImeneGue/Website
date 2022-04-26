<?php
// *****************************************************************************************
// Description : Classe DAO pour les objets représentant un Billet 
// Date        : 21 avril 2021
// Auteur      : Imene Guellil
// *****************************************************************************************
if (defined("DOSSIER_BASE_INCLUDE") == false) {
    $chemin=(substr($_SERVER['DOCUMENT_ROOT'],-1)=="/")?$_SERVER['DOCUMENT_ROOT']:$_SERVER['DOCUMENT_ROOT']."/";
    define("DOSSIER_BASE_INCLUDE", $chemin."projet_h2021_g16/");
}
include_once(DOSSIER_BASE_INCLUDE."modele/DAO/DAO.interface.php");
include_once(DOSSIER_BASE_INCLUDE."modele/DAO/VoyageDAO.class.php");
include_once(DOSSIER_BASE_INCLUDE."modele/billet.class.php");

class BilletDAO implements DAO {	
		
		
    public static function chercher($cle) { 
        try {
            $connexion=ConnexionBD::getInstance();
        } catch (Exception $e) {
            throw new Exception("Impossible d’obtenir la connexion à la BD."); 
        }
        $unBillet=null; 
        $requete= $connexion->prepare("SELECT * FROM billet WHERE numero_billet=?");
        $requete->execute(array($cle));			
        
        if ($requete->rowCount() > 0) {
            $rangee=$requete->fetch();
            $unBillet=new Billet($rangee['numero_billet'], $rangee['prix_paye'],$rangee['numero_voyage'],$rangee['id_acheteur']);
        }
        $requete-> closeCursor();
        ConnexionBD::close();	
      
        return $unBillet;	 
    } 
    
    static public function chercherAvecFiltre($filtre){ 
        try {
            $connexion=ConnexionBD::getInstance();
        } catch (Exception $e) {
            throw new Exception("Impossible d’obtenir la connexion à la BD."); 
        }
        $liste = array(); 

        $requete= $connexion->prepare("SELECT * FROM billet ".$filtre);

        $requete-> execute();			

        foreach ($requete as $rangee) {
            $unBillet=new Billet($rangee['numero_billet'], $rangee['prix_paye'],$rangee['numero_voyage'],$rangee['id_acheteur']);
            array_push($liste,$unBillet);
        }

        $requete-> closeCursor();
        ConnexionBD::close();	
        
        return $liste;	 
    }


    static public function chercherTous() { 
        return self::chercherAvecFiltre("");
    } 

    static function inserer($unBillet){ 
        try {
            $connexion=ConnexionBD::getInstance();
        } catch (Exception $e) {
            throw new Exception("Impossible d’obtenir la connexion à la BD."); 
        }
        $commandeSQL  = "INSERT INTO billet (numero_billet, prix_paye, numero_voyage, id_acheteur)";  
        $commandeSQL .=  "VALUES (?,?,?,?)";
        
        $requete = $connexion->prepare($commandeSQL);
        $tab = [$unBillet->getNumeroBillet(), $unBillet->getPrixPaye(), $unBillet->getIdAcheteur(), $unBillet->getEvenement()];
        $requete-> execute($tab);
    }

    static public function modifier($unBillet) {
        try {
            $connexion=ConnexionBD::getInstance();
        } catch (Exception $e) {
            throw new Exception("Impossible d’obtenir la connexion à la BD."); 
        }
        $commandeSQL = "UPDATE billet SET prix_paye=?, id_acheteur=?, numero_voyage=? WHERE numero_billet=?";
        $evenement=$unBillet->getEvenement();
        $unNumeroVoyage=intval($evenement->getNumeroVoyage());

        $requete = $connexion->prepare($commandeSQL);

        $tab = [$unBillet->getPrixPaye(), $unBillet->getIdAcheteur(), $unNumeroVoyage, $unBillet->getNumeroBillet()];

        $requete-> execute($tab);

    }
    
    static public function supprimer($unBillet){
        try {
            $connexion=ConnexionBD::getInstance();
        } catch (Exception $e) {
            throw new Exception("Impossible d’obtenir la connexion à la BD."); 
        }
        $commandeSQL = "DELETE FROM billet WHERE numero_billet=?";
        $requete = $connexion->prepare($commandeSQL);
        $requete-> execute([$unBillet->getNumeroBillet()]);
    } 
    
    static public function obtenirProchainNumero(){
        try {
            $connexion=ConnexionBD::getInstance();
        } catch (Exception $e) {
            throw new Exception("Impossible d’obtenir la connexion à la BD."); 
        }
        $commandeSQL = "SELECT numero_billet FROM billet ORDER BY numero_billet DESC";
        $requete = $connexion->prepare($commandeSQL);
        $requete-> execute();
        $prochainNumero=1;
        if ($requete->rowCount()>0) {
            $rangee=$requete->fetch();
            $prochainNumero=$rangee['numero_billet']+1;
        }
        return $prochainNumero;
        
            
    }

    static public function chercherParIdAcheteur($unId) { 
        try {
            $connexion=ConnexionBD::getInstance();
        } catch (Exception $e) {
            throw new Exception("Impossible d’obtenir la connexion à la BD."); 
        }
        $tableau=[];	

        $requete=$connexion->prepare("SELECT * FROM billet WHERE id_acheteur=?");
        $requete->execute(array($unId));

        foreach ($requete as $rangee) {
            $unBillet=new Billet($rangee['numero_billet'], $rangee['prix_paye'],$rangee['numero_voyage'],$rangee['id_acheteur']);							
            array_push($tableau,$unBillet);
        }
        
        $requete-> closeCursor();
        ConnexionBD::close();	
        return $tableau;
    } 

}
?>