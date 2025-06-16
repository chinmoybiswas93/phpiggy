<?php

ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);

include __DIR__ . '/../src/App/functions.php';
$app = require __DIR__ . '/../src/App/bootstrap.php';
$app->run();
