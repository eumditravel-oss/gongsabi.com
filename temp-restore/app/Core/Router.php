<?php

declare(strict_types=1);

namespace App\Core;

final class Router
{
    /** @var array<int, array{method: string, path: string, handler: string}> */
    private array $routes = [];

    public function add(string $method, string $path, string $handler): void
    {
        $this->routes[] = [
            'method' => strtoupper($method),
            'path' => $path,
            'handler' => $handler,
        ];
    }

    public function dispatch(Request $request): Response
    {
        foreach ($this->routes as $route) {
            if ($route['method'] !== $request->method) {
                continue;
            }

            $params = $this->match($route['path'], $request->path);
            if ($params === null) {
                continue;
            }

            [$class, $method] = explode('@', $route['handler'], 2);
            $controller = 'App\\Controllers\\' . $class;
            $instance = new $controller();

            return $instance->{$method}($request, ...array_values($params));
        }

        return new Response(View::render('pages/404', ['title' => '페이지를 찾을 수 없습니다.']), 404);
    }

    /** @return array<string, string>|null */
    private function match(string $routePath, string $actualPath): ?array
    {
        $names = [];
        $pattern = preg_replace_callback('/\{([a-zA-Z_][a-zA-Z0-9_]*)\}/', static function (array $matches) use (&$names): string {
            $names[] = $matches[1];
            return '([^/]+)';
        }, $routePath);

        if ($pattern === null) {
            return null;
        }

        if (!preg_match('#^' . $pattern . '$#', $actualPath, $matches)) {
            return null;
        }

        array_shift($matches);
        return array_combine($names, $matches) ?: [];
    }
}
