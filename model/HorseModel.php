<?php

function getAllHorses() {
    $pdo = openDatabaseConnection();

    $stmt = $pdo->prepare("SELECT * FROM horses");
    $stmt->execute();
    $pdo = null;

    return $stmt->fetchAll(PDO::FETCH_ASSOC);
}