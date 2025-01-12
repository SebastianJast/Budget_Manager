<?php

declare(strict_types=1);

namespace App\Config;

use Framework\App;
use App\Controllers\{AuthController, HomeController, MainController, IncomeController, ExpenseController};
use App\Middleware\{AuthRequiredMiddleware, GuestOnlyMiddleware};

function registerRoutes(App $app)
{
    $app->get('/', [HomeController::class, 'home'])->add(AuthRequiredMiddleware::class);
    $app->get('/main', [MainController::class, 'main'])->add(AuthRequiredMiddleware::class);
    $app->get('/register', [AuthController::class, 'registerView'])->add(GuestOnlyMiddleware::class);
    $app->post('/register', [AuthController::class, 'register'])->add(GuestOnlyMiddleware::class);
    $app->get('/login', [AuthController::class, 'loginView'])->add(GuestOnlyMiddleware::class);
    $app->post('/login', [AuthController::class, 'login'])->add(GuestOnlyMiddleware::class);
    $app->get('/logout', [AuthController::class, 'logout'])->add(AuthRequiredMiddleware::class);
    $app->get('/income', [IncomeController::class, 'createView'])->add(AuthRequiredMiddleware::class);
    $app->post('/income', [IncomeController::class, 'create'])->add(AuthRequiredMiddleware::class);
    $app->get('/income/{income}', [IncomeController::class, 'editView']);
    $app->post('/income/{income}', [IncomeController::class, 'edit']);
    $app->delete('/income/{income}', [IncomeController::class, 'delete']);
    $app->get('/expense', [ExpenseController::class, 'createView'])->add(AuthRequiredMiddleware::class);
    $app->post('/expense', [ExpenseController::class, 'create'])->add(AuthRequiredMiddleware::class);
    $app->get('/expense/{expense}', [ExpenseController::class, 'editView']);
    $app->post('/expense/{expense}', [ExpenseController::class, 'edit']);
    $app->delete('/expense/{expense}', [ExpenseController::class, 'delete']);
}
