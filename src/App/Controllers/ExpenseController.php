<?php

declare(strict_types=1);

namespace App\Controllers;

use App\Services\ValidatorService;
use Framework\TemplateEngine;

class ExpenseController
{
    public function __construct(private TemplateEngine $view, private ValidatorService $validatorService) {}

    public function createView()
    {
        echo $this->view->render("transactions/expense.php");
    }

    public function create()
    {
        $this->validatorService->validateExpense($_POST);
    }
}
