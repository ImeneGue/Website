<!DOCTYPE html>
<!------------------------------------------------------------------>
<!---- Projet  : H2021                                           --->
<!---- Fichier de test unitaire pour la classe Acheteur          ---> 
<!---- Auteurs : Gabriel Boisvert                                --->
<!------------------------------------------------------------------>
<html lang="fr">
<head>
	<title>Classe Acheteur test</title>
	<meta charset="utf-8" />
	<link rel="stylesheet" type="text/css" href="../../css/tests.css">
</head>
<body >

	<!---- Création d'un accessoire ---->
	<h1>Fichier de test pour la classe Acheteur</h1>
	<?php
		// ****** INLCUSIONS *******
		// Importe la classe Acheteur 
		include_once "../acheteur.class.php"; 
		include_once "../billet.class.php"; 
		include_once "../infosVoyage.class.php"; 
		include_once "../voyage.class.php";
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
				<td>Constructeur et affichage </td>
				<td>
					<?php 
						$unInfosVoyage=new InfosVoyage(1991,'tokyo','../../images/tokyo.jpg',"Un tour guidé du centre ville de Tokyo");
						$unVoyage=new Voyage(1323,"12/12/2021",1444,1000,500,$unInfosVoyage);
						$unVoyage2=new Voyage(6789,"4/1/2033",32109,1,3,$unInfosVoyage);
						$unBillet=new Billet(1111,199,1111,$unVoyage);
						$unBillet2=new Billet(444,9999,16,$unVoyage2);
						
						$unAcheteur=new Acheteur(1001,'Bob','514-111-1234',100);
						echo $unAcheteur;
					?>
				</td>
			</tr>
			<tr>
				<td>Accesseurs</td>
				<td>
					<?php
						echo $unAcheteur->getIdAcheteur()."<br/>";
						echo $unAcheteur->getNom()."<br/>";
						echo $unAcheteur->getTelephone()."<br/>";
						echo $unAcheteur->getSolde();
					?>
				</td>
			</tr>
			<tr>
				<td>mutateur Telephone et méthode ajouterBillet(tokyo et londre) et pour solde<td>
					<?php
					$i=1;
					$unAcheteur->setTelephone("450-111-1234");
					$unAcheteur->ajouterBillet($unBillet);
					echo $unAcheteur->getTelephone()."<br/>";
					foreach ($unAcheteur->getLesBillets() as $billet) {
						echo " billet ".$i.": ".$billet."<br/>";
						$i++;
						}
					$i=1;
					$unAcheteur->ajouterBillet($unBillet2);
					foreach ($unAcheteur->getLesBillets() as $billet) {
						echo " billet ".$i.": ".$billet."<br/>";
						$i++;
						}
					$unAcheteur->chargerSolde(100);
					echo $unAcheteur->getSolde()."<br/>";
					$unAcheteur->payerSolde(100);
					echo $unAcheteur->getSolde()."<br/>";

					?>
				</td>
			</tr>
			<tr>
				<td>toString avec billet ajouter</td>
				<td>
					<?php
						echo $unAcheteur;
					?>
				</td>
			</tr>
		</tbody>
	</table>
	<!---- Retour au fichier d'accueil -->
	<h2><a href="../../index.php">Retour à la page d'accueil</a></h2>
</body>
</html>
