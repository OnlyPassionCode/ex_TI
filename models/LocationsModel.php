<?php

function getAllLocations(PDO $db) : array | string{
    try {
        $query = $db->query("SELECT * FROM locations");
        $locations = $query->fetchAll();
        $query->closeCursor();
        return $locations;
    } catch (Exception $e) {
        return $e->getMessage();
    }
}