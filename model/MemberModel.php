<?php

require_once("../helpers/functions.php");

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