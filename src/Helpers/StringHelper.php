<?php

namespace App\Helpers;

class StringHelper
{
    public function extractVariableFromPath(string $path): string
    {
        preg_match('/\{([^}]+)\}/', $path, $matches);
        return $matches[1];
    }
}