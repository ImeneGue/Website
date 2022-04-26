USE vente_billets;

# 5enregistrements,dont 3avec la catégorie«acheteur»et2avec la catégorie «administrateur».Utilisez «root»pour tous les mots de passe.
# INSERT INTO utilisateur VALUES ('id_utilisateur','mot_passe','categorie');
INSERT INTO utilisateur VALUES (1,'root', 'administrateur');
INSERT INTO utilisateur VALUES (2,'root', 'administrateur');
INSERT INTO utilisateur VALUES (3,'root' , 'acheteur');
INSERT INTO utilisateur VALUES (4,'root' , 'acheteur');
INSERT INTO utilisateur VALUES (5,'root' , 'acheteur');

# 3enregistrements, soit les 3 avec le même id que dansla table utilisateur.Placez un solde de 100dollars au premier enregistrement.
# INSERT INTO consommateur VALUES ('id_acheteur', 'nom', telephone, solde);
INSERT INTO acheteur VALUES (3,'Frodo','514-129-3214', 100);
INSERT INTO acheteur VALUES (4,'Aragorn','450-557-1234', 100);
INSERT INTO acheteur VALUES (5,'Gandalf','438-443-7898', 100);

# 4 enregistrements 
# INSERT INTO chien VALUES (code_infos, 'titre','url_photo');
INSERT INTO infos_voyage VALUES (101, 'Japan','../images/Tokyo.png','https://Agence-Tokyo-Star.com');
INSERT INTO infos_voyage VALUES (102, 'Angleterre', '../images/Londre.png','https://tourisme-Londres.com');
INSERT INTO infos_voyage VALUES (103, 'Thailand', '../images/Bangkok.png','https://Bangkok-travels-agency.com');
INSERT INTO infos_voyage VALUES (104, 'France', '../images/Paris.png','https://private-tours-paris.com');


# 6 enregistrements. Placez 5 billets venduspour le premier de ces enregistrements.Ne placez 2 foi pas la mêmedate pour un même évènement, spectacle, match, ....
# INSERT INTO pret VALUES (numero_voyage, la_date, prix_un_billet, place_totales, place_vendues, code_infos) ;
INSERT INTO voyage VALUES (11, '2021-10-07', 2099, 1000, 555, 102) ;
INSERT INTO voyage VALUES (12, '2021-11-08', 1290, 666, 333, 103) ;
INSERT INTO voyage VALUES (13, '2021-12-03', 5000, 420, 325, 101) ;
INSERT INTO voyage VALUES (14, '2021-8-09', 4232, 777, 770, 101) ;
INSERT INTO voyage VALUES (15, '2021-9-23', 1999, 500, 33, 104) ;

# 5 enregistrements liés aupremierenregistrement de VotreTable, dont3 billets au premieracheteur, les autres répartis comme vous le voulez
# INSERT INTO pret VALUES (numero_billet, prix_paye, numero_voyage, id_acheteur) ;
INSERT INTO billet VALUES (1001, 2099, 11, 3) ;
INSERT INTO billet VALUES (1002, 2099, 11, 3) ;
INSERT INTO billet VALUES (1003, 2099, 11, 3) ;
INSERT INTO billet VALUES (1004, 2099, 11, 4) ;
INSERT INTO billet VALUES (1005, 2099, 11, 4) ;
