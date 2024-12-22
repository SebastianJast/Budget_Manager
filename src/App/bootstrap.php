<?php

declare(strict_types=1);

include __DIR__ . "/../../vendor/autoload.php";

use Framework\App;
use App\Controllers\HomeController;
use App\Controllers\MainController;

$app = new App();

$app->get('/', [HomeController::class, 'home']);
$app->get('/main', [MainController::class, 'main']);

return $app;
