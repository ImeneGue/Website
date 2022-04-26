<?php
// *****************************************************************************************
// Description : Classe DAO pour les objets/tales représentant un utilisateur connecté au site
// Date        : 18 avril 2021
// Auteur      : Pierre Coutu
// *****************************************************************************************
	if (defined("DOSSIER_BASE_INCLUDE") == false) {
		$chemin=(substr($_SERVER['DOCUMENT_ROOT'],-1)=="/")?$_SERVER['DOCUMENT_ROOT']:$_SERVER['DOCUMENT_ROOT']."/";
		define("DOSSIER_BASE_INCLUDE", $chemin."projet_h2021_g16/");
	}
	// Importe l'interface DAO et la classe Utilisateur
	include_once(DOSSIER_BASE_INCLUDE."modele/DAO/DAO.interface.php");
	include_once(DOSSIER_BASE_INCLUDE."modele/utilisateur.class.php");
	

	class UtilisateurDAO implements DAO {	
		// Cette méthode doit retourner l'objet dont la clé primaire a été reçu en paramètre
		// Notes : 1) On retourne null si non-trouvé, 
		
		public static function chercher($cle) { 
			try {
				$connexion=ConnexionBD::getInstance();
			} catch (Exception $e) {
				throw new Exception("Impossible d’obtenir la connexion à la BD."); 
			}
			// valeur par défaut pour la variable à retourner si non-trouvée
			$leUtilisateur=null; 
			
			// Préparer une requête de type PDOStatement avec des paramètres SQL	
			$requete= $connexion->prepare("SELECT * FROM utilisateur WHERE id_utilisateur=?");
		  
			// Exécuter la requête
			$requete->execute(array($cle));			
			
			// Analyser l’rangee, s’il existe, et créer l’instance du Utilisateur
			// note on pourait aussi lancer une exception si on a plus d’un résultat …
			if ($requete->rowCount() > 0) {
				$rangee=$requete->fetch();
				$leUtilisateur=new Utilisateur($rangee['id_utilisateur'], $rangee['mot_passe'],$rangee['categorie']);
			}
			// fermer le curseur de la requête et la connexion à la BD
			$requete-> closeCursor();
			ConnexionBD::close();	
		  
			return $leUtilisateur;	 
		} 
		
		// Cette méthode doit retourner une liste de tous les objets reliés à la table de la BD
		static public function chercherTous() { 
			return self::chercherAvecFiltre("");
		} 
		
		// Comme la méthode chercherTous, mais en applicant le filtre (clause WHERE ...) reçue en param.
		static public function chercherAvecFiltre($filtre){ 
			try {
				$connexion=ConnexionBD::getInstance();
			} catch (Exception $e) {
				throw new Exception("Impossible d’obtenir la connexion à la BD."); 
			}
			// initialisation du tableau vide
			$liste = array(); 
				
			// Préparer une requête de type PDOStatement avec des paramètres SQL	
			$requete= $connexion->prepare("SELECT * FROM utilisateur ".$filtre);

			// Exécuter la requête
			$requete-> execute();			

			// Analyser les enristrements s'il y en a 
			foreach ($requete as $rangee) {
				$leUtilisateur=new Utilisateur($rangee['id_utilisateur'], $rangee['mot_passe'],$rangee['categorie']);
				array_push($liste, $leUtilisateur);
			}
			// fermer le curseur de la requête et la connexion à la BD
			$requete-> closeCursor();
			ConnexionBD::close();	
			
			return $liste;	 
		} 

		// Cette méthode insère l'objet reçu en paramètre dans la table
		static function inserer($unUtilisateur){ 
			// on essaie d’établiur la connexion
			try {
				$connexion=ConnexionBD::getInstance();
			} catch (Exception $e) {
				throw new Exception("Impossible d’obtenir la connexion à la BD."); 
			}
			// On prépare la commande insert
			$commandeSQL  = "INSERT INTO utilisateur(id_utilisateur,mot_passe,categorie)";  
			$commandeSQL .=  "VALUES (?,?,?)";
			
			$requete = $connexion->prepare($commandeSQL);

			// On l’exécute
			$tab = [$unUtilisateur->getIdUtilisateur(), $unUtilisateur->getMotPasse(), $unUtilisateur->getCategorie()];
			$requete->execute($tab);
		}

		// Cette méthode modifie tous les champs (non-clé primaire) de l'objet reçu en paramètre dans la table
		static public function modifier($unUtilisateur) {
			try {
				$connexion=ConnexionBD::getInstance();
			} catch (Exception $e) {
				throw new Exception("Impossible d’obtenir la connexion à la BD."); 
			}
			// On prépare la commande Update
			$commandeSQL = "UPDATE utilisateur SET mot_passe=?, categorie=? WHERE id_utilisateur=?";
			$requete = $connexion->prepare($commandeSQL);
			// On l’exécute
			$tab = [$unUtilisateur->getMotPasse(),$unUtilisateur->getCategorie(),$unUtilisateur->getIdUtilisateur()];
			$requete-> execute($tab);
		}

		// Cette méthode supprime l'objet reçu en paramètre de la table
		static public function supprimer($unUtilisateur){
			try {
				$connexion=ConnexionBD::getInstance();
			} catch (Exception $e) {
				throw new Exception("Impossible d’obtenir la connexion à la BD."); 
			}
			// On prépare la commande Delete
			$commandeSQL = "DELETE FROM utilisateur WHERE id_utilisateur=?";
			$requete = $connexion->prepare($commandeSQL);
			// On l’exécute
			$requete-> execute([$unUtilisateur->getIdUtilisateur()]);
		} 
		
		// Retourne le prochain id disponible
		static public function obtenirProchainId(){
			try {
				$connexion=ConnexionBD::getInstance();
			} catch (Exception $e) {
				throw new Exception("Impossible d’obtenir la connexion à la BD."); 
			}
			// On prépare la commande Delete
			$commandeSQL = "SELECT id_utilisateur FROM utilisateur ORDER BY id_utilisateur DESC";
			$requete = $connexion->prepare($commandeSQL);
			// On l’exécute
			$requete-> execute();
			// Valeur à retourner
			$prochainId=1;
			if ($requete->rowCount() > 0) {
				$rangee=$requete->fetch();
				$prochainId=$rangee['id_utilisateur']+1;
			}
			return $prochainId;
			
				
		}
		
		
		
	}
	
?>