<?php

declare(strict_types=1);

namespace App\Controllers;

use App\Services\IncomeService;
use Framework\TemplateEngine;

class SettingsController
{
    public function __construct(private TemplateEngine $view, private IncomeService $incomeService) {}

    public function createView()
    {
        $incomesCategories = $this->incomeService->selectCategory();

        echo $this->view->render("/settings.php", ['incomesCategories' => $incomesCategories]);
    }
}
