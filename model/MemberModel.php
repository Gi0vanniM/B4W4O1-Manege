<?php

require("../helpers/functions.php");

function getAllMembers()
{
    $pdo = openDatabaseConnection();

    $stmt = $pdo->prepare("SELECT * FROM members");
    $stmt->execute();
    $pdo = null;

    return $stmt->fetchAll(PDO::FETCH_ASSOC);
}

function modelRegisterMember($data)
{
    $success = false;

    try {
        $pdo = openDatabaseConnection();

        foreach ($data as $key => $value) {
            $$key = sanitize($value);
            if (empty($value)) exit("$key was not filled in.");
        }

        extract($data, EXTR_OVERWRITE);

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