<?php

namespace App\Controllers;


class BaseController
{
    protected function view(string $view, array $data = [], string $layout = 'layouts.app'): void
    {
        $viewPath = BASE_PATH . '/views/' . str_replace('.', '/', $view) . '.php';
        $layoutPath = BASE_PATH . '/views/' . str_replace('.', '/', $layout) . '.php';

        if (!file_exists($viewPath)) {
            throw new \Exception("View {$view} não encontrada.");
        }

        if (!file_exists($layoutPath)) {
            throw new \Exception("Layout {$layout} não encontrado.");
        }

        extract($data);

        ob_start();
        require $viewPath;
        $content = ob_get_clean();

        require $layoutPath;
    }
}