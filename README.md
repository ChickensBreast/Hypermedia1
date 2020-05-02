# Hypermedia1

Voici les pages
1- Page Accueil

2- Page Connexion (php intégré)

3 - PageDeconnexion (php intégré)

4 - PageInscription

5 - Page Ami (incluant les photos de nos amis) 

6 - Page Photo (page photo personnel, faire demande ami, accepte demande ami, supprimer ami).

Le fichier fichier.js permet d'uploader un fichier sur le serveur (dans le dossier uWamp/www/img).

Le dossier classe contient les classes php (utilisateur, image, commentaire).

Le dossier config contient la configuration de connexion a la base de donnees (root,root,photo). On peut l'importer facilement dans phpmyadmin.

Le dossier dist contient les configurations css et js de boostrap.

Le dossier img cnotient les images utilisés en dans les pages htmls.

Le dossier uploads contient les images sur le serveur (.jpg, .jpeg ...)

Le fichier photo.sql est la base de donnees de base. Quand vous faites insert la cle primaire peut etre auto-increment, donc pas besoin d'insert into table(varAuto, a, b) values ("a", "b", "c"), mais plutot faire insert into table(a,b) values ("a", "b") parce auto increment insert unique automatiquement.
