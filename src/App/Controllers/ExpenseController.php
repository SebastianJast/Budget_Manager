<?php

declare(strict_types=1);

namespace App\Controllers;

use Framework\TemplateEngine;

class ExpenseController
{
    public function __construct(private TemplateEngine $view) {}

    public function createView()
    {
        echo $this->view->render("transactions/expense.php");
    }
}
