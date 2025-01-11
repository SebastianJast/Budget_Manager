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
        dd($params);
    }
}
