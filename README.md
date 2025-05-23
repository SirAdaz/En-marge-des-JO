# 🏅 En-marge-des-JO

Un projet réalisé avec Symfony et Twig. Cette application permet de consulter les associations et événements liés aux Jeux Olympiques de Paris.

## 🎯 Objectif

L’objectif est de créer une application complète permettant de gérer et visualiser les événements et associations autour des JO de Paris.

## 🚀 Technologies utilisées

- **Symfony**
- **PHP**
- **Twig**
- **Doctrine ORM**
- **JavaScript**
- **Base de données (MySQL)**

## 🖥️ Fonctionnalités

- Consultation des associations et événements liés aux JO
- Calendrier interactif affichant les événements
- Création et gestion de compte utilisateur
- Panel administrateur pour gérer les données
- Gestion des rôles et permissions

## 🛠️ Installation

1. Clone ce dépôt :
   ```bash
   git clone https://github.com/SirAdaz/En-marge-des-JO.git
   ```
2. Installe les dépendances avec Composer :
   ```bash
   composer install
   ```
3. Configure ta base de données dans le fichier `.env`
4. Lance les migrations :
   ```bash
   php bin/console doctrine:migrations:migrate
   ```
5. Lance le serveur local :
   ```bash
   symfony serve
   ```
6. Ouvre `http://localhost:8000` dans ton navigateur.

## Auteur

- **SirAdaz** – [GitHub](https://github.com/SirAdaz)
- **elyayus** – [GitHub](https://github.com/elyayus)
