<?php

include __DIR__ . '/src/Framework/Database.php';

use Framework\Database;

$db = new Database(
    'mysql',
    [
        'host' => '127.0.0.1',
        'port' => 3306,
        'dbname' => 'budget_manager',
    ],
    'root',
    ''
);


$search = "anna";
$query = "SELECT * FROM users WHERE username=:username";

$stmt = $db->connection->prepare($query);

$stmt->bindValue('username', $search, PDO::PARAM_STR);

$stmt->execute(
    ['username' => $search]
);

var_dump($stmt->fetchAll(PDO::FETCH_OBJ));