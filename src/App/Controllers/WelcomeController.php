<?php

declare(strict_types=1);

namespace App\Controllers;

use Framework\TemplateEngine;
use App\Services\UserService;

class WelcomeController
{
    public function __construct(private TemplateEngine $view) {}

    public function welcome()
    {
        echo $this->view->render("/index.php");
    }
}
