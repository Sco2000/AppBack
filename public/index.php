<?php

echo "Vous avez installé la dépendence de ScoO\n";
echo "Merci et bonne utilisation";

require_once '../vendor/autoload.php';
require_once '../app/config/bootstrap.php';
use App\core\App;

// Charger les dépendances depuis le YAML
App::loadDependenciesFromYaml(__DIR__.'/../app/config/dependencies.yaml');


use App\core\Router;

$routes = Router::resolveRoute($routes);