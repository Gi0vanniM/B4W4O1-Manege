<?php
if (isset($members)) $members = $members;
?>

<div class="row m-0">
    <h2 class="col my-2 p-0 pl-2">Ruiters</h2>
    <a class=" btn btn-primary float-right m-2" href="member/register">Registreer</a>
</div>

<table class="table table-hover table-striped">
    <thead>
    <tr>
        <th scope="col">#</th>
        <th scope="col">Naam</th>
        <th scope="col">Adres</th>
        <th scope="col">Telefoon nummer</th>
    </tr>
    </thead>
    <tbody>
    <?php foreach ($members as $member) { ?>
        <tr>
            <th scope="row"><?= $member['id'] ?></th>
            <th scope="row"><?= $member['name'] ?></th>
            <th scope="row"><?= $member['address'] ?></th>
            <th scope="row"><?= $member['phone'] ?></th>
        </tr>
    <?php } ?>
    </tbody>
</table>
