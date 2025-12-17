<?php

declare(strict_types=1);

use Framework\{Container, TemplateEngine, Database};
use App\Config\Paths;
use App\Services\{IncomeService, TransactionsService, ExpenseService, ValidatorService, UserService, SummaryService};

return [
    TemplateEngine::class => fn() => new TemplateEngine(Paths::VIEW),
    ValidatorService::class => fn() => new ValidatorService(),
    Database::class => fn() => new Database(
        $_ENV['DB_DRIVER'],
        [
            'host' => $_ENV['DB_HOST'],
            'port' => $_ENV['DB_PORT'],
            'dbname' => $_ENV['DB_NAME'],
        ],
        $_ENV['DB_USER'],
        $_ENV['DB_PASS']
    ),
    UserService::class => function (Container $container) {
        $db = $container->get(Database::class);

        return new UserService($db);
    },
    IncomeService::class => function (Container $container) {
        $db = $container->get(Database::class);

        return new IncomeService($db);
    },
    ExpenseService::class => function (Container $container) {
        $db = $container->get(Database::class);

        return new ExpenseService($db);
    },
    TransactionsService::class => function (Container $container) {
        $db = $container->get(Database::class);

        return new TransactionsService($db);
    },

     SummaryService::class => function (Container $container) {
        return new SummaryService();
    }

];
