<?php

function getAllLocations(PDO $db) : array | string{
    try {
        $query = $db->query("SELECT * FROM locations ORDER BY id ASC");
        $locations = $query->fetchAll();
        $query->closeCursor();
        return $locations;
    } catch (Exception $e) {
        return $e->getMessage();
    }
}

function getLocationByID(PDO $db, int $id) : array | string{
    try {
        $prepare = $db->prepare("SELECT * FROM locations WHERE id = ?");
        $prepare->execute([$id]);
        if($prepare->rowCount() < 1) return "Aucune location avec cette ID.";
        return $prepare->fetch();
    } catch (Exception $e) {
        return $e->getMessage();
    }
}

function deleteLocationByID(PDO $db, int $id) : bool | string{
    try {
        $prepare = $db->prepare("DELETE FROM `locations` WHERE `id` = ?");
        $prepare->execute([$id]);
        if($prepare->rowCount() < 1) return "Aucune location avec cette ID.";
        return true;
    } catch (Exception $e) {
        return $e->getMessage();
    }
}

function updateLocation(PDO $db, int $id, string $name, string $imgUrl, string $adresse, float $long, float $lat) : bool | string{
    try {
        $prepare = $db->prepare("UPDATE `locations` SET `name` = ?, `adresse` = ?, `img_url` = ?, `long` = ?, `lat` = ? WHERE `id` = ?");
        $prepare->execute([$name, $adresse, $imgUrl, $long, $lat, $id]);
        return true;
    } catch (Exception $e) {
        return $e->getMessage();
    }
}

function addLocation(PDO $db, string $name, string $imgUrl, string $adresse, float $long, float $lat) : int | string{
    try {
        $prepare = $db->prepare("INSERT INTO `locations`(`name`, `adresse`, `img_url`, `long`, `lat`) VALUE(?,?,?,?,?)");
        $prepare->execute([$name, $adresse, $imgUrl, $long, $lat]);
        return (int) $db->lastInsertId();
    } catch (Exception $e) {
        return $e->getMessage();
    }
}