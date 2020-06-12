<?php
require_once(ROOT . "helpers/functions.php");
if (isset($reservations)) $reservations = $reservations;

?>

<div class="container">

    <div class="row m-0">
        <h2 class="col my-2 p-0 pl-2">Reserveringen</h2>
        <a class="btn btn-sm btn-dark float-right m-2" href="<?= URL ?>reservation/index/all">Alle</a>
        <a class="btn btn-primary float-right m-2" href="<?= URL ?>reservation/reserve">Reserveer</a>
    </div>

    <table class="table table-hover table-striped">
        <thead>
        <tr>
            <th scope="col">#</th>
            <th scope="col">Ruiter</th>
            <th scope="col">Paard</th>
            <th scope="col">Start tijd</th>
            <th scope="col">Duur</th>
            <th scope="col"></th>
        </tr>
        </thead>

        <tbody>
        <?php foreach ($reservations as $reservation) { ?>
            <tr>
                <td scope="row"><?= $reservation['id'] ?></td>
                <td scope="row"><?= getDataById("member", $reservation['member_id'])['name'] ?></td>
                <td scope="row"><?= getDataById("horse", $reservation['horse_id'])['name'] ?></td>
                <td scope="row"><?= date_format(new DateTime($reservation['start_time']), 'd M H:i') ?></td>
                <td scope="row"><?= $reservation['duration'] ?> minuten</td>
                <td scope="row"><a class="btn btn-warning text-white float-right mr-1"
                                   href="<?= URL ?>reservation/update/<?= $reservation['id'] ?>">Update</a></td>
            </tr>

        <?php } ?>
        </tbody>

    </table>

</div>
