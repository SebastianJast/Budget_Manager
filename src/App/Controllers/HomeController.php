<?php

declare(strict_types=1);

namespace App\Controllers;

use App\Services\{IncomeService, TransactionsService};
use Framework\TemplateEngine;

class HomeController
{
    public function __construct(private TemplateEngine $view, private IncomeService $incomeService, private TransactionsService $transactionsService) {}

    public function home()
    {
        $transactions = $this->transactionsService->setTransactionsLabels($_GET);

        $incomes = $this->incomeService->getUserIncomes($transactions[1],$transactions[2]);
        
        echo $this->view->render("/index.php", ['incomes' => $incomes, 'selectedTitle' => $transactions[0]]);
    }
}
