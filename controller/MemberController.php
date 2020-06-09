<?php

require(ROOT . "model/MemberModel.php");

function index()
{
    render("member/index", ['members' => getAllMembers(), 'title' => 'Ruiters']);
}

function register()
{
    render("member/register", ['title' => 'Registreer']);
}

function registerMember()
{
    if ($_SERVER['REQUEST_METHOD'] != 'POST') echo "No data received.";

    if (modelRegisterMember($_POST)) {
        header("Location: " . URL . "member");
    } else {
        echo "Invalid data received.";
    }
}