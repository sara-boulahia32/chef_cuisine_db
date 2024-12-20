# README - Site Web pour un Chef Cuisinier

## Description du Projet

Ce projet consiste à créer un site web pour un chef cuisinier mondialement reconnu, offrant une expérience gastronomique unique. Le site permet aux utilisateurs (clients) de découvrir les menus exclusifs du chef, de réserver des expériences culinaires à domicile et d'interagir avec le chef via une interface moderne, responsive et sécurisée.

## Objectifs Principaux

Fonctionnalités Multi-Rôles

Utilisateurs (Clients) :

Inscription et connexion.

Consultation des menus et réservation d'expériences culinaires (avec choix de la date, heure et nombre de personnes).

Gestion des réservations : modification ou annulation.

Chefs (Administrateurs) :

Gestion des réservations : accepter, refuser ou consulter les statistiques.

Affichage des statistiques des demandes et gestion du profil.

Design et Expérience Utilisateur

Responsive Design : Compatible avec tous les appareils (mobile, tablette, desktop).

Interface Moderne : Design élégant représentant le luxe et la gastronomie.

UX/UI : Navigation intuitive et expérience utilisateur fluide.

## Fonctionnalités JavaScript

Validation des formulaires avec Regex.

Formulaires dynamiques pour l'ajout de plats dans un menu.

Utilisation de modals dynamiques et SweetAlert pour une meilleure expérience utilisateur.

Sécurité des Données

Hashage des mots de passe pour une connexion sécurisée.

Protection contre les failles XSS et les injections SQL.

Prévention des attaques CSRF.

## Fonctionnalités Bonus

Génération de rapports PDF sur les réservations.

Envoi d'e-mails pour des notifications importantes.

Archivage des plats en cas de rupture de stock.

Page 404 personnalisée.

## Technologies Utilisées

Frontend : HTML5, CSS3, JavaScript

Backend : PHP

Base de données : SQL

Outils supplémentaires : Git, SweetAlert, HTMLPurifier

Organisation du Projet

Modalités Pédagogiques

Travail : Individuel

Durée : 5 jours

## Livrables

Jour 1 :

Diagrammes ERD et UML (use case).

Jour 3 :

Repository GitHub contenant le frontend complet et les diagrammes.

Jour 6 :

Repository GitHub complet avec :

Code source du site.

Fichiers de diagrammes.

Commandes SQL pour la base de données.

README.

## Critères de Performance

Respect des normes W3C.

Code propre et sécurisé.

Bonne présentation et explication des livrables.

Expérience utilisateur optimisée (UI/UX).

## Structure des Dossiers

/Projet-Chef-Cuisinier
|-- /frontend
|   |-- index.html
|   |-- style.css
|   |-- script.js
|
|-- /backend
|   |-- index.php
|   |-- routes.php
|   |-- controllers/
|   |-- models/
|
|-- /database
|   |-- database.sql
|
|-- /assets
|   |-- /images
|   |-- /fonts
|
|-- README.md

## Installation et Exécution

Prérequis

Serveur local comme Laragon, XAMPP ou WAMP.

Navigateur web moderne.

## Instructions

Clonez le repository depuis GitHub :

git clone [https://github.com/your-repo](https://github.com/sara-boulahia32/chef_cuisine_db)

Importez le fichier database.sql dans votre gestionnaire de base de données (ex. phpMyAdmin).

Configurez le fichier config.php pour la connexion à la base de données.

Lancez le projet en plaçant les fichiers dans le dossier racine du serveur local.


## Créateurs

Abdeladim ABID

Pour toute question ou suggestion, veuillez me contacter via : saraboulahia32@example.com
