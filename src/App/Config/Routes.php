<?php

declare(strict_types=1);

namespace App\Config;

use Framework\App;
use App\Controllers\{AuthController, HomeController, MainController};

function registerRoutes(App $app)
{
    $app->get('/', [HomeController::class, 'home']);
    $app->get('/main', [MainController::class, 'main']);
    $app->get('/register', [AuthController::class, 'register']);
}
