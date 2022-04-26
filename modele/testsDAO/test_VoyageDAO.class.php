<!DOCTYPE html>
<!------------------------------------------------------------------>
<!---- Projet  : H2021                                           --->
<!---- Fichier de test unitaire pour la classe VoyageDAO    ---> 
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
	<h1>Fichier de test pour la classe VoyageDAO</h1>
	<?php
		// ****** INLCUSIONS *******
		// Importe l'interface DAO et la classe VoyageDAO 
		include_once "../DAO/VoyageDAO.class.php"; 
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
				<td>chercher voyage </td>
				<td>
					<?php 
                    $unVoyage=VoyageDAO::chercher(11);
                    echo $unVoyage?$unVoyage:"Pas trouvé";
                    echo "<br/>";
                    $unVoyage=VoyageDAO::chercher(15);
                    echo $unVoyage?$unVoyage:"Pas trouvé";
					?>
				</td>
			</tr>
			<tr>
				<td>chercher avec filtre WHERE numero_voyage=13</td>
				<td>
					<?php 
                    $tableau=VoyageDAO::chercherAvecFiltre("WHERE numero_voyage=13");
                    foreach($tableau as $unVoyage) {
                        echo $unVoyage."<br/>";
                    }

					?>
				</td>
			</tr>
            <tr>
				<td>chercher Par code infos "102"</td>
				<td>
					<?php 

                    $tableau=VoyageDAO::chercherParCodeInfo(102);
                     foreach($tableau as $unVoyage) {
                        echo $unVoyage."<br/>";
                    }
					?>
				</td>
			</tr>
			<tr>
				<td>chercher tous</td>
				<td>
					<?php 
                    $tableau=VoyageDAO::chercherTous();
                    foreach($tableau as $unVoyage) {
                        echo $unVoyage."<br/>";
                    }

					?>
				</td>
			</tr>
			<tr>
				<td>inserer un Voyage</td>
				<td>
					<?php 
					$lesInfosVoyage=InfosVoyageDAO::chercher(104);

                    $unVoyage=new Voyage(16,'2033-12-30',2200,230,200,$lesInfosVoyage);

                    VoyageDAO::inserer($unVoyage);
                    $unVoyage=VoyageDAO::chercher(16);
                    echo $unVoyage?$unVoyage:"Pas trouvé";
                    
					?>
				</td>
			</tr>
			<tr>
				<td>modifier les infos voyages avec le code infos: 999</td>
				<td>
					<?php 
                    $unVoyage->setPrixUnBillet(2500.00);
                    $unVoyage->setLaDate('2021-12-15');
                   
                    VoyageDAO::modifier($unVoyage);
                    $unVoyage=VoyageDAO::chercher(16);
                    echo $unVoyage?$unVoyage:"Pas trouvé";

					?>
				</td>
			</tr>
			<tr>
				<td>supprimer 999</td>
				<td>
					<?php 
                    VoyageDAO::supprimer($unVoyage);
                    $unVoyage=VoyageDAO::chercher(16);
                    echo $unVoyage?$unVoyage:"Pas trouvé";
					
					?>
				</td>
			</tr>
			<tr>
				<td>obtenirProchainId </td>
				<td>
					<?php 
                    echo VoyageDAO::obtenirProchainId();   

					?>
				</td>
			</tr>
			

			
		</tbody>
	</table>
	<!---- Retour au fichier d'accueil -->
	<h2><a href="../../index.php">Retour à la page d'accueil</a></h2>
</body>
</html>
