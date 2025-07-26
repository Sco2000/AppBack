<?php

namespace App\core;

use App\core\App;

class Router
{
    public static function resolveRoute(array $routes): void
    {
        $uri = parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH);

        foreach ($routes as $route => $params) {
            // Trouver toutes les variables {xxx}
            preg_match_all('/\{([a-zA-Z0-9_]+)\}/', $route, $variableNames);
            
            // Remplacer chaque variable par une regex
            $pattern = preg_replace('/\{[a-zA-Z0-9_]+\}/', '([^/]+)', $route);
            $pattern = "#^" . $pattern . "$#";

            if (preg_match($pattern, $uri, $matches)) {
                array_shift($matches); // enlève l'URL complète

                // Charger le contrôleur et la méthode
                $controllerName = $params['controller'];
                $methodName = $params['method'];
                $controller = App::getDependency('controllers', $controllerName);

                // Passer automatiquement tous les arguments trouvés
                $controller->$methodName(...$matches);
                return;
            }
        }
        echo "404 Not Found";
    }
}
