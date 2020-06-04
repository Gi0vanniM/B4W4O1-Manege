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