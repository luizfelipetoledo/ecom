<?php

namespace App\Controllers;

use Request;

class SettingsController extends BaseController
{
    public function showSettings(Request $request, int $id): void
    {
        $view = 'settings.UserSettingsPage';

        $this->view($view, [
            'title' => 'Settings',
            'user' => 'Luiz',
            'id' => $id
        ]);
    }

    public function showSettings2(Request $request, int $id)
    {
        dd($request, $id);
    }
}