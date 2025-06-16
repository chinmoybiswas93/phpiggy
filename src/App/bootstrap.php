<?php

declare(strict_types=1);

require __DIR__ . '/../../vendor/autoload.php';

use Framework\App;
use App\Config\Routes;
use App\Config\Paths;

$app = new App(Paths::SOURCE . 'App/container-definitions.php');

// Register all routes
Routes::register($app);

return $app;
