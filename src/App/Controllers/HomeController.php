<?php

declare(strict_types=1);

namespace App\Controllers;

use App\Services\{ExpenseService, IncomeService, TransactionsService};
use Framework\TemplateEngine;

class HomeController
{
    public function __construct(private TemplateEngine $view, private IncomeService $incomeService, private ExpenseService $expenseService, private TransactionsService $transactionsService) {}

    public function home()
    {
        [$selectedTitle, $firstDayMonth, $lastDayMonth] = $this->transactionsService->setTransactionsLabels($_GET);

        $incomes = $this->incomeService->getUserIncomes($firstDayMonth, $lastDayMonth);

        $expenses = $this->expenseService->getUserExpenses($firstDayMonth, $lastDayMonth);

        $balance = $this->transactionsService->transactionsBalance($firstDayMonth, $lastDayMonth);

        echo $this->view->render("/index.php", ['incomes' => $incomes, 'expenses' => $expenses, 'selectedTitle' => $selectedTitle, 'balance' => $balance]);
    }
}
