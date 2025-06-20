<?php

declare(strict_types=1);

namespace App\Controllers;

use Framework\TemplateEngine;
use App\Config\Paths;

class HomeController
{

    public function __construct(private TemplateEngine $view) {}
    public function home()
    {
        // Render the home page using the template engine
        echo $this->view->render('index.php', [
            'title' => 'Home Page',
            'message' => 'Welcome to the Home Hello!'
        ]);
    }
}
