<?php

function getAllReservations() {
    $pdo = openDatabaseConnection();

    $stmt = $pdo->prepare("SELECT * FROM reservations");
    $stmt->execute();
    $pdo = null;

    return $stmt->fetchAll(PDO::FETCH_ASSOC);
}