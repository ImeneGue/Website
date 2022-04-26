<?php
   // *****************************************************************************************
	// Description   : classe contenant la fonction statique qui géère les contrôleurs spécifiques
	// Date          : 18 avril 2020
	// Auteur        : Pierre Coutu
	// Collaborateur : Aucun
    // *****************************************************************************************
	include_once(DOSSIER_BASE_INCLUDE."controleurs/defaut.class.php");
	include_once(DOSSIER_BASE_INCLUDE."controleurs/seConnecter.class.php");
	include_once(DOSSIER_BASE_INCLUDE."controleurs/seDeconnecter.class.php");
	include_once(DOSSIER_BASE_INCLUDE."controleurs/creeCompte.class.php");
	include_once(DOSSIER_BASE_INCLUDE."controleurs/modifierCompte.class.php");
	include_once(DOSSIER_BASE_INCLUDE."controleurs/achat.class.php");
	include_once(DOSSIER_BASE_INCLUDE."controleurs/achat_2.class.php");
	include_once(DOSSIER_BASE_INCLUDE."controleurs/achat_3.class.php");
	include_once(DOSSIER_BASE_INCLUDE."controleurs/achat_4.class.php");
	include_once(DOSSIER_BASE_INCLUDE."controleurs/supprimerCompte.class.php");
	include_once(DOSSIER_BASE_INCLUDE."controleurs/ajouterVol.class.php");
	include_once(DOSSIER_BASE_INCLUDE."controleurs/ajouterVol_2.class.php");
	include_once(DOSSIER_BASE_INCLUDE."controleurs/volDisponible.class.php");
	include_once(DOSSIER_BASE_INCLUDE."controleurs/info.class.php");
	include_once(DOSSIER_BASE_INCLUDE."controleurs/Rechercher.class.php");
	
	class ManufactureControleur {
		//  Méthode qui crée une instance du controleur associé à l'action
		//  et le retourne
		public static function creerControleur($action) {
			$controleur = null;
			if ($action == "voirPageAccueil") {
				$controleur = new Defaut();
			} elseif ($action == "seConnecter") {
				$controleur = new seConnecter();
			} elseif ($action == "seDeconnecter") {
				$controleur = new seDeconnecter();
			}elseif ($action == "creeCompte") {
				$controleur = new creeCompte(); 
			}elseif ($action == "modifierCompte") {
				$controleur = new modifierCompte();
			} elseif ($action == "achatBillet") {
				$controleur = new achatBillet();
			}elseif ($action == "achatBillet_2") {
				$controleur = new achatBillet_2();
			}elseif ($action == "achatBillet_3") {
				$controleur = new achatBillet_3();
			}elseif ($action == "achatBillet_4") {
				$controleur = new achatBillet_4();
			}elseif ($action == "supprimerCompte") {
				$controleur = new supprimerCompte();
			} elseif ($action == "ajoutVol") {
				$controleur = new ajoutVol();
            }elseif ($action == "ajoutVol_2") {
				$controleur = new ajoutVol_2();
            }
			elseif ($action=="voirPageInfos") {
                $controleur = new info();
            }elseif ($action=="RechercheVol") {
                $controleur = new Rechercher();
			} else {
				$controleur = new Defaut();
			}
			return $controleur;
		}
	}
	
?>