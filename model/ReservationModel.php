<?php

require_once("../helpers/functions.php");

function getAllReservations($all = false)
{
    try {
        $pdo = openDatabaseConnection();

        $query = "SELECT * FROM reservations WHERE DATE_ADD(start_time, INTERVAL duration MINUTE) >= NOW() ORDER BY start_time";

        if ($all) $query = "SELECT * FROM reservations ORDER BY start_time";

        $stmt = $pdo->prepare($query);
        $stmt->execute();
    } catch (PDOException $e) {
        echo "Error obtaining reservations: " . $e->getMessage();
    }
    $pdo = null;

    return $stmt->fetchAll(PDO::FETCH_ASSOC);
}

function getReservationById($id)
{
    sanitize($id);
    try {
        $pdo = openDatabaseConnection();

        $stmt = $pdo->prepare("SELECT * FROM reservations WHERE id=?");
        $stmt->execute([$id]);
    } catch (PDOException $e) {
        echo "Error obtaining reservation: " . $e->getMessage();
    }
    $pdo = null;
    return $stmt->fetch();
}

function getReservationByHorseId($id, $all = false)
{
    sanitize($id);
    try {
        $pdo = openDatabaseConnection();

        $query = "SELECT * FROM reservations WHERE DATE_ADD(start_time, INTERVAL duration MINUTE) >= NOW() AND horse_id=?";

        if ($all) $query = "SELECT * FROM reservations WHERE horse_id=?";

        $stmt = $pdo->prepare($query);
        $stmt->execute([$id]);
    } catch (PDOException $e) {
        echo "Error obtaining reservation(s): " . $e->getMessage();
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

        $start_time = date(SQL_TIME_FORMAT, strtotime("$date $time"));

        $dateTime = new DateTime($start_time);
        $endTime = date_add(new DateTime($start_time), new DateInterval('PT' . $duration . 'M'));

        $otherReservations = getReservationByHorseId($horse_id);
        foreach ($otherReservations as $otherRes) {
            $otherDateTime = new DateTime($otherRes['start_time']);
            $otherEndTime = date_add(new DateTime($otherRes['start_time']), new DateInterval('PT' . $otherRes['duration'] . 'M'));

            if ($endTime <= $otherDateTime || $dateTime >= $otherEndTime) {
                echo "Valid Date and Time!";
            } else {
                exit("Error: Reservation interferes with another reservation. #" . $otherRes['id'] . " from " . $otherDateTime->format(TIME_FORMAT) . " to " . $otherEndTime->format(TIME_FORMAT) . ".");
            }
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

function modelUpdateReservation($data)
{
    $success = false;

    try {
        $pdo = openDatabaseConnection();

        foreach ($data as $key => $value) {
            if (empty($value)) exit("$key was not filled in.");
            $$key = sanitize($value);
        }

        $start_time = date(SQL_TIME_FORMAT, strtotime("$date $time"));

        $dateTime = new DateTime($start_time);
        $endTime = date_add(new DateTime($start_time), new DateInterval('PT' . $duration . 'M'));

        $otherReservations = getReservationByHorseId($horse_id);
        foreach ($otherReservations as $otherRes) {
            if ($otherRes['id'] != $id) {
                $otherDateTime = new DateTime($otherRes['start_time']);
                $otherEndTime = date_add(new DateTime($otherRes['start_time']), new DateInterval('PT' . $otherRes['duration'] . 'M'));

                if ($endTime <= $otherDateTime || $dateTime >= $otherEndTime) {
                    echo "Valid Date and Time!";
                } else {
                    exit("Error: Reservation interferes with another reservation. #" . $otherRes['id'] . " from " . $otherDateTime->format(TIME_FORMAT) . " to " . $otherEndTime->format(TIME_FORMAT) . ".");
                }
            }
        }

        $stmt = $pdo->prepare("UPDATE reservations SET member_id=:member_id, horse_id=:horse_id, start_time=:start_time, duration=:duration WHERE id=:id");
        $stmt->bindParam(":member_id", $member_id);
        $stmt->bindParam(":horse_id", $horse_id);
        $stmt->bindParam(":start_time", $start_time);
        $stmt->bindParam(":duration", $duration);
        $stmt->bindParam(":id", $id);
        $stmt->execute();

        if ($stmt) $success = true;

    } catch (PDOException $e) {
        echo "Updating reservation failed: " . $e->getMessage();
    }

    $pdo = null;

    return $success;
}

function modelDeleteReservation($id)
{
    $success = false;

    try {
        $pdo = openDatabaseConnection();

        $id = sanitize($id);

        $stmt = $pdo->prepare("DELETE FROM reservations WHERE id=?");
        $stmt->execute([$id]);

        if ($stmt) $success = true;

    } catch (PDOException $e) {
        echo "Failed to delete: " . $e->getMessage();
    }
    $pdo = null;

    return $success;
}