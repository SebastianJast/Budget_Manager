<?php

declare(strict_types=1);

namespace App\Controllers;

use App\Services\ExpenseService;
use App\Services\ValidatorService;
use Framework\TemplateEngine;

class ExpenseController
{
    public function __construct(private TemplateEngine $view, private ValidatorService $validatorService, private ExpenseService $expenseService) {}

    public function createView()
    {
        $expensesCategories = $this->expenseService->selectCategory();

        $expensesPayments = $this->expenseService->selectPayment();

        echo $this->view->render(
            "transactions/expense.php",
            [
                'expensesCategories' => $expensesCategories,
                'expensesPayments' => $expensesPayments
            ]
        );
    }

    public function create()
    {
        $this->validatorService->validateExpense($_POST);

        $idCategory = $this->expenseService->selectIdCategory($_POST);

        $idPayment = $this->expenseService->selectIdPayment($_POST);

        $this->expenseService->create($_POST, $idCategory, $idPayment);

        redirectTo('/');
    }

    public function editView(array $params)
    {
        $expensesCategories = $this->expenseService->selectCategory();

        $expensesPayments = $this->expenseService->selectPayment();

        $expense = $this->expenseService->getUserExpense($params['expense']);

        if (!$expense) {
            redirectTo('/');
        }

        echo $this->view->render('transactions/expenseEdit.php', [
            'expense' => $expense,
            'expensesCategories' => $expensesCategories,
            'expensesPayments' => $expensesPayments
        ]);
    }

    public function edit(array $params)
    {
        $expense = $this->expenseService->getUserExpense($params['expense']);

        if (!$expense) {
            redirectTo('/');
        }

        $this->validatorService->validateExpense($_POST);

        $idCategory = $this->expenseService->selectIdCategory($_POST);

        $idPayment = $this->expenseService->selectIdPayment($_POST);

        $this->expenseService->update($_POST, $expense['id'], $idCategory, $idPayment);

        // redirectTo($_SERVER['HTTP_REFERER']);
        redirectTo('/');
    }

    public function delete(array $params)
    {
        $this->expenseService->delete((int) $params['expense']);

        redirectTo('');
    }
}
