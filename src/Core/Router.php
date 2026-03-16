<?php

namespace App\Core;

use App\Core\apiRoutes;
use App\Helpers\StringHelper;
use Request;

class Router
{
    private array $routes;

    private StringHelper $stringHelper;

    public function __construct()
    {
        $this->stringHelper = new StringHelper();
    }

    public function get(string $path, $action): void
    {
        $this->addRoute('GET', $path, $action);
    }

    public function post(string $uri, $action): void
    {
        $this->addRoute('POST', $uri, $action);
    }

    public function put(string $uri, $action): void
    {
        $this->addRoute('PUT', $uri, $action);
    }

    public function delete(string $uri, $action): void
    {
        $this->addRoute('DELETE', $uri, $action);
    }

    private function addRoute(string $method, string $path, array $action): void
    {
        $this->routes[] = [
            'method' => $method,
            'path' => $path,
            'action' => $action
        ];
    }

    public function dispatch(Request $request): void
    {
        foreach ($this->routes as $route){
            if ($route['method'] !== strtoupper($request->method)) {
                continue;
            }
            $matchedRoute = $this->matchRoute($route, $request->path);

            if ($matchedRoute[0]) {
                $params = isset($matchedRoute[1]) ? $matchedRoute[1] : [];
                
                $this->callAction($route['action'], $request, $params);

                return;
            }
        }

        http_response_code(404);
        echo '404 - Página não encontrada';
    }

    private function matchRoute(array $route, array $requestPath): array
    {
        $parameters = null;
        $routePath = explode('/', $route['path']);
        array_shift($routePath);

        $requestPath = array_filter($requestPath, function ($path) {
            return !empty($path);
        });


        for ($i = 0; $i < count($requestPath); $i++) {
            if ($routePath[0] !== $routePath[0] || count($routePath) !== count($requestPath)) {
                return [false];
            }

            if (mb_substr($routePath[$i], 0, 1) === '{') {
                $variable = $this->stringHelper->extractVariableFromPath($routePath[$i]);
                $parameters[$variable] = $requestPath[$i];
                continue;
            }
 
            if ($routePath[$i] !== $requestPath[$i]) {
                return [false];
            }
        }

        if ($parameters) {
            return [true, $parameters];
        }

        return [true];
    }

    private function callAction(array $action, Request $request, ?array $params = []): void
    {
        if (count($action) !== 2) {
            throw new \Exception();
        }

        [$controller, $method] = $action;

        if (!class_exists($controller)) {
            throw new \Exception("Controller {$controller} not found.");
        }

        $instance = new $controller();

        if (!method_exists($instance, $method)) {
            throw new \Exception();
        }
    
        //TODO - implementar lógica de instanciar model
        $params = array_values($params);

        call_user_func_array([$instance, $method], array_merge([$request], $params));
        return;
    }
}