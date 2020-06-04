<?php
require_once(ROOT . "helpers/functions.php");
if (isset($reservations)) $reservations = $reservations;

?>

<div class="container">

    <div class="row m-0">
        <h2 class="col my-2 p-0 pl-2">Reserveringen</h2>
        <a class="btn btn-primary float-right m-2" href="reservation/reserve">Reserveer</a>
    </div>

    <table class="table table-hover table-striped">
        <thead>
        <tr>
            <th scope="col">#</th>
            <th scope="col">Ruiter</th>
            <th scope="col">Paard</th>
            <th scope="col">Start tijd</th>
            <th scope="col">Duur</th>
        </tr>
        </thead>

        <tbody>
        <?php foreach ($reservations as $reservation) { ?>
            <tr>
                <th scope="row"><?= $reservation['id'] ?></th>
                <th scope="row"><?= getDataById("member", $reservation['member_id'])['name'] ?></th>
                <th scope="row"><?= $reservation['horse_id'] ?></th>
                <th scope="row"><?= date_format(new DateTime($reservation['start_time']), 'd M H:i') ?></th>
                <th scope="row"><?= $reservation['duration'] ?> minuten</th>
            </tr>

        <?php } ?>
        </tbody>

    </table>

</div>
