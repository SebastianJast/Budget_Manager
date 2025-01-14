<?php

declare(strict_types=1);

namespace App\Services;

use Framework\Database;

class TransactionsService
{
    public function __construct(private Database $db) {}
    public function setTransactionsLabels(array $formData)
    {
        $selectedTitle = "Bieżący miesiąc";
        $firstDayMonth = date('Y-m-01');
        $lastDayMonth = date('Y-m-t');

        if (isset($formData['currentMonth'])) {
            $selectedTitle = "Bieżący miesiąc";
        } elseif (isset($formData['previousMonth'])) {
            $firstDayMonth = date('Y-m-d', strtotime('first day of last month'));
            $lastDayMonth = date('Y-m-d', strtotime('last day of last month'));
            $selectedTitle = "Poprzedni miesiąc";
        } elseif (isset($formData['currentYear'])) {
            $firstDayMonth = date('Y-01-01');
            $lastDayMonth = date('Y-12-31');
            $selectedTitle = "Bieżący rok";
        } elseif (isset($formData['submitDate'])) {
            $firstDayMonth = $formData['rangeFrom'] ?? $firstDayMonth;
            $lastDayMonth = $formData['rangeTo'] ?? $lastDayMonth;
            $selectedTitle = 'Okres od ' . $firstDayMonth . ' do ' . $lastDayMonth;
        }

        return [$selectedTitle, $firstDayMonth, $lastDayMonth];
    }

    public function transactionsBalance($firstDayMonth, $lastDayMonth)
    {
        $result = $this->db->query(
            "SELECT incomes.user_id, SUM(incomes.amount) AS 'incomesSUM' FROM incomes
            WHERE incomes.date_of_income BETWEEN :first_day_month AND :last_day_month AND incomes.user_id = :user_id",
            [
                'user_id' => $_SESSION['user'],
                'first_day_month' => $firstDayMonth,
                'last_day_month' => $lastDayMonth
            ]
        )->find();

        $incomesSum = $result['incomesSUM'];

        $result = $this->db->query(
            "SELECT expenses.user_id, SUM(expenses.amount) AS 'expensesSUM' FROM expenses
            WHERE expenses.date_of_expense BETWEEN :first_day_month AND :last_day_month AND expenses.user_id = :user_id",
            [
                'user_id' => $_SESSION['user'],
                'first_day_month' => $firstDayMonth,
                'last_day_month' => $lastDayMonth
            ]
        )->find();

        $expensesSum = $result['expensesSUM'];

        $balance = $incomesSum - $expensesSum;

        return $balance;
    }
}
