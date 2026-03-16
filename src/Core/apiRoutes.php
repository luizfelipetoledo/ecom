<?php

namespace App\Core;

use App\Controllers\SettingsController;

/** @var \App\Core\Router $router */
$router->get('/settings', [SettingsController::class, 'showSettings']);
$router->get('/settings/user/{id}/edit', [SettingsController::class, 'showSettings2']);
