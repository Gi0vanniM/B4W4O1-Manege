<?php

require(ROOT . "model/ReservationModel.php");
require_once(ROOT . "model/HorseModel.php");
require_once(ROOT . "model/MemberModel.php");

function index($all = false)
{
    render('reservation/index', ['reservations' => getAllReservations($all), 'title' => 'Reserveringen']);
}

function reserve()
{
    render("reservation/reserve", ['reservations' => getAllReservations(), 'members' => getAllMembers(), 'horses' => getAllHorses(), 'title' => 'Reserveren']);
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

function update($id)
{
    render('reservation/update', ['reservation' => getReservationById($id), "reservations" => getAllReservations(), "members" => getAllMembers(), "horses" => getAllHorses(), 'title' => "Update reservation #" . $id]);
}

function updateReservation()
{
    if ($_SERVER['REQUEST_METHOD'] != 'POST') echo "No data received.";

    if (modelUpdateReservation($_POST)) {
        header("Location: " . URL . "reservation");
    } else {
        echo "Update failed.";
    }
}

function delete($id)
{
    render('reservation/delete', ['reservation' => getReservationById($id), 'title' => "Deleting reservation #" . $id]);
}

function deleteReservation($id)
{
    if ($_SERVER['REQUEST_METHOD'] != 'POST') echo "No data received.";

    if (modelDeleteReservation($id)) {
        header("Location: " . URL . "reservation");
    } else {
        echo "Update failed.";
    }
}