<?php

namespace App\Core;

use App\Controllers\SettingsController;

/** @var \App\Core\Router $router */
$router->get('/settings/{id}', [SettingsController::class, 'showSettings']);
$router->get('/api/settings/user/{id}', [SettingsController::class, 'showSettings2']);
