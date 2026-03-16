<?php
// Caminho base do projeto
define('BASE_PATH', dirname(__DIR__));

// Autoload do Composer
require BASE_PATH . '/vendor/autoload.php';

// Carregar variáveis do .env
$dotenv = Dotenv\Dotenv::createImmutable(BASE_PATH);
$dotenv->load();

use App\Core\Router;

$router = new Router();
require BASE_PATH . '/src/Core/routes.php';

$request = new Request();

$router->dispatch($request);

class Request
{
    public string $method;
    public array $path;
    public array $queryParams;
    public array $accept;
    public string $uri;

    public function __construct()
    {
        $this->method = $_SERVER['REQUEST_METHOD'];
        [$this->path, $this->queryParams] = $this->handlePath($_SERVER);
        $this->accept = explode(';', $_SERVER['HTTP_ACCEPT']);
        $this->uri = $_SERVER['REQUEST_URI'];
    }

    private function handlePath(): array
    {
        $pathData = explode('?', $_SERVER['REQUEST_URI'])[0];

        $pathArray = explode('/', $pathData);
        array_shift($pathArray);

        $queryParams = $_GET;

        return [$pathArray, $queryParams];
    }
}
