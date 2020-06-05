<?php

require_once("../helpers/functions.php");

function getAllHorses()
{
    try {
        $pdo = openDatabaseConnection();

        $stmt = $pdo->prepare("SELECT * FROM horses");
        $stmt->execute();
    } catch (PDOException $e) {
        echo "Error obtaining horse: " . $e->getMessage();
    }
    $pdo = null;

    return $stmt->fetchAll(PDO::FETCH_ASSOC);
}

function getHorseById($id)
{
    sanitize($id);
    try {
        $pdo = openDatabaseConnection();

        $stmt = $pdo->prepare("SELECT * FROM horses WHERE id=?");
        $stmt->execute([$id]);
    } catch (PDOException $e) {
        echo "Error obtaining horse: " . $e->getMessage();
    }
    $pdo = null;
    return $stmt->fetch();
}

function modelAddHorse($data)
{
    $success = false;

    try {
        $pdo = openDatabaseConnection();

        foreach ($data as $key => $value) {
            if (empty($value)) exit("$key was not filled in");
            $$key = sanitize($value);
        }
        $image = $_FILES['image'];
        $imageName = (empty($image['name'])) ? null : $image['name'];

        $stmt = $pdo->prepare("INSERT INTO horses (name, race, age, wither_height, type, image) VALUES (:name, :race, :age, :wither_height, :type, :image)");
        $stmt->bindParam(":name", $name);
        $stmt->bindParam(":race", $race);
        $stmt->bindParam(":age", $age);
        $stmt->bindParam(":wither_height", $wither_height);
        $stmt->bindParam(":type", $type);
        $stmt->bindParam(":image", $imageName);
        $stmt->execute();

        if ($stmt) {
            $success = true;
            if (isset($image)) uploadImage($image);
        }

    } catch (PDOException $e) {
        echo "Adding horse failed: " . $e->getMessage();
    }
    $pdo = null;

    return $success;
}