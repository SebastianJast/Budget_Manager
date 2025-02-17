<?php

declare(strict_types=1);

namespace App\Controllers;

use App\Services\{ValidatorService, UserService};
use Framework\TemplateEngine;

class AuthController
{
    public function __construct(private TemplateEngine $view, private ValidatorService $validatorService, private UserService $userService) {}

    public function registerView()
    {
        echo $this->view->render("/register.php");
    }

    public function register()
    {
        $this->validatorService->validateRegister($_POST);

        $this->userService->isEmailTaker($_POST['email']);

        $this->userService->create($_POST);

        $this->userService->copyDefaultsToUsers($_POST);

        redirectTo('/main');
    }

    public function loginView()
    {
        echo $this->view->render("login.php");
    }

    public function login()
    {
        $this->validatorService->validateLogin($_POST);

        $this->userService->handleRememberMe($_POST);

        $this->userService->login($_POST);

        redirectTo('/main');
    }

    public function logout()
    {
        $this->userService->logout();

        redirectTo('/login');
    }
}
