<?php

declare(strict_types=1);

use Framework\TemplateEngine;
use App\Config\Paths;

return [
    //factory function for the Router
    TemplateEngine::class => fn() => new TemplateEngine(Paths::VIEWS),
];   