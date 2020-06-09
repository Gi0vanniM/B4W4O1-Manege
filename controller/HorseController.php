<?php

require(ROOT . "model/HorseModel.php");
require_once(ROOT . "model/ReservationModel.php");

function index()
{
    render('horse/index', ['horses' => getAllHorses(), 'title' => 'Paarden']);
}

function detail($id)
{
    render('horse/detail', ['horse' => getHorseById($id), 'reservations' => getReservationByHorseId($id), 'title' => getHorseById($id)['name']]);
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
