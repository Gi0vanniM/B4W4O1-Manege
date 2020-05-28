<?php

require(ROOT . "model/MemberModel.php");

function index()
{
    render("member/index", ['members' => getAllMembers()]);
}

function register()
{
    render("member/register");
}

function registerMember()
{
    if ($_SERVER['REQUEST_METHOD'] != 'POST') echo "No data received.";

    if (modelRegisterMember($_POST)) {
        header("Location: " . URL . "member/index");
    } else {
        echo "Invalid data received.";
    }
}
