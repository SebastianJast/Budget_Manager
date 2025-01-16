<?php

declare(strict_types=1);

namespace App\Controllers;

use Framework\TemplateEngine;
use App\Services\UserService;

class MainController
{
    public function __construct(private TemplateEngine $view, private UserService $userService) {}

    public function main()
    {
        $userName = $this->userService->userName();

        echo $this->view->render("/main.php", ['title' => 'Main page', 'userName' => $userName['username']]);
    }
}
