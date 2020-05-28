<?php

require(ROOT . "model/HorseModel.php");

function index()
{
    render('horse/index', ['horses' => getAllHorses()]);
}

function add()
{
    render("horse/add");
}

function addHorse()
{
    if ($_SERVER['REQUEST_METHOD'] != 'POST') echo "No data received.";

    if (modelAddHorse($_POST)) {
        header("Location: " . URL . "horse");
    } else {
        echo "Invalid data received.";
    }
}
