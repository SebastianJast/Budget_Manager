<?php

$driver = 'mysql';
$config = http_build_query(data: [
    'host' => '127.0.0.1',
    'port' => 3306,
    'dbname' => 'budget_manager',
], arg_separator: ';');

$dsn = "{$driver}:{$config}";
$username = 'root';
$password = '';

$db = new PDO($dsn, $username, $password);

echo "Connected to database";
