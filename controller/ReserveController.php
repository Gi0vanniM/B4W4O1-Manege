<?php

require(ROOT . "model/ReserveModel.php");

function index()
{
    render('reserve/index', ['reservations' => getAllReservations()]);
}

function reservation()
{
    render("reserve/reservation");
}

function registerReservation()
{
    if ($_SERVER['REQUEST_METHOD'] != 'POST') echo "No data received.";

    if (modelReserveHorse($_POST)) {
        header("Location: " . URL . "reserve/index");
    } else {
        echo "Invalid data received.";
    }
}