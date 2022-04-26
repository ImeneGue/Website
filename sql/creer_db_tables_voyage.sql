CREATE DATABASE vente_billets DEFAULT CHARACTER SET utf8 COLLATE utf8_unicode_ci ;

USE vente_billets ;
    
CREATE TABLE acheteur (
	id_acheteur int(10) NOT NULL,
	nom 		varchar(255) NOT NULL,
	telephone	varchar(255) NOT NULL,
	solde		decimal(8, 2) NOT NULL ,
	CONSTRAINT consommateur_PK PRIMARY KEY (id_acheteur),
	CONSTRAINT telephone_UC UNIQUE (telephone)
) ;

CREATE TABLE utilisateur (
	id_utilisateur		int(255) AUTO_INCREMENT,
	mot_passe 			varchar(255) NOT NULL,
   	categorie 			varchar(255) NOT NULL,
	CONSTRAINT utilisateur_PK PRIMARY KEY (id_utilisateur)
);

CREATE TABLE infos_voyage (
	code_infos 			int(10) NOT NULL,
	titre 			varchar(255) NOT NULL,
   	url_photo 			varchar(255) NOT NULL,
    tour_guide_infos varchar(255) NOT NULL,
	CONSTRAINT code_infos_PK PRIMARY KEY (code_infos)
);

CREATE TABLE voyage (
	numero_voyage	int(11) AUTO_INCREMENT,
	la_date				date,
	prix_un_billet     	decimal(8, 2) NOT NULL,
	places_totales      int(10) NOT NULL,
	places_vendues 		int(10) NOT NULL,
	code_infos 			int(10) NOT NULL,
	CONSTRAINT numero_voyage_PK PRIMARY KEY (numero_voyage),
	CONSTRAINT code_infos_FK FOREIGN KEY (code_infos) REFERENCES infos_voyage(code_infos)
);

CREATE TABLE billet (
	numero_billet 			int(10),
	prix_paye 				decimal(8, 2) NOT NULL,
	numero_voyage 		int(10) NOT NULL,
	id_acheteur			int(10) NOT NULL,
	CONSTRAINT billet_PK PRIMARY KEY (numero_billet),
	CONSTRAINT numero_voyage_FK FOREIGN KEY (numero_voyage) REFERENCES voyage(numero_voyage),
	CONSTRAINT id_acheteur_FK FOREIGN KEY (id_acheteur) REFERENCES acheteur(id_acheteur)
) ;