# Psydesk

## Présentation du projet

Psydesk est une plateforme intelligente de gestion développée pour faciliter l’organisation des utilisateurs à travers plusieurs services centralisés.

Le projet est composé de deux applications intégrées :

- Une application Java
- Une application Symfony

Les deux applications communiquent ensemble afin d’assurer :
- la centralisation des données,
- la synchronisation des modules,
- une meilleure expérience utilisateur,
- l’intégration de fonctionnalités d’intelligence artificielle.

Le système permet principalement la gestion :
- des utilisateurs,
- des rendez-vous,
- des plannings,
- des événements,
- des articles intelligents,
- des objectifs,
- des réclamations.

---

# Architecture du projet

Le projet repose sur une architecture modulaire distribuée :

```text
Symfony Web Application
        │
        │ API / HTTP Requests
        ▼
Java Application
        │
        ▼
MySQL Database
        │
        ▼
Python AI Services
```

Les modules sont intégrés sur une seule machine afin d’assurer :
- une communication rapide,
- une meilleure synchronisation,
- une gestion centralisée des données.

---

# Fonctionnalités principales

## Module Utilisateur
- Inscription et authentification
- Gestion des profils
- Gestion des rôles
- Sécurité JWT
- OAuth2 Authentication

---

## Module Planning
- Gestion du planning
- Ajout de tâches
- Modification et suppression
- Organisation des horaires
- Synchronisation avec les rendez-vous

---

## Module Rendez-vous
- Création de rendez-vous
- Modification
- Annulation
- Consultation historique
- Gestion des disponibilités

---

## Module Événements

Le module événement permet une gestion complète des événements.

### Fonctionnalités
- Ajout d’événements
- Modification d’événements
- Suppression d’événements
- Recherche d’événements
- Tri des événements
- Liste des événements
- Calendrier dynamique
- Participation aux événements
- Gestion des participations
- Liste des participants

---

## Module Articles Intelligent

Le module Articles représente une plateforme intelligente de gestion de contenu.

### Fonctionnalités
- Publication d’articles
- Consultation des articles
- Recherche d’articles
- Modification et suppression

---

# Intelligence Artificielle intégrée

## Détection des mots inappropriés

Le système utilise un modèle Machine Learning léger entraîné en Python permettant :
- la détection automatique des mots offensants,
- le filtrage intelligent des contenus,
- l’amélioration de la qualité des publications.

Technologies utilisées :
- Scikit-learn
- NLTK
- Pandas
- NumPy

---

## Résumé automatique des articles

Le système utilise :
- l’API Gemini AI pour générer des résumés intelligents,
- un modèle IA local entraîné comme fallback en cas d’échec de l’API Gemini.

Cette architecture garantit :
- la continuité du service,
- une meilleure disponibilité,
- une meilleure performance.

---

## Module Objectifs
- Création d’objectifs
- Suivi des objectifs
- Gestion de progression
- État d’avancement

---

## Module Réclamations
- Ajout de réclamations
- Suivi des demandes
- Gestion des problèmes utilisateurs

---

# Technologies utilisées

## Backend
- Java
- Spring Boot
- PHP
- Symfony

## Frontend
- Twig
- HTML5
- CSS3
- JavaScript

## Base de données
- MySQL

## Intelligence Artificielle
- Python
- Machine Learning
- NLP
- Gemini API

## Sécurité
- JWT Authentication
- OAuth2

## Outils
- Git & GitHub
- Maven
- Composer
- Postman

---

# Installation du projet

## Cloner le projet

```bash
git clone https://github.com/username/psydesk.git
```

---

# Installation Symfony

```bash
# Installer les dépendances
composer install

# OAuth2
composer require knpuniversity/oauth2-client-bundle

# HTTP Client
composer require symfony/http-client

# API
composer require api

# JWT Security
composer require lexik/jwt-authentication-bundle

# Doctrine Doctor
composer require --dev ahmed-bhs/doctrine-doctor
```

---

# Installation Python / IA

```bash
# Gestion des modèles IA
py -3.11 -m pip install joblib

# Gemini API
py -3.11 -m pip install google-generativeai --upgrade

# HTTP Requests
py -3.11 -m pip install requests

# Language Detection
py -3.11 -m pip install langdetect

# NLP
py -3.11 -m pip install nltk

# Machine Learning
py -3.11 -m pip install scikit-learn pandas numpy
```

---

# Installation des datasets NLTK

```python
import nltk

nltk.download('punkt')
nltk.download('stopwords')
nltk.download('wordnet')
nltk.download('omw-1.4')
```

---

# Configuration Base de données

1. Créer une base de données MySQL
2. Importer le fichier SQL
3. Configurer les accès dans :
- `.env`
- `application.properties`

---

# Lancement du projet

## Symfony

```bash
symfony server:start
```

---

## Java

```bash
mvn clean install
mvn spring-boot:run
```

---

## IA Python

```bash
python app.py
```

---

# Structure des modules

| Module | Description |
|--------|-------------|
| User | Gestion des utilisateurs |
| Planning | Gestion du planning |
| Rendez-vous | Gestion des rendez-vous |
| Événements | Gestion complète des événements |
| Articles | Plateforme intelligente d’articles |
| Objectifs | Gestion des objectifs |
| Réclamations | Gestion des réclamations |

---

# Fonctionnalités avancées

| Fonctionnalité | Technologie |
|---------------|-------------|
| Authentification sécurisée | JWT / OAuth2 |
| Résumé automatique | Gemini API |
| IA locale fallback | Python ML |
| Détection mots offensants | NLP |
| Détection de langue | LangDetect |
| Communication inter-applications | API HTTP |

---

# Objectifs du projet

Le projet Psydesk a pour objectif :
- d’améliorer l’organisation des utilisateurs,
- de centraliser les services,
- d’automatiser certaines tâches grâce à l’intelligence artificielle,
- d’offrir une plateforme moderne et intelligente.

---

# Sécurité

Le système implémente :
- JWT Authentication
- OAuth2 Login
- Validation des données
- Contrôle des accès utilisateurs

---

# Qualité du projet

Le projet respecte :
- une architecture modulaire,
- une intégration complète des modules,
- une charte graphique cohérente,
- une communication entre applications,
- une organisation GitHub professionnelle.

---

# Auteurs

Projet réalisé par :

- iyed gharsalli  
- takwa taboui 
- mohamed zouch 
-eya jleli 

---


# Topics / Mots-clés

psydesk, symfony, java, springboot, mysql, php, python, machine-learning, ai, gemini-api, jwt, oauth2, planning, rendezvous, événements, articles, nlp
