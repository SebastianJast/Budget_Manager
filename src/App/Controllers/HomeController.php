<?php

declare(strict_types=1);

namespace App\Controllers;

use App\Services\IncomeService;
use Framework\TemplateEngine;

class HomeController
{
    public function __construct(private TemplateEngine $view, private IncomeService $incomeService) {}

    public function home()
    {
        $incomes = $this->incomeService->getUserIncomes();

        echo $this->view->render("/index.php", ['incomes' => $incomes ]);
    }
}
