<?php

require(ROOT . "model/ReservationModel.php");
require(ROOT . "model/HorseModel.php");
require(ROOT . "model/MemberModel.php");

function index()
{
    render('reservation/index', ['reservations' => getAllReservations()]);
}

function reserve()
{
    render("reservation/reserve", ['horses' => getAllHorses(), 'members' => getAllMembers(), 'reservations' => getAllReservations()]);
}

function registerReservation()
{
    if ($_SERVER['REQUEST_METHOD'] != 'POST') echo "No data received.";

    if (modelReserveHorse($_POST)) {
        header("Location: " . URL . "reservation");
    } else {
        echo "Invalid data received.";
    }
}