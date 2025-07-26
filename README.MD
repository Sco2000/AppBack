# AppBack

Ce package fournit une structure d'application PHP modulaire, intégrant :
- Un système de routing simple
- L'injection de dépendances via YAML
- Un accès base de données via PDO
- Un service d'upload d'images avec Cloudinary
- Le chargement de variables d'environnement avec Dotenv

## Installation

Ajoutez la dépendance à votre projet via Composer :

```bash
composer require scoo/appback
```

## Configuration

1. Variables d'environnement
Créez un fichier `.env` à la racine de votre projet et remplissez-le avec vos paramètres :

```dotenv
DB_USER=...
DB_PASS=...
DSN=...
URL=...

CLOUD_NAME=...
API_KEY=...
API_SECRET=...
```
2. Dépendances
Déclarez vos contrôleurs, services et repositories dans app/config/dependencies.yaml.

3. Routing
Définissez vos routes dans routes/route.web.php. Un exemple de route y est défini.

4. Bootstrap
Le point d'entrée (public/index.php) charge automatiquement la configuration et les routes.

## Utilisation
Injection de dépendances : Utilisez App\core\App::getDependency pour instancier vos services, contrôleurs, etc.
Base de données : Utilisez App\core\Database pour accéder à PDO.
Cloudinary : Utilisez App\core\CloudinaryService pour uploader ou supprimer des images.
Helpers : Utilisez App\config\Helpers pour des fonctions utilitaires (dd, redirect, etc).

## Exemple de contrôleur
<?php
use App\core\abstract\AbstractController;

class ExampleController extends AbstractController
{
    public function login($cin)
    {
        // Votre logique ici
        $this->renderJson(['cin' => $cin]);
    }
}

## Structure
app/core/ : cœur du framework (routing, DI, DB, services)
app/config/ : configuration, helpers, bootstrap
routes/ : définition des routes
src/ : vos entités, contrôleurs, services, repositories