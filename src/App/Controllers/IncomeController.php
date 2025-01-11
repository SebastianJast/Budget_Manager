<?php

declare(strict_types=1);

namespace App\Controllers;

use App\Services\{ValidatorService, IncomeService};
use Framework\TemplateEngine;

class IncomeController
{
    public function __construct(private TemplateEngine $view, private ValidatorService $validatorService, private IncomeService $incomeService) {}

    public function createView()
    {
        $incomesCategories = $this->incomeService->selectCategory();

        echo $this->view->render("transactions/income.php", ['incomesCategories' => $incomesCategories]);
    }

    public function create()
    {
        $this->validatorService->validateIncome($_POST);

        $idCategory = $this->incomeService->selectIdCategory($_POST);

        $this->incomeService->create($_POST, $idCategory);

        redirectTo('/');
    }

    public function editView(array $params)
    {
        $incomesCategories = $this->incomeService->selectCategory();

        $income = $this->incomeService->getUserIncome($params['income']);

        if (!$income) {
            redirectTo('/');
        }

        echo $this->view->render('transactions/IncomeEdit.php', [
            'income' => $income,
            'incomesCategories' => $incomesCategories
        ]);
    }

    public function edit(array $params)
    {
        $income = $this->incomeService->getUserIncome($params['income']);

        if (!$income) {
            redirectTo('/');
        }

        $this->validatorService->validateIncome($_POST);

        $idCategory = $this->incomeService->selectIdCategory($_POST);

        $this->incomeService->update($_POST, $income['id'], $idCategory);

        // redirectTo($_SERVER['HTTP_REFERER']);
        redirectTo('/');

    }
}
