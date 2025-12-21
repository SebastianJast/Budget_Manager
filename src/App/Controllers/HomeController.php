<?php

declare(strict_types=1);

namespace App\Controllers;

use App\Services\{ExpenseService, IncomeService, SummaryService, TransactionsService};
use Framework\TemplateEngine;

class HomeController
{
    public function __construct(private TemplateEngine $view, private IncomeService $incomeService, private ExpenseService $expenseService, private TransactionsService $transactionsService, private SummaryService $summaryService) {}

    public function home()
    {
        [$selectedTitle, $firstDayMonth, $lastDayMonth] = $this->transactionsService->setTransactionsLabels($_GET);

        $incomes = $this->incomeService->getUserIncomes($firstDayMonth, $lastDayMonth);

        $expenses = $this->expenseService->getUserExpenses($firstDayMonth, $lastDayMonth);

        $balance = $this->transactionsService->transactionsBalance($firstDayMonth, $lastDayMonth);

        $dataPoints = $this->expenseService->getExpensesChartData($firstDayMonth, $lastDayMonth);

        $_SESSION['ai_budget_data'] = [
            'incomes' => $incomes,
            'expenses' => $expenses,
            'balance' => $balance
        ];

        echo $this->view->render(
            "/balance.php",
            [
                'incomes' => $incomes,
                'expenses' => $expenses,
                'selectedTitle' => $selectedTitle,
                'balance' => $balance,
                'dataPoints' => $dataPoints
            ]
        );
    }

    public function getAdvice()
    {
        $data = $_SESSION['ai_budget_data'] ?? null;

        if (!$data) {
            header('Content-Type: application/json');
            echo json_encode(['advice' => "Nie znaleziono danych do analizy."]);
            exit;
        }

        $advice = $this->summaryService->generateFinancialAdvice(
            $data['incomes'],
            $data['expenses'],
            (float)$data['balance']
        );

        header('Content-Type: application/json');
        echo json_encode(['advice' => $advice]);
        exit;
    }
}
