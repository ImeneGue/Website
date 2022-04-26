<?php
	/* *************************************
	Cours 420-G16-RO
	Session H2021
	Projet Groupe 1
	Auteur      : 
	**************************************** */	

	/* *******************************************
		Fonctions d'affichage des options du menu
	********************************************** */
	function afficherMenu($categorieUtilisateur) {
		// ========== Définition du tableau avec clé/valeurs représentant options/hyperlien
		$tableauOptions=[];
		$tableauOptions["Accueil"]=DOSSIER_BASE_LIENS."/index.php?action=voirPageAccueil";
        $tableauOptions["Informations"]=DOSSIER_BASE_LIENS."/index.php?action=voirPageInfos";
        $tableauOptions["Voyages"]=DOSSIER_BASE_LIENS."/index.php?action=RechercheVol";
		if ($categorieUtilisateur=="visiteur") {
			$tableauOptions["Connexion"]=DOSSIER_BASE_LIENS."/index.php?action=seConnecter";
			$tableauOptions["Cree Compte"]=DOSSIER_BASE_LIENS."/index.php?action=creeCompte";
			
		}
		elseif ($categorieUtilisateur=="acheteur") {
			$tableauOptions["Deconnexion"]=DOSSIER_BASE_LIENS."/index.php?action=seDeconnecter";
			$tableauOptions["Modifier Compte"]=DOSSIER_BASE_LIENS."/index.php?action=modifierCompte";
			$tableauOptions["Acheter Vol"]=DOSSIER_BASE_LIENS."/index.php?action=achatBillet";

		}
		elseif ($categorieUtilisateur=="administrateur") {
			$tableauOptions["Deconnexion"]=DOSSIER_BASE_LIENS."/index.php?action=seDeconnecter";
			$tableauOptions["Suppresion Compte"]=DOSSIER_BASE_LIENS."/index.php?action=supprimerCompte";
			$tableauOptions["Ajouter des vols"]=DOSSIER_BASE_LIENS."/index.php?action=ajoutVol";

		}
		foreach ($tableauOptions as $option => $hyperlien) {
            // echo "<ul class='navbar-nav'> ";
			echo " <li class='nav-item'> ";
			echo "<a class='nav-link' href='$hyperlien'>$option</a>";  
			echo "</li>";
		}
		


	}
	/* *******************************************
		Fonctions d'affichage des messages d'erreurs
	********************************************** */
	function afficherErreurs($tableauErreurs) {
		if (Count($tableauErreurs)!=0) {
            echo "<br><div class='alert-success container text-monospace table-responsive-md'>";
			echo "<h3> Message d'erreurs</h3>";
			echo "<ul '>";
			foreach ($tableauErreurs as $erreur) {
				echo "<li> $erreur</li>";
			}
			echo "</ul>";
			echo "</div>" ; 

	}

	function afficherSucces($tableauSucces) {
		if (Count($tableauSucces)!=0) {
			echo "<br><div class='alert-success'>";
			echo "<h3> Message de succes</h3>";
			echo "<ul '>";
			foreach ($tableauSucces as $succes) {
				echo "<li> $succes</li>";
			}
			echo "</ul>";
			echo "</div>" ; 
		}

	}


}
    

   
	


?>
