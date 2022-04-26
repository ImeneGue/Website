<!DOCTYPE html>
<!------------------------------------------------------------------>
<!---- Projet  : H2021                                           --->
<!---- Fichier de test unitaire pour la classe BilletDAO         ---> 
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
	<h1>Fichier de test pour la classe BilletDAO</h1>
	<?php
		// ****** INLCUSIONS *******
		// Importe l'interface DAO et la classe BilletDAO 
		include_once "../DAO/BilletDAO.class.php"; 
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
				<td>chercher un billet </td>
				<td>
					<?php 
                    $unBillet=BilletDAO::chercher(1001);
                    echo $unBillet?$unBillet:"Pas trouvé";
                    echo "<br/>";
                    $unBillet=BilletDAO::chercher(2001);
                    echo $unBillet?$unBillet:"Pas trouvé";
					?>
				</td>
			</tr>
			<tr>
				<td>chercher avec filtre</td>
				<td>
					<?php 
                    $tableau=BilletDAO::chercherAvecFiltre("WHERE id_acheteur=3");
                    foreach($tableau as $unBillet) {
                        echo $unBillet."<br/>";
                    }

					?>
				</td>
			</tr>
            <tr>
				<td>chercher Par id Acheteur</td>
				<td>
					<?php 
                    $tableau=BilletDAO::chercherParIdAcheteur(4);
                    foreach($tableau as $unBillet) {
                        echo $unBillet."<br/>";
                    }

					?>
				</td>
			</tr>
			<tr>
				<td>chercher tous</td>
				<td>
					<?php 
                    $tableau=BilletDAO::chercherTous();
                    foreach($tableau as $unBillet) {
                        echo $unBillet."<br/>";
                    }

					?>
				</td>
			</tr>
			<tr>
				<td>inserer un Billet</td>
				<td>
					<?php 
                    $unBillet=new Billet(1006,2250.00,11,4);
                    BilletDAO::inserer($unBillet);
                    $unBillet=BilletDAO::chercher(1006);
                    echo $unBillet?$unBillet:"Pas trouvé";
					echo BilletDAO::obtenirProchainNumero(); 

					?>
				</td>
			</tr>
			<tr>
				<td>modifier les infos Billets avec le numero de billet: 1006</td>
				<td>
					<?php      
					$unVoyage=VoyageDAO::chercher(15);
					
					$unBillet=new Billet(1006,22.00,3,$unVoyage);
                    BilletDAO::modifier($unBillet);
                    $unBillet=BilletDAO::chercher(1006);
                    echo $unBillet?$unBillet:"Pas trouvé";

					?>
				</td>
			</tr>
			<tr>
				<td>supprimer 999</td>
				<td>
					<?php 
                    BilletDAO::supprimer($unBillet);
                    $unBillet=BilletDAO::chercher(999);
                    echo $unBillet?$unBillet:"Pas trouvé";

					?>
				</td>
			</tr>
			<tr>
				<td>obtenirProchainId </td>
				<td>
					<?php 
                    echo BilletDAO::obtenirProchainNumero();   

					?>
				</td>
			</tr>
			
		</tbody>
	</table>
	<!---- Retour au fichier d'accueil -->
	<h2><a href="../../index.php">Retour à la page d'accueil</a></h2>
</body>
</html>
