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

        $expensesPayments = $this->expenseService->selectPayment();

        echo $this->view->render(
            "/settings.php",
            [
                'incomesCategories' => $incomesCategories,
                'expensesCategories' => $expensesCategories,
                'expensesPayments' => $expensesPayments
            ]
        );
    }

    public function edit()
    {
        $this->incomeService->updateCategory($_POST);

        $this->expenseService->updateCategory($_POST);

        $this->expenseService->updatePayment($_POST);

        if (!empty($_POST['addIncomeCategory'])) {
            $this->incomeService->addIncomeCategory($_POST);
        }

        if (!empty($_POST['addExpenseCategory'])) {
            $this->expenseService->addExpenseCategory($_POST);
        }

        if (!empty($_POST['addPaymentMethod'])) {
            $this->expenseService->addPayment($_POST);
        }

        if (!empty($_POST['deleteIncomeCategory'])) {
            $this->incomeService->deleteIncomeCategory($_POST);
        }

        if (!empty($_POST['deleteExpenseCategory'])) {
            $this->expenseService->deleteExpenseCategory($_POST);
        }

        redirectTo('/settings');
    }
}
