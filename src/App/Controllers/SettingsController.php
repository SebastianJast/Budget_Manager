<?php

declare(strict_types=1);

namespace App\Controllers;

use App\Services\ExpenseService;
use App\Services\IncomeService;
use Framework\TemplateEngine;

class SettingsController
{
    public function __construct(private TemplateEngine $view, private IncomeService $incomeService, private ExpenseService $expenseService) {}

    public function createView()
    {
        $incomesCategories = $this->incomeService->selectCategory();

        $expensesCategories = $this->expenseService->selectCategory();

        echo $this->view->render("/settings.php", ['incomesCategories' => $incomesCategories, 'expensesCategories' => $expensesCategories]);
    }

    public function edit()
    {
        $this->incomeService->updateCategory($_POST);

        redirectTo('/settings');

        // dd($_POST);
    }
}
