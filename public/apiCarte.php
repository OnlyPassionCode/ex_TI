<?php

require_once("../config.php");

$dsn = DB_DRIVER . ":host=" . DB_HOST . ";charset=" . DB_CHARSET . ";port=" . DB_PORT . ";dbname=". DB_NAME;

try {
    $db = new PDO($dsn, DB_USER, DB_PASS, [
        PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC
    ]);
} catch (Exception $e) {
    die($e->getMessage());
}

// on est content 😊

try {
    $query = $db->query("SELECT * FROM locations");
    $locations = $query->fetchAll();
    $query->closeCursor();
} catch (Exception $e) {
    die($e->getMessage());
}

echo json_encode($locations);

$db = null;
