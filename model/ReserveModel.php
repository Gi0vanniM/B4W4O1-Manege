<?php

require("../helpers/functions.php");

function getAllReservations()
{
    try {
        $pdo = openDatabaseConnection();

        $stmt = $pdo->prepare("SELECT * FROM reservations");
        $stmt->execute();
    } catch (PDOException $e) {
        echo "Error obtaining reservations: " . $e->getMessage();
    }
    $pdo = null;

    return $stmt->fetchAll(PDO::FETCH_ASSOC);
}

function modelReserveHorse($data)
{
    $success = false;

    try {
        $pdo = openDatabaseConnection();

        foreach ($data as $key => $value) {
            if (empty($value)) exit("$key was not filled in.");
            $$key = sanitize($value);
        }

        $stmt = $pdo->prepare("INSERT INTO reservations (member_id, horse_id, start_time, duration) VALUES (:member_id, :horse_id, :start_time, :duration)");
        $stmt->bindParam(":member_id", $member_id);
        $stmt->bindParam(":horse_id", $horse_id);
        $stmt->bindParam(":start_time", $start_time);
        $stmt->bindParam(":duration", $duration);
        $stmt->execute();

        if ($stmt) $success = true;

    } catch (PDOException $e) {
        echo "Reserving horse failed: " . $e->getMessage();
    }

    $pdo = null;

    return $success;
}