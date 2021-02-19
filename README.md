# Projet 5 : OpenClassrooms
## Créez votre premier blog en PHP

Sur mon parcours de Développeur PHP/symfony, il m'a été demandé de créer un blog en PHP, en utilisant une achitecture MVC et programmation orientée objet.

## Description du projet :

Le projet est de développer un blog professionnel, il se décompose en deux groupes de pages :
- la page administrateur sera uniquement accessible aux utilisateurs ayant le role d'admin
- les pages permettants aux visiteurs de naviguer sur le site.

## Le site se décompose comme suit :

- une page accueil permettant de se présenter
- une page listant tous les articles
- une page affichant un article
- une page permettant d'ajouter un commentaire
- une page permettant de valider/supprimer un commentaire
- une page permettant d'ajouter/modifier/supprimer un article
- une page inscription/connexion
- un formulaire de contact
- un lien vers le CV en format pdf
- les liens vers les réseaux sociaux

En fonction des divers statuts des utilisateurs, l'accès aux pages sera restreint :

Le visiteur n'a pas de prérequis : 


- il pourra : 
  - lire les articles
  - lire les commentaires
  - envoyer un message à l'administrateur du blog

L'utilisateur devra être inscrit :

- il pourra (en plus des actions du visiteur) :

  - poster des commentaires


L'administrateur devra avoir le rôle "administrateur"

il aura accès aux mêmes fonctionnalités que l'utilisateur et pourra en plus : 
 - ajouter, modifier, supprimer un article
 - valider, supprimer un commentaire

## Partie développement

Le template utilisé est celui de Bootstrap, le thème choisi est freelancer.  
Le site est réputé responsive.

### Prérequis

Vous devez avoir un serveur web et installer PHP7, composer et Mysql

### Installation

utiliser la BBD que vous trouverez dans le dossier doc : blog.sql  
Pour configurer l'accès à la BDD, allez dans :  model.php
```
git clone https://github.com/Salvatica/Projet5.git
```
```
composer install
```

### Vérification 
Le code a été vérifié par CODACY









