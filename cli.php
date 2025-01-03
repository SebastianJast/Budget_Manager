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

try {
    $db->connection->beginTransaction();

    $db->connection->query("INSERT INTO users VALUES(NULL,'Sebastian', 'abc123', 's.jast92@gmail.com')");

    $search = "anna";
    $query = "SELECT * FROM users WHERE username=:username";

    $stmt = $db->connection->prepare($query);

    $stmt->bindValue('username', $search, PDO::PARAM_STR);

    $stmt->execute();

    var_dump($stmt->fetchAll(PDO::FETCH_OBJ));

    $db->connection->commit();
} catch (Exception $error) {
    if ($db->connection->inTransaction()) {
        $db->connection->rollBack();
    }

    echo "Transaction failed!";
}
