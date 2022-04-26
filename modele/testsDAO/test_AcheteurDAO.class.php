<!DOCTYPE html>
<!------------------------------------------------------------------>
<!---- Projet  : H2021                                           --->
<!---- Fichier de test unitaire pour la classe AcheteurDAO       ---> 
<!---- Auteurs :    Imene Guellil                                --->
<!------------------------------------------------------------------>
<html lang="fr">
<head>
	<title>Tests DAO Projet</title>
	<meta charset="utf-8" />
	<link rel="stylesheet" type="text/css" href="../../css/tests.css">
</head>
<body >

	<!---- Création d'un accessoire ---->
	<h1>Fichier de test pour la classe AcheteurDAO</h1>
	<?php
		// ****** INLCUSIONS *******
		// Importe l'interface DAO et la classe AcheteurDAO 
		include_once "../DAO/AcheteurDAO.class.php"; 
	?>

	<!---- Utilisation et affichage des méthodes -->
	<table>
		<thead>
			<tr>
				<th>Méthode</th>
				<th>Résultat</th>
			</tr>
		</thead>
		<tbody>
			<tr>
				<td>chercher Acheteur </td>
				<td>
					<?php 
                    $unAcheteur=AcheteurDAO::chercher(3);
                    echo $unAcheteur?$unAcheteur:"Pas trouvé";
                    echo "<br/>";
                    $unAcheteur=AcheteurDAO::chercher(204);
                    echo $unAcheteur?$unAcheteur:"Pas trouvé";
					?>
				</td>
			</tr>
			<tr>
				<td>chercher avec filtre</td>
				<td>
					<?php 
                    $tableau=AcheteurDAO::chercherAvecFiltre("WHERE solde=100");
                    foreach($tableau as $unAcheteur) {
                        echo $unAcheteur."<br/>";
                    }

					?>
				</td>
			</tr>
			<tr>
				<td>chercher tous</td>
				<td>
					<?php 
                    $tableau=AcheteurDAO::chercherTous();
                    foreach($tableau as $unAcheteur) {
                        echo $unAcheteur."<br/>";
                    }

					?>
				</td>
			</tr>
			<tr>
				<td>inserer un acheteur</td>
				<td>
					<?php 
                    $unAcheteur=new Acheteur(6,'bob','Mark','5149870485',100.00);
                    AcheteurDAO::inserer($unAcheteur);
                    $unAcheteur=AcheteurDAO::chercher(6);
                    echo $unAcheteur?$unAcheteur:"Pas trouvé";

					?>
				</td>
			</tr>
			<tr>
				<td>modifier un id acheteur </td>
				<td>
					<?php 
                    $unAcheteur->setTelephone('5248749250');
                    $unAcheteur->chargerSolde(100);
                    AcheteurDAO::modifier($unAcheteur);
                    $unAcheteur=AcheteurDAO::chercher(6);
                    echo $unAcheteur?$unAcheteur:"Pas trouvé";

					?>
				</td>
			</tr>
			<tr>
				<td>supprimer 6</td>
				<td>
					<?php 
                    AcheteurDAO::supprimer($unAcheteur);
                    $unAcheteur=AcheteurDAO::chercher(6);
                    echo $unAcheteur?$unAcheteur:"Pas trouvé";

					?>
				</td>
			</tr>
			<tr>
				<td>obtenirProchainId </td>
				<td>
					<?php 
                    echo AcheteurDAO::obtenirProchainId();   

					?>
				</td>
			</tr>
			
		</tbody>
	</table>
	<!---- Retour au fichier d'accueil -->
	<h2><a href="../../index.php">Retour à la page d'accueil</a></h2>
</body>
</html>
