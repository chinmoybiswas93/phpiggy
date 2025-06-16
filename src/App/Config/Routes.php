<?php

declare(strict_types=1);

namespace App\Config;

use Framework\App;
use App\Controllers\{HomeController, AboutController};

class Routes
{
    public static function register(App $app): void
    {
        // Home routes
        $app->get('/', [HomeController::class, 'home']);

        // About routes
        $app->get('/about', [AboutController::class, 'about']);
    }
}
