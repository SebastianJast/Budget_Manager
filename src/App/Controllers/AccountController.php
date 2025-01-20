<?php

declare(strict_types=1);

namespace App\Controllers;

use App\Services\{UserService, ValidatorService};
use Framework\TemplateEngine;


class AccountController
{
    public function __construct(private TemplateEngine $view, private UserService $userService, private ValidatorService $validatorService) {}

    public function editView()
    {
        $user = $this->userService->userName();

        echo $this->view->render("/account.php", ['user' => $user]);
    }

    public function edit()
    {
        $this->validatorService->validateEditAccount($_POST);

        $user = $this->userService->userName();

        if ($user['email'] != $_POST['email']) {
            $this->userService->isEmailTaker($_POST['email']);
        }


        $this->userService->updateAccount($_POST);

        redirectTo("/settings");
    }
}
