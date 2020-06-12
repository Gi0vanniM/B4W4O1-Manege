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

function update($id)
{
    render('member/update', ['member' => getMemberById($id), 'title' => "Update " . getMemberById($id)['name']]);
}

function updateMember()
{
    if ($_SERVER['REQUEST_METHOD'] != 'POST') echo "No data received.";

    if (modelUpdateMember($_POST)) {
        header("Location: " . URL . "member");
    } else {
        echo "Update failed.";
    }
}

function delete($id)
{
    render('member/delete', ['member' => getMemberById($id), 'title' => "Deleting " . getMemberById($id)['name']]);
}

function deleteMember($id)
{
    if ($_SERVER['REQUEST_METHOD'] != 'POST') echo "No data received.";

    if (modelDeleteMember($id)) {
        header("Location: " . URL . "member");
    } else {
        echo "Update failed.";
    }
}