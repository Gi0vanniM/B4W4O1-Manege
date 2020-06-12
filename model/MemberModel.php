<?php

require_once("../helpers/functions.php");
require_once("ReservationModel.php");

function getAllMembers()
{
    try {
        $pdo = openDatabaseConnection();

        $stmt = $pdo->prepare("SELECT * FROM members");
        $stmt->execute();
    } catch (PDOException $e) {
        echo "Error obtaining members: " . $e->getMessage();
    }
    $pdo = null;

    return $stmt->fetchAll(PDO::FETCH_ASSOC);
}

function getMemberById($id)
{
    sanitize($id);
    try {
        $pdo = openDatabaseConnection();

        $stmt = $pdo->prepare("SELECT * FROM members WHERE id=?");
        $stmt->execute([$id]);
    } catch (PDOException $e) {
        echo "Error obtaining member: " . $e->getMessage();
    }
    $pdo = null;
    return $stmt->fetch();
}

function modelRegisterMember($data)
{
    $success = false;

    try {
        $pdo = openDatabaseConnection();

        foreach ($data as $key => $value) {
            if (empty($value)) exit("$key was not filled in.");
            $$key = sanitize($value);
        }

        $stmt = $pdo->prepare("INSERT INTO members (name, address, phone) VALUES (:name, :address, :phone)");
        $stmt->bindParam(":name", $name);
        $stmt->bindParam(":address", $address);
        $stmt->bindParam(":phone", $phone);
        $stmt->execute();

        if ($stmt) $success = true;

    } catch (PDOException $e) {
        echo "Registering member failed: " . $e->getMessage();
    }
    $pdo = null;

    return $success;
}

function modelUpdateMember($data)
{
    $success = false;

    try {
        $pdo = openDatabaseConnection();

        foreach ($data as $key => $value) {
            if (empty($value)) exit("$key was not filled in.");
            $$key = sanitize($value);
        }

        $stmt = $pdo->prepare("UPDATE members SET name=:name, address=:address, phone=:phone WHERE id=:id");
        $stmt->bindParam(":name", $name);
        $stmt->bindParam(":address", $address);
        $stmt->bindParam(":phone", $phone);
        $stmt->bindParam(":id", $id);
        $stmt->execute();

        if ($stmt) $success = true;

    } catch (PDOException $e) {
        echo "Updating member failed: " . $e->getMessage();
    }

    $pdo = null;

    return $success;
}

function modelDeleteMember($id)
{
    $success = false;

    try {
        $pdo = openDatabaseConnection();

        $id = sanitize($id);

        $stmt = $pdo->prepare("DELETE FROM members WHERE id=?");
        $stmt->execute([$id]);

        if ($stmt) {
            $success = true;
            $invalidReservations = getReservationByMemberId($id);
            foreach ($invalidReservations as $invalidRes) {
                modelDeleteReservation($invalidRes['id']);
            }
        }

    } catch (PDOException $e) {
        echo "Failed to delete: " . $e->getMessage();
    }
    $pdo = null;

    return $success;
}