<?php

declare(strict_types=1);

namespace Framework;

class Router
{
    private array $routes = [];

    public function add(string $method, string $path, array $controller): void
    {
        $this->routes[] = [
            'path' => $this->normalizePath($path),
            'method' => strtoupper($method),
            'controller' => $controller,
        ];
    }

    private function normalizePath(string $path): string
    {
        $path = trim($path, '/');
        $path = "/{$path}/";
        $path = preg_replace('#[/]{2,}#', '/', $path);
        return $path;
    }

    public function dispatch(string $path, string $method, ?Container $container = null): void
    {
        $path = $this->normalizePath($path);
        $method = strtoupper($method);

        foreach ($this->routes as $route) {
            if (preg_match("#^{$route['path']}$#", $path) && $route['method'] === $method) {
                [$class, $function] = $route['controller'];

                $controllerInstance = $container ?
                    $container->resolve($class) :
                    new $class();

                $controllerInstance->{$function}();
                return;
            }
        }

        $notFound = new \App\Controllers\NotFoundController;
        $notFound->notfound();
    }
}
