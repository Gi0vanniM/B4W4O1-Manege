<?php

function sanitize($data)
{
    $data = trim($data);
    $data = htmlspecialchars($data);
    $data = stripcslashes($data);
    return $data;
}

function getDataById($model, $id)
{
    require_once(ROOT . 'model/' . ucwords($model . 'Model') . '.php');
    return call_user_func("get" . $model . "ById", $id);
}

function uploadImage($image)
{
    // put image in image folder.
    $target_dir = ROOT . "public/images/";
    $target_file = $target_dir . basename($image['name']);
    $uploadOk = 1;
    $imageFileType = strtolower(pathinfo($target_file, PATHINFO_EXTENSION));

    // check if file is an image
    if (isset($_POST['submit'])) {
        $check = getimagesize($image['tmp_name']);
        if ($check !== false) {
            echo "File is an image - " . $check['mime'] . ".";
            $uploadOk = 1;
        } else {
            echo "File not an image.";
            $uploadOk = 0;
        }
    }

    // check if file exists
    if (file_exists($target_file)) {
        echo "File already exists.";
        $uploadOk = 0;
    }

    // check file size
    if ($image['size'] > 500000) {
        echo "File to large.";
        $uploadOk = 0;
    }

    // allow certain file typs
    if ($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg" && $imageFileType != "gif") {
        echo "Only jpg, png, jpeg and gif files allowed.";
        $uploadOk = 0;
    }

    if ($uploadOk == 0) {
        echo "File was not uploaded.";
    } else {
        if (move_uploaded_file($image['tmp_name'], $target_file)) {
            echo "File " . basename($image['name']) . " has been uploaded.";
        } else {
            echo "There was an error uploading the file.";
        }
    }

}